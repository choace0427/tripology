<?php
namespace App\Http\Controllers\Traveller;

use App\Http\Controllers\Controller;
use App\Models\Traveller;
use Illuminate\Http\Request;
use Hash;
use DB;
use App\Mail\OrderCompletedEmailToTraveller;
use Illuminate\Support\Facades\Mail;
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Payment;
use PayPal\Api\PaymentExecution;
use PayPal\Api\Transaction;


class CheckoutController extends Controller
{
    public function stripe()
    {
        if(!session()->get('package_id'))
        {
            return redirect()->to('/');
        }

        $g_setting = DB::table('general_settings')->where('id', 1)->first();
        $stripe_secret_key = $g_setting->stripe_secret_key;

        $final_price = session()->get('package_price');
        $final_price_in_usd = $final_price/$g_setting->currency_per_usd_value;
        $final_price_in_usd = round($final_price_in_usd,2);

        \Stripe\Stripe::setApiKey($stripe_secret_key);

        if(isset($_POST['stripeToken']))
        {
            \Stripe\Stripe::setVerifySslCerts(false);

			$token = $_POST['stripeToken'];
            $response = \Stripe\Charge::create([
                'amount' => $final_price_in_usd*100,
                'currency' => 'usd',
                'description' => 'Stripe Payment',
                'source' => $token,
                'metadata' => ['order_id' => uniqid()],
            ]);

            $bal = \Stripe\BalanceTransaction::retrieve($response->balance_transaction);
            $balJson = $bal->jsonSerialize();

            $paid_amount = $balJson['amount']/100;
            $fee_amount  = $balJson['fee']/100;
            $net_amount  = $balJson['net']/100;

            $order_no = uniqid();

            $statement = DB::select("SHOW TABLE STATUS LIKE 'orders'");
            $ai_id = $statement[0]->Auto_increment;


            if(env('PROJECT_MODE') == 1):

                $data = array();            
                $data['traveller_id'] = session()->get('traveller_id');
                $data['package_id'] = session()->get('package_id');
                $data['txnid'] = $response->balance_transaction;
                $data['original_currency_name'] = $g_setting->currency_name;
                $data['original_currency_sign'] = $g_setting->currency_sign;
                $data['original_price'] = session()->get('package_price');
                $data['paid_amount'] = $paid_amount;
                $data['fee_amount'] = $fee_amount;
                $data['net_amount'] = $net_amount;
                $data['card_last4'] = $response->payment_method_details->card->last4;
                $data['card_exp_month'] = $response->payment_method_details->card->exp_month;
                $data['card_exp_year'] = $response->payment_method_details->card->exp_year;
                $data['payment_method'] = 'Stripe';
                $data['payment_status'] = 'Completed';
                $data['total_person'] = session()->get('total_person');
                $data['order_no'] = $order_no;
                $data['created_at'] = date('Y-m-d H:i:s');

                DB::table('orders')->insert($data);

                // Send Email To Traveller
                $payment_method = '
                '.'Payment Method'.': '.'Stripe'.'<br>
                '.'Card Last 4 Digit'.': '.$response->payment_method_details->card->last4.'<br>
                '.'Expiry Month'.': '.$response->payment_method_details->card->exp_month.'<br>
                '.'Expiry Year'.': '.$response->payment_method_details->card->exp_year;

                $email_template_data = DB::table('email_templates')->where('id', 8)->first();
                $subject = $email_template_data->et_subject;
                $message = $email_template_data->et_content;

                $message = str_replace('[[traveller_name]]', session()->get('traveller_name'), $message);
                $message = str_replace('[[order_number]]', $order_no, $message);
                $message = str_replace('[[payment_method]]', $payment_method, $message);
                $message = str_replace('[[payment_date_time]]', date('Y-m-d H:i:s'), $message);
                $message = str_replace('[[transaction_id]]', $response->balance_transaction, $message);
                $message = str_replace('[[paid_amount]]', '$'.$paid_amount, $message);
                $message = str_replace('[[payment_status]]', 'Completed', $message);
                Mail::to(session()->get('traveller_email'))->send(new OrderCompletedEmailToTraveller($subject,$message));

                session()->forget('package_id');
                session()->forget('package_name');
                session()->forget('package_price');
                session()->forget('total_person');

                return Redirect()->to('/')->with('success', 'Payment is successful!');

            else:

                session()->forget('package_id');
                session()->forget('package_name');
                session()->forget('package_price');
                session()->forget('total_person');

                return Redirect()->to('/')->with('error', env('PROJECT_NOTIFICATION'));

            endif;

            
        }
    }


    public function paypal()
    {
        if(!session()->get('package_id'))
        {
            return redirect()->to('/');
        }

        $g_setting = DB::table('general_settings')->where('id', 1)->first();
        $client = $g_setting->paypal_client_id;
        $secret = $g_setting->paypal_secret_key;
        
        $final_price = session()->get('package_price');
        $final_price_in_usd = $final_price/$g_setting->currency_per_usd_value;
        $final_price_in_usd = round($final_price_in_usd,2);

        $apiContext = new \PayPal\Rest\ApiContext(
            new \PayPal\Auth\OAuthTokenCredential(
                $client, // ClientID
                $secret // ClientSecret
            )
        );

        $paymentId = request('paymentId');
        $payment = Payment::get($paymentId, $apiContext);

        $execution = new PaymentExecution();
        $execution->setPayerId(request('PayerID'));

        $transaction = new Transaction();
        $amount = new Amount();
        $details = new Details();

        $details->setShipping(0)
                ->setTax(0)
                ->setSubtotal($final_price_in_usd);

        $amount->setCurrency('USD');
        $amount->setTotal($final_price_in_usd);
        $amount->setDetails($details);
        $transaction->setAmount($amount);

        $execution->addTransaction($transaction);

        $result = $payment->execute($execution, $apiContext);

        if($result->state == 'approved')
        {
            $paid_amount = $result->transactions[0]->amount->total;
            $fee_amount  = $result->transactions[0]->related_resources[0]->sale->transaction_fee->value;
            $net_amount  = $paid_amount-$fee_amount;

            $order_no = uniqid();

            $statement = DB::select("SHOW TABLE STATUS LIKE 'orders'");
            $ai_id = $statement[0]->Auto_increment;

            if(env('PROJECT_MODE') == 1):

                $data = array();
                $data['traveller_id'] = session()->get('traveller_id');
                $data['package_id'] = session()->get('package_id');
                $data['txnid'] = $paymentId;
                $data['original_currency_name'] = $g_setting->currency_name;
                $data['original_currency_sign'] = $g_setting->currency_sign;
                $data['original_price'] = session()->get('package_price');
                $data['paid_amount'] = $paid_amount;
                $data['fee_amount'] = $fee_amount;
                $data['net_amount'] = $net_amount;
                $data['card_last4'] = '';
                $data['card_exp_month'] = '';
                $data['card_exp_year'] = '';
                $data['payment_method'] = 'PayPal';
                $data['payment_status'] = 'Completed';
                $data['total_person'] = session()->get('total_person');
                $data['order_no'] = $order_no;
                $data['created_at'] = date('Y-m-d H:i:s');

                DB::table('orders')->insert($data);


                // Send Email To Traveller
                $payment_method = 'Payment Method: PayPal';
                $email_template_data = DB::table('email_templates')->where('id', 8)->first();
                $subject = $email_template_data->et_subject;
                $message = $email_template_data->et_content;

                $message = str_replace('[[traveller_name]]', session()->get('traveller_name'), $message);
                $message = str_replace('[[order_number]]', $order_no, $message);
                $message = str_replace('[[payment_method]]', $payment_method, $message);
                $message = str_replace('[[payment_date_time]]', date('Y-m-d H:i:s'), $message);
                $message = str_replace('[[transaction_id]]', $paymentId, $message);
                
                $message = str_replace('[[paid_amount]]', '$'.$paid_amount, $message);
                $message = str_replace('[[payment_status]]', 'Completed', $message);
                
                Mail::to(session()->get('traveller_email'))->send(new OrderCompletedEmailToTraveller($subject,$message));

                session()->forget('package_id');
                session()->forget('package_name');
                session()->forget('package_price');
                session()->forget('total_person');

                return Redirect()->to('/')->with('success', 'Payment is successful!');

            else:

                session()->forget('package_id');
                session()->forget('package_name');
                session()->forget('package_price');
                session()->forget('total_person');

                return Redirect()->to('/')->with('error', env('PROJECT_NOTIFICATION'));

            endif;

            
        }
        else
        {
            return redirect()->to('/');
        }




    }


}

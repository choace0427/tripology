<?php

namespace App\Http\Controllers\Front;
use App\Http\Controllers\Controller;
use App\Mail\SubscriberMessageForVerification;
use App\Models\Admin\Subscriber;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Mail;

class SubscriptionController extends Controller
{
    public function index(Request $request)
    {
        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('error', env('PROJECT_NOTIFICATION'));
        }
        
        $token = hash('sha256',time());

        $request->validate(
            [
                'subs_email' => 'required|email|unique:subscribers'
            ],
            [
                'subs_email.required' => ERROR_EMAIL_EMPTY,
                'subs_email.email' => ERROR_EMAIL_INVALID,
                'subs_email.unique' => ERROR_EMAIL_EXIST
            ]
        );

        // Save data into database
        $data['subs_email'] = request('subs_email');
        $data['subs_token'] = $token;
        $data['subs_active'] = 0;
        DB::table('subscribers')->insert($data);

        // Send Email
        $email_template_data = DB::table('email_templates')->where('id', 3)->first();
        $subject = $email_template_data->et_subject;
        $message = $email_template_data->et_content;

        $verification_link = url('subscriber/verify/'.$token.'/'.request('subs_email'));

        $message = str_replace('[[verification_link]]', $verification_link, $message);

        Mail::to(request('subs_email'))->send(new SubscriberMessageForVerification($subject,$message));

        return redirect()->back()->with('success', SUCCESS_SUBSCRIBER_SUBMIT);
    }

    public function verify()
    {
        $email_from_url = request()->segment(count(request()->segments()));
        $aa = DB::table('subscribers')->where('subs_email', $email_from_url)->first();

        if(!$aa) {
            return abort(404);
        }

        $expected_url = url('subscriber/verify/'.$aa->subs_token.'/'.$aa->subs_email);
        $current_url = url()->current();
        if($expected_url != $current_url) {
            return abort(404);
        }

        $data['subs_active'] = 1;
        $data['subs_token'] = '';
        Subscriber::where('subs_email',$email_from_url)->update($data);

        return redirect()->to('/')->with('success', SUCCESS_SUBSCRIBER_VERIFY);
    }
}

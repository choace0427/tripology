<?php

namespace App\Http\Controllers\Traveller;

use App\Http\Controllers\Controller;
use App\Mail\RegistrationEmailToTraveller;
use App\Models\Traveller;
use Illuminate\Http\Request;
use Hash;
use DB;
use Illuminate\Support\Facades\Mail;

class RegistrationController extends Controller
{
    public function index()
    {
        $g_setting = DB::table('general_settings')->where('id', 1)->first();
    	return view('traveller.auth.registration', compact('g_setting'));
    }

    public function store(Request $request)
    {
        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('error', env('PROJECT_NOTIFICATION'));
        }
        
        $g_setting = DB::table('general_settings')->where('id', 1)->first();
        $token = hash('sha256',time());

        $traveller = new Traveller();
        $data = $request->only($traveller->getFillable());

        $request->validate(
            [
                'traveller_name' => 'required',
                'traveller_email' => 'required|email|unique:travellers',
                'traveller_password' => 'required'
            ],
            [
                'traveller_name.required' => ERROR_NAME_EMPTY,
                'traveller_email.required' => ERROR_EMAIL_EMPTY,
                'traveller_email.email' => ERROR_EMAIL_INVALID,
                'traveller_email.unique' => ERROR_EMAIL_EXIST,
                'traveller_password.required' => ERROR_PASSWORD_EMPTY
            ]
        );

        if($g_setting->google_recaptcha_status == 'Show') {
            $request->validate(
                [
                    'g-recaptcha-response' => 'required'
                ],
                [
                    'g-recaptcha-response.required' => ERROR_RECAPTCHA
                ]
            );
        }

        unset($request->traveller_re_password);
        $data['traveller_password'] = Hash::make($request->traveller_password);
        $data['traveller_phone'] = '';
        $data['traveller_country'] = '';
        $data['traveller_address'] = '';
        $data['traveller_state'] = '';
        $data['traveller_city'] = '';
        $data['traveller_zip'] = '';
        $data['traveller_token'] = $token;
        $data['traveller_status'] = 'Pending';

        $traveller->fill($data)->save();

        // Send Email
        $email_template_data = DB::table('email_templates')->where('id', 6)->first();
        $subject = $email_template_data->et_subject;
        $message = $email_template_data->et_content;

        $verification_link = url('traveller/registration/verify/'.$token.'/'.$request->traveller_email);

        $message = str_replace('[[verification_link]]', $verification_link, $message);

        Mail::to($request->traveller_email)->send(new RegistrationEmailToTraveller($subject,$message));

        return redirect()->back()->with('success', SUCCESS_REGISTRATION_SUBMIT);
    }

    public function verify()
    {
        $email_from_url = request()->segment(count(request()->segments()));
        $aa = DB::table('travellers')->where('traveller_email', $email_from_url)->first();

        if(!$aa) {
            return redirect()->route('traveller.login');
        }

        $expected_url = url('traveller/registration/verify/'.$aa->traveller_token.'/'.$aa->traveller_email);
        $current_url = url()->current();
        if($expected_url != $current_url) {
            return redirect()->route('traveller.login');
        }

        $data['traveller_status'] = 'Active';
        $data['traveller_token'] = '';
        Traveller::where('traveller_email',$email_from_url)->update($data);

        return redirect()->route('traveller.login')->with('success', SUCCESS_REGISTRATION_VERIFY);
    }

}

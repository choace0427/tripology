<?php

namespace App\Http\Controllers\Traveller;

use App\Http\Controllers\Controller;
use App\Mail\ResetPasswordMessageToTraveller;
use App\Models\Traveller;
use Illuminate\Http\Request;
use Hash;
use DB;
use Illuminate\Support\Facades\Mail;

class ForgetPasswordController extends Controller
{
    public function index()
    {
        $g_setting = DB::table('general_settings')->where('id', 1)->first();
    	return view('traveller.auth.forget_password', compact('g_setting'));
    }

    public function store(Request $request)
    {
        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('error', env('PROJECT_NOTIFICATION'));
        }
        
        $request->validate([
            'traveller_email' => 'required|email'
        ],
        [
            'traveller_email.required' => ERROR_EMAIL_EMPTY,
            'traveller_email.email' => ERROR_EMAIL_INVALID
        ]
        );

        $check_email = Traveller::where('traveller_email',$request->traveller_email)->first();
        if(!$check_email)
        {
        	return redirect()->back()->with('error', ERROR_EMAIL_NOT_FOUND);
        }
        else
        {
            $email_template_data = DB::table('email_templates')->where('id', 7)->first();
            $subject = $email_template_data->et_subject;
            $message = $email_template_data->et_content;

            $token = hash('sha256',time());
            $reset_link = url('traveller/reset-password/'.$token.'/'.$request->traveller_email);
            $message = str_replace('[[reset_link]]', $reset_link, $message);

            $data['traveller_token'] = $token;
            Traveller::where('traveller_email',$request->traveller_email)->update($data);

            Mail::to($request->traveller_email)->send(new ResetPasswordMessageToTraveller($subject,$message));
        }

        return redirect()->back()->with('success', SUCCESS_PASSWORD_RESET_SUBMIT);
    }

}

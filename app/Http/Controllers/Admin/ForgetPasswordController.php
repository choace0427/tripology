<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\ResetPasswordMessageToAdmin;
use App\Models\Admin\Admin;
use Illuminate\Http\Request;
use Hash;
use DB;
use Illuminate\Support\Facades\Mail;

class ForgetPasswordController extends Controller
{
    public function index()
    {
    	return view('admin.auth.forget_password');
    }

    public function store(Request $request)
    {
        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('error', env('PROJECT_NOTIFICATION'));
        }
        
        $request->validate([
            'email' => 'required|email'
        ]);

        $check_email = Admin::where('email',$request->email)->first();
        if(!$check_email)
        {
        	return redirect()->back()->with('error', 'Email address not found');
        }
        else
        {
            $email_template_data = DB::table('email_templates')->where('id', 5)->first();
            $subject = $email_template_data->et_subject;
            $message = $email_template_data->et_content;

            $token = hash('sha256',time());
            $reset_link = url('admin/reset-password/'.$token.'/'.$request->email);
            $message = str_replace('[[reset_link]]', $reset_link, $message);

            $data['token'] = $token;
            Admin::where('id',1)->update($data);

            Mail::to($request->email)->send(new ResetPasswordMessageToAdmin($subject,$message));
        }

        return redirect()->back()->with('success', 'Please check your email for reset instruction');
    }

}

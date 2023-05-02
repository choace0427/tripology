<?php

namespace App\Http\Controllers\Front;
use App\Http\Controllers\Controller;
use App\Mail\ContactPageMessage;
use App\Models\Admin\Admin;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function index()
    {
        $g_setting = DB::table('general_settings')->where('id', 1)->first();
        $contact = DB::table('page_contact_items')->where('id', 1)->first();
        return view('pages.contact', compact('contact','g_setting'));
    }

    public function send_email(Request $request)
    {
        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('error', env('PROJECT_NOTIFICATION'));
        }
        
        $g_setting = DB::table('general_settings')->where('id', 1)->first();
        $request->validate(
            [
                'visitor_name' => 'required',
                'visitor_email' => 'required|email',
                'visitor_message' => 'required'
            ],
            [
                'visitor_name.required' => ERROR_NAME_EMPTY,
                'visitor_email.required' => ERROR_EMAIL_EMPTY,
                'visitor_email.email' => ERROR_EMAIL_INVALID,
                'visitor_message.required' => ERROR_MESSAGE_EMPTY
            ]
        );

        if($g_setting->google_recaptcha_status == 'Show') {
            $request->validate([
                'g-recaptcha-response' => 'required'
            ],
            [
                'g-recaptcha-response.required' => ERROR_RECAPTCHA
            ]);
        }

        // Send Email
        $email_template_data = DB::table('email_templates')->where('id', 1)->first();
        $subject = $email_template_data->et_subject;
        $message = $email_template_data->et_content;

        $message = str_replace('[[visitor_name]]', $request->visitor_name, $message);
        $message = str_replace('[[visitor_email]]', $request->visitor_email, $message);
        $message = str_replace('[[visitor_phone]]', $request->visitor_phone, $message);
        $message = str_replace('[[visitor_message]]', $request->visitor_message, $message);

        $admin_data = DB::table('admins')->where('id',1)->first();

        Mail::to($admin_data->email)->send(new ContactPageMessage($subject,$message));

        return redirect()->back()->with('success', SUCCESS_CONTACT_FORM);
    }
}

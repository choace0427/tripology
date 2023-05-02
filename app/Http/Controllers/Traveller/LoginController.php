<?php

namespace App\Http\Controllers\Traveller;

use App\Http\Controllers\Controller;
use App\Models\Traveller;
use Illuminate\Http\Request;
use Hash;
use DB;

class LoginController extends Controller
{
	public function __construct()
    {        
    	$this->middleware(function ($request, $next) {
			if($request->session()->has('traveller_status')) {
				return redirect()->route('traveller.dashboard');
			}
			return $next($request);
		});
    }

    public function index()
    {
        $g_setting = DB::table('general_settings')->where('id', 1)->first();
    	return view('traveller.auth.login', compact('g_setting'));
    }

    public function store(Request $request)
    {
        $g_setting = DB::table('general_settings')->where('id', 1)->first();

        $request->validate(
            [
                'traveller_email' => 'required|email',
                'traveller_password' => 'required',
            ],
            [
                'traveller_email.required' => ERROR_EMAIL_EMPTY,
                'traveller_email.email' => ERROR_EMAIL_INVALID,
                'traveller_password.required' => ERROR_PASSWORD_EMPTY
            ]
        );

        if($g_setting->google_recaptcha_status == 'Show') {
            $request->validate([
                'g-recaptcha-response' => 'required'
            ],
            [
                'g-recaptcha-response.required'    => ERROR_RECAPTCHA
            ]);
        }

        $check_email = Traveller::where('traveller_email',$request->traveller_email)->first();
        if(!$check_email)
        {
        	return redirect()->back()->with('error', ERROR_EMAIL_NOT_FOUND);
        }
        else
        {
        	$saved_password = $check_email->traveller_password;
        	$given_password = $request->traveller_password;

        	if(\Hash::check($given_password,$saved_password) == false)
        	{
        		return redirect()->back()->with('error', ERROR_PASSWORD_WRONG);
        	}
        }

        if($check_email->traveller_status!='Active') {
            return redirect()->back()->with('error', ERROR_TRAVELLER_INACTIVE);
        }

        // Saving data into session
        session(['traveller_id' => $check_email->id]); // traveller_id is not a field in the travellers table. It is just used to avoid conflict with the admin id.

        session(['traveller_name' => $check_email->traveller_name]);
        session(['traveller_email' => $check_email->traveller_email]);
        session(['traveller_phone' => $check_email->traveller_phone]);
        session(['traveller_country' => $check_email->traveller_country]);
        session(['traveller_address' => $check_email->traveller_address]);
        session(['traveller_state' => $check_email->traveller_state]);
        session(['traveller_city' => $check_email->traveller_city]);
        session(['traveller_zip' => $check_email->traveller_zip]);
        session(['traveller_password' => $check_email->traveller_password]);
        session(['traveller_status' => $check_email->traveller_status]);

        return redirect()->route('traveller.dashboard');
    }
}

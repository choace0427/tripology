<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Admin;
use Illuminate\Http\Request;
use Hash;

class LoginController extends Controller
{
	public function __construct()
    {
    	$this->middleware(function ($request, $next) {
			if($request->session()->has('admin')) {
				return redirect()->route('admin.dashboard');
			}
			return $next($request);
		});
    }

    public function index()
    {
    	return view('admin.auth.login');
    }

    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $check_email = Admin::where('email',$request->email)->first();
        if(!$check_email)
        {
        	return redirect()->back()->with('error', 'Email address not found');
        }
        else
        {
        	$saved_password = $check_email->password;
        	$given_password = $request->password;

        	if(\Hash::check($given_password,$saved_password) == false)
        	{
        		return redirect()->back()->with('error', 'Password is wrong');
        	}
        }

        // Saving data into session
        session(['role' => 'admin']);
        session(['id' => $check_email->id]);
        session(['name' => $check_email->name]);
        session(['email' => $check_email->email]);
        session(['photo' => $check_email->photo]);

        return redirect()->route('admin.dashboard');
    }
}

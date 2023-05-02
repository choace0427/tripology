<?php

namespace App\Http\Controllers\Traveller;

use App\Http\Controllers\Controller;
use App\Models\Traveller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use DB;
use Hash;

class ResetPasswordController extends Controller
{
    public function index()
    {
        $g_setting = DB::table('general_settings')->where('id', 1)->first();

        $email_from_url = request()->segment(count(request()->segments()));
        $aa = DB::table('travellers')->where('traveller_email', $email_from_url)->first();

        if(!$aa) {
            return redirect()->route('traveller.login');
        }

        $expected_url = url('traveller/reset-password/'.$aa->traveller_token.'/'.$aa->traveller_email);
        $current_url = url()->current();
        if($expected_url != $current_url) {
            return redirect()->route('traveller.login');
        }

        $email = $aa->traveller_email;

        return view('traveller.auth.reset_password', compact('g_setting', 'email'));
    }

    public function update(Request $request)
    {
        $request->validate(
            [
                'new_password' => 'required'
            ],
            [
                'new_password.required' => ERROR_PASSWORD_EMPTY
            ]
        );

        $data['traveller_password'] = Hash::make($request->new_password);
        $data['traveller_token'] = '';

        Traveller::where('traveller_email', $request->current_email)->update($data);

        return redirect()->route('traveller.login')->with('success', SUCCESS_PASSWORD_RESET);
    }
}

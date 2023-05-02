<?php

namespace App\Http\Controllers\Traveller;

use App\Http\Controllers\Controller;
use App\Models\Traveller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use DB;
use Hash;

class PasswordChangeController extends Controller
{
    public function __construct()
    {
        $this->middleware('traveller');
    }

    public function index()
    {
        $g_setting = DB::table('general_settings')->where('id', 1)->first();
        $traveller_data = Traveller::where('id',session()->get('traveller_id'))->first();
        return view('traveller.pages.password_change', compact('traveller_data','g_setting'));
    }

    public function update(Request $request)
    {
        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('error', env('PROJECT_NOTIFICATION'));
        }
        
        $request->validate(
            [
                'password' => 'required'
            ],
            [
                'password.required' => ERROR_PASSWORD_EMPTY
            ]
        );

        $data['traveller_password'] = Hash::make($request->password);
        Traveller::where('id',session()->get('traveller_id'))->update($data);

        return redirect()->back()->with('success', SUCCESS_PASSWORD_UPDATE);

    }

}

<?php

namespace App\Http\Controllers\Traveller;

use App\Http\Controllers\Controller;
use App\Models\Traveller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use DB;

class ProfileChangeController extends Controller
{
    public function __construct()
    {
        $this->middleware('traveller');
    }

    public function index()
    {
        $g_setting = DB::table('general_settings')->where('id', 1)->first();
        $traveller_data = Traveller::where('id',session()->get('traveller_id'))->first();
        return view('traveller.pages.profile_change', compact('traveller_data','g_setting'));
    }

    public function update(Request $request)
    {
        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('error', env('PROJECT_NOTIFICATION'));
        }
        
        $request->validate(
            [
                'traveller_name' => 'required',
                'traveller_email' => 'required|email',
                'traveller_phone' => 'required',
                'traveller_country' => 'required',
                'traveller_address' => 'required',
                'traveller_state' => 'required',
                'traveller_city' => 'required',
                'traveller_zip' => 'required'
            ],
            [
                'traveller_name.required' => ERROR_NAME_EMPTY,
                'traveller_email.required' => ERROR_EMAIL_EMPTY,
                'traveller_email.email' => ERROR_EMAIL_INVALID,
                'traveller_phone.required' => ERROR_PHONE_EMPTY,
                'traveller_country.required' => ERROR_COUNTRY_EMPTY,
                'traveller_address.required' => ERROR_ADDRESS_EMPTY,
                'traveller_state.required' => ERROR_STATE_EMPTY,
                'traveller_city.required' => ERROR_CITY_EMPTY,
                'traveller_zip.required' => ERROR_ZIP_EMPTY
            ]
        );

        $data['traveller_name'] = $request->traveller_name;
        $data['traveller_email'] = $request->traveller_email;
        $data['traveller_phone'] = $request->traveller_phone;
        $data['traveller_country'] = $request->traveller_country;
        $data['traveller_address'] = $request->traveller_address;
        $data['traveller_state'] = $request->traveller_state;
        $data['traveller_city'] = $request->traveller_city;
        $data['traveller_zip'] = $request->traveller_zip;

        Traveller::where('id',session()->get('traveller_id'))->update($data); // traveller_id is not a field in the travellers table. It is just used to avoid conflict with the admin id.

        session(['traveller_name' => $request->traveller_name]);
        session(['traveller_email' => $request->traveller_email]);
        session(['traveller_phone' => $request->traveller_phone]);
        session(['traveller_country' => $request->traveller_country]);
        session(['traveller_address' => $request->traveller_address]);
        session(['traveller_state' => $request->traveller_state]);
        session(['traveller_city' => $request->traveller_city]);
        session(['traveller_zip' => $request->traveller_zip]);

        return redirect()->back()->with('success', SUCCESS_PROFILE_UPDATE);

    }

}

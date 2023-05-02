<?php

namespace App\Http\Controllers\Traveller;

use App\Http\Controllers\Controller;
use App\Models\Traveller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Hash;

class LogoutController extends Controller
{
    public function index(Request $request)
    {
        session()->forget('traveller_id'); // traveller_id is not a field in the travellers table. It is just used to avoid conflict with the admin id.
        session()->forget('traveller_name');
        session()->forget('traveller_email');
        session()->forget('traveller_phone');
        session()->forget('traveller_country');
        session()->forget('traveller_address');
        session()->forget('traveller_state');
        session()->forget('traveller_city');
        session()->forget('traveller_zip');
        session()->forget('traveller_password');
        session()->forget('traveller_status');
        return redirect()->route('traveller.login');
    }
}

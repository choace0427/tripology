<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Hash;

class LogoutController extends Controller
{
    public function index(Request $request)
    {
        session()->forget('role');
        session()->forget('id');
        session()->forget('name');
        session()->forget('email');
        session()->forget('photo');
        return redirect()->route('admin.login');
    }
}

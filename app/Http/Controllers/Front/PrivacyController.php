<?php

namespace App\Http\Controllers\Front;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class PrivacyController extends Controller
{
    public function index()
    {
        $g_setting = DB::table('general_settings')->where('id', 1)->first();
        $privacy = DB::table('page_privacy_items')->where('id', 1)->first();
        return view('pages.privacy', compact('privacy','g_setting'));
    }
}

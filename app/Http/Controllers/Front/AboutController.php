<?php

namespace App\Http\Controllers\Front;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class AboutController extends Controller
{
    public function index()
    {
        $g_setting = DB::table('general_settings')->where('id', 1)->first();
        $about = DB::table('page_about_items')->where('id', 1)->first();
        return view('pages.about', compact('about','g_setting'));
    }
}

<?php

namespace App\Http\Controllers\Front;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class FaqController extends Controller
{
    public function index()
    {
        $g_setting = DB::table('general_settings')->where('id', 1)->first();
        $faq = DB::table('page_faq_items')->where('id', 1)->first();
        $faqs = DB::table('faqs')->orderby('faq_order', 'asc')->get();
        return view('pages.faq', compact('faq','g_setting','faqs'));
    }
}

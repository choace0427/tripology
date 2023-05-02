<?php

namespace App\Http\Controllers\Front;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class TermController extends Controller
{
    public function index()
    {
        $g_setting = DB::table('general_settings')->where('id', 1)->first();
        $term = DB::table('page_term_items')->where('id', 1)->first();
        return view('pages.term', compact('term','g_setting'));
    }
}

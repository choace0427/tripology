<?php

namespace App\Http\Controllers\Front;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class ServiceController extends Controller
{
    public function index()
    {
        $g_setting = DB::table('general_settings')->where('id', 1)->first();
        $service = DB::table('page_service_items')->where('id', 1)->first();
        $service_items = DB::table('services')->paginate(9);

        return view('pages.services', compact('service','g_setting','service_items'));
    }

    public function detail($slug)
    {
        $g_setting = DB::table('general_settings')->where('id', 1)->first();
        $service_detail = DB::table('services')->where('slug', $slug)->first();
        $service_items = DB::table('services')->get();
        if(!$service_detail) {
            return abort(404);
        }
        return view('pages.service_detail', compact('g_setting','service_detail','service_items'));
    }
}

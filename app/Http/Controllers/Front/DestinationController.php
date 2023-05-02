<?php

namespace App\Http\Controllers\Front;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class DestinationController extends Controller
{
    public function index()
    {
        $g_setting = DB::table('general_settings')->where('id', 1)->first();
        $destinations = DB::table('destinations')->orderby('d_order', 'asc')->get();
        $destination = DB::table('page_destination_items')->where('id', 1)->first();
        return view('pages.destination', compact('destinations','g_setting','destination'));
    }

    public function detail($slug)
    {
        $g_setting = DB::table('general_settings')->where('id', 1)->first();
        $destination_detail = DB::table('destinations')->where('d_slug', $slug)->first();
        $packages = DB::table('packages')->where('destination_id', $destination_detail->id)->get();
        if(!$destination_detail) {
            return abort(404);
        }
        return view('pages.destination_detail', compact('g_setting','destination_detail','packages'));
    }
}

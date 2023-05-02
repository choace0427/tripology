<?php

namespace App\Http\Controllers\Traveller;

use App\Http\Controllers\Controller;
use App\Models\Traveller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use DB;

class OrderController extends Controller
{
    public function __construct()
    {
    	$this->middleware('traveller');
    }

    public function index()
    {
        $g_setting = DB::table('general_settings')->where('id', 1)->first();
        return view('traveller.pages.order', compact('g_setting'));
    }

    public function detail($id)
    {
        $g_setting = DB::table('general_settings')->where('id', 1)->first();
        $order_detail = DB::table('orders')->where('id',$id)->first();
        return view('traveller.pages.order_detail', compact('g_setting','order_detail'));
    }

}

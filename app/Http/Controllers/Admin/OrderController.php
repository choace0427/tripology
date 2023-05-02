<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use DB;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
        $orders = DB::table('orders')->get();
        return view('admin.order.index', compact('orders'));
    }

    public function detail($id)
    {
        $order_detail = DB::table('orders')->where('id',$id)->first();
        $traveller_detail = DB::table('travellers')->where('id',$order_detail->traveller_id)->first();
        $package_detail = DB::table('packages')->where('id',$order_detail->package_id)->first();
        $destination_detail = DB::table('destinations')->where('id',$package_detail->destination_id)->first();
        return view('admin.order.detail', compact('order_detail','traveller_detail','package_detail','destination_detail'));
    }

    public function invoice($id)
    {
        $g_setting = DB::table('general_settings')->where('id', 1)->first();
        $order_detail = DB::table('orders')
            ->join('travellers', 'orders.traveller_id', 'traveller_id')
            ->select('orders.*', 'travellers.id', 'travellers.traveller_name')
            ->where('orders.id',$id)
            ->first();
        return view('admin.order.invoice', compact('order_detail','g_setting'));
    }

    public function destroy($id)
    {
        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('error', env('PROJECT_NOTIFICATION'));
        }
        
        DB::table('orders')->where('id', $id)->delete();

        return Redirect()->back()->with('success', 'Order is deleted successfully!');
    }
}

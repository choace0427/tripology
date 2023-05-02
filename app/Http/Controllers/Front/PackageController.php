<?php

namespace App\Http\Controllers\Front;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class PackageController extends Controller
{
    public function index()
    {
        $g_setting = DB::table('general_settings')->where('id', 1)->first();
        $packages = DB::table('packages')->get();
        $package = DB::table('page_package_items')->where('id', 1)->first();
        return view('pages.package', compact('packages','g_setting','package'));
    }

    public function detail($slug)
    {
        $g_setting = DB::table('general_settings')->where('id', 1)->first();
        $package_detail = DB::table('packages')->where('p_slug', $slug)->first();
        $package_photos = DB::table('package_photos')->where('package_id', $package_detail->id)->get();
        $package_videos = DB::table('package_videos')->where('package_id', $package_detail->id)->get();
        if(!$package_detail) {
            return abort(404);
        }
        return view('pages.package_detail', compact('g_setting','package_detail','package_photos','package_videos'));
    }

    public function store_list(Request $request)
    {
        if($request->method() == 'GET')
        {
            return abort(404);
        }

        if(!session()->get('traveller_id'))
        {
            return redirect()->route('traveller.login')->with('error', 'Please login as traveller before continue');
        }

        $g_setting = DB::table('general_settings')->where('id', 1)->first();

        session()->put('package_id',$request->package_id);
        session()->put('total_person',$request->total_person);

        $package_detail = DB::table('packages')->where('id', $request->package_id)->first();
        session()->put('package_name',$package_detail->p_name);
        session()->put('package_price',$package_detail->p_price);

        return view('pages.payment', compact('g_setting'));
    }

}

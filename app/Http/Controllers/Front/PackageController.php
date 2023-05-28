<?php

namespace App\Http\Controllers\Front;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Package;
use App\Models\Admin\PackageSchedule;
use DB;
use Carbon\Carbon;

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
        $package_detail = Package::with('destination:id,d_name')->where('p_slug', $slug)->first();
        $package_photos = DB::table('package_photos')->where('package_id', $package_detail->id)->get();
        $package_videos = DB::table('package_videos')->where('package_id', $package_detail->id)->get();
        $package_reviews_count = DB::table('reviews')->where('package_id', $package_detail->id)->count();
        $starRatings = DB::table('reviews')->where('package_id', $package_detail->id)->where('published', 1)->avg('rating');
        $package_reviews = DB::table('reviews')->where('package_id', $package_detail->id)->where('published', 1)->get();
        $similar_packages = DB::table('packages')->where('destination_id', $package_detail->destination_id)->where('id', '!=', $package_detail->id)->get();
        $itineraries = DB::table('package_itineraries')->where('package_id', $package_detail->id)->get();
        //$package_schedules = DB::table('package_schedules')->where('package_id', $package_detail->id)->get();
      
        $package_schedules = PackageSchedule::select('id','start_date','end_date','price')
        ->get()
        ->groupBy(function($date) {
            return Carbon::parse($date->start_date)->format('F Y'); // grouping by months
        });
        if(!$package_detail) {
            return abort(404);
        }
        return view('pages.package_details', compact('g_setting','package_detail','package_photos','package_videos','package_reviews_count','starRatings','package_reviews','similar_packages','itineraries','package_schedules'));
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

<?php

namespace App\Http\Controllers\Front;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Destination;
use DB;
use App\Models\Admin\Package;
use App\Models\Admin\Admin;

class HomeController extends Controller
{
    public function index()
    {
        $top_notification = DB::table('top_notifications')->first();
        $packages = Package::withCount(['reviews as reviews_avg' => function($query) {
            $query->select(DB::raw('avg(rating)'));
        },'reviews','wishlist'])->take(6)->get();
        $spotlight = DB::table('spotlights')->first();
        $sliders = DB::table('sliders')->get();
    	// $page_home = DB::table('page_home_items')->where('id',1)->first();
    	// $services = DB::table('services')->get();
    	// $testimonials = DB::table('testimonials')->get();
    	// $team_members = DB::table('team_members')->get();
    	// $blogs = DB::table('blogs')->get();
        // $clients = DB::table('clients')->get();
        $destinations = DB::table('destinations')->where('d_parent_id',0)->get()->pluck('d_name','id');
        $parents = Destination::with('children')->withCount('children')->havingRaw('children_count > 0')->get();
        // $featured_packages = DB::table('packages')->where('p_is_featured','Yes')->get();
        // return view('pages.index', compact('sliders','page_home','services', 'testimonials','team_members','blogs', 'clients','destinations', 'featured_packages'));

		// return view('pages.index');
        // // return view('welcome');
        
        return view('home',compact('sliders','top_notification', 'packages', 'spotlight','destinations','parents'));

    }

    public function search(Request $request)
    {
        $query = $request->get('query');
        $result = DB::table('packages')->where('destination_id',$request->destination)->select('p_name', 'id')->where('p_name', 'LIKE', '%'. $query . '%')->pluck('p_name');
        // $result = DB::table('destinations')->whereHas('d_name', function($query1) use($query) {
        //     $query1->where('p_name', 'LIKE', '%'. $query . '%');
        // })->orWhere('d_name', 'LIKE', '%'. $query . '%')->pluck('d_name');
        return response()->json($result);
    }

    public function agencyProfile($id){
        $profile = Admin::FindOrFail($id);
        return view('agency_profile',compact('profile'));
    }
}

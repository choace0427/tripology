<?php

namespace App\Http\Controllers\Front;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Destination;
use DB;

class HomeController extends Controller
{
    public function index()
    {
        $top_notification = DB::table('top_notifications')->first();
        $packages = DB::table('packages')->where('p_is_featured','Yes')->take(6)->get();
        $featured_packages = DB::table('packages')->where('p_is_featured','Yes')->take(6)->get();
        $spotlight = DB::table('spotlights')->first();
        $sliders = DB::table('sliders')->get();
    	// $page_home = DB::table('page_home_items')->where('id',1)->first();
    	// $services = DB::table('services')->get();
    	// $testimonials = DB::table('testimonials')->get();
    	// $team_members = DB::table('team_members')->get();
    	// $blogs = DB::table('blogs')->get();
        // $clients = DB::table('clients')->get();
        $destinations = DB::table('destinations')->get();
        $parents = Destination::with('children')->withCount('children')->havingRaw('children_count > 0')->get();
        // $featured_packages = DB::table('packages')->where('p_is_featured','Yes')->get();
        // return view('pages.index', compact('sliders','page_home','services', 'testimonials','team_members','blogs', 'clients','destinations', 'featured_packages'));

		// return view('pages.index');
        // // return view('welcome');
        
        return view('home',compact('sliders','top_notification', 'packages', 'spotlight','destinations','parents'));

    }

    public function search(Request $request)
    {
        print_r($request);
        $query = $request->get('query');
        $result = DB::table('destinations')->where('d_name', 'LIKE', '%'. $query . '%')->get();

        print_r($result);
    }
}

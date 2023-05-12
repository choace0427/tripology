<?php

namespace App\Http\Controllers\Front;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class HomeController extends Controller
{
    public function index()
    {
        /*$sliders = DB::table('sliders')->get();
    	$page_home = DB::table('page_home_items')->where('id',1)->first();
    	$services = DB::table('services')->get();
    	$testimonials = DB::table('testimonials')->get();
    	$team_members = DB::table('team_members')->get();
    	$blogs = DB::table('blogs')->get();
        $clients = DB::table('clients')->get();
        $destinations = DB::table('destinations')->get();
        $featured_packages = DB::table('packages')->where('p_is_featured','Yes')->get();
        return view('pages.index', compact('sliders','page_home','services', 'testimonials','team_members','blogs', 'clients','destinations', 'featured_packages'));

		return view('pages.index');*/
        return view('welcome');

    }
}

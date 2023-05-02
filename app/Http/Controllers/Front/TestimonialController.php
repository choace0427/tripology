<?php

namespace App\Http\Controllers\Front;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class TestimonialController extends Controller
{
    public function index()
    {
        $g_setting = DB::table('general_settings')->where('id', 1)->first();
        $testimonial = DB::table('page_testimonial_items')->where('id', 1)->first();
        $testimonials = DB::table('testimonials')->get();
        return view('pages.testimonial', compact('testimonials', 'testimonial', 'g_setting'));
    }
}

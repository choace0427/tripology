<?php

namespace App\Http\Controllers\Front;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Mail;

class BlogController extends Controller
{
    public function index()
    {
        $g_setting = DB::table('general_settings')->where('id', 1)->first();
        $blog = DB::table('page_blog_items')->where('id', 1)->first();

        $blog_items = DB::table('blogs')
            ->join('categories', 'blogs.category_id', '=', 'categories.id')
            ->select('blogs.*', 'categories.id', 'categories.category_name', 'categories.category_slug')
            ->orderby('blogs.id', 'desc')
            ->paginate(9);

        $categories = DB::table('categories')->get();
        return view('pages.blogs', compact('blog','g_setting','blog_items','categories'));
    }

    public function detail($slug)
    {
        $g_setting = DB::table('general_settings')->where('id', 1)->first();

        $blog_detail = DB::table('blogs')
            ->join('categories', 'blogs.category_id', '=', 'categories.id')
            ->select('blogs.*', 'categories.id', 'categories.category_name', 'categories.category_slug')
            ->where('blogs.blog_slug', $slug)
            ->first();

        $blog_items = DB::table('blogs')->get();
        $blog_items_no_pagi = DB::table('blogs')->orderby('id', 'desc')->get();
        $categories = DB::table('categories')->get();
        if(!$blog_detail) {
            return abort(404);
        }
        return view('pages.blog_detail', compact('g_setting','blog_detail','blog_items','blog_items_no_pagi','categories'));
    }
}

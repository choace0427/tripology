<?php

namespace App\Http\Controllers\Front;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class CategoryController extends Controller
{
    public function detail($slug)
    {
        $category_single = DB::table('categories')->where('category_slug', $slug)->first();
        if(!$category_single) {
            return abort(404);
        }
        $g_setting = DB::table('general_settings')->where('id', 1)->first();

        $blog_items = DB::table('blogs')
            ->join('categories', 'blogs.category_id', '=', 'categories.id')
            ->select('blogs.*', 'categories.id', 'categories.category_name', 'categories.category_slug')
            ->where('blogs.category_id', $category_single->id)
            ->paginate(9);

        $blog_items_no_pagi = DB::table('blogs')->orderby('id', 'desc')->get();
        $categories = DB::table('categories')->get();
        return view('pages.category', compact('g_setting','blog_items','blog_items_no_pagi','categories','category_single'));
    }
}

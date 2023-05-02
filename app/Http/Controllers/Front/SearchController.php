<?php

namespace App\Http\Controllers\Front;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        if($request->method() == 'GET')
        {
            return abort(404);
        }

        $g_setting = DB::table('general_settings')->where('id', 1)->first();
        $search_string = $request->search_string;
        $search_string_filter = '%'.$search_string.'%';

        $blog_items = DB::table('blogs')
            ->join('categories', 'blogs.category_id', '=', 'categories.id')
            ->select('blogs.*', 'categories.id', 'categories.category_name', 'categories.category_slug')
            ->orderby('blogs.id', 'desc')
            ->where('blogs.blog_title','like',$search_string_filter)
            ->orWhere('blogs.blog_content','like',$search_string_filter)
            ->paginate(9);

        $blog_items_no_pagi = DB::table('blogs')->orderby('id', 'desc')->get();
        $categories = DB::table('categories')->get();

        return view('pages.search_result', compact('g_setting','search_string','categories','blog_items_no_pagi','blog_items'));
    }
}

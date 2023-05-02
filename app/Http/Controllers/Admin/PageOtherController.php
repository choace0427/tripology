<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\PageOtherItem;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use DB;

class PageOtherController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function edit()
    {
        $page_other1 = PageOtherItem::where('id',1)->first();
        $page_other4 = PageOtherItem::where('id',4)->first();
        $page_other5 = PageOtherItem::where('id',5)->first();
        $page_other6 = PageOtherItem::where('id',6)->first();
        $page_other7 = PageOtherItem::where('id',7)->first();
        $page_other8 = PageOtherItem::where('id',8)->first();
        return view('admin.page_setting.page_other', compact('page_other1','page_other4','page_other5','page_other6','page_other7','page_other8'));
    }

    public function update1(Request $request)
    {
        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('error', env('PROJECT_NOTIFICATION'));
        }

        $data['seo_title'] = $request->input('seo_title');
        $data['seo_meta_description'] = $request->input('seo_meta_description');

        PageOtherItem::where('id',1)->update($data);
        return redirect()->back()->with('success', 'Search Page is updated successfully!');
    }

    public function update4(Request $request)
    {
        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('error', env('PROJECT_NOTIFICATION'));
        }

        $data['seo_title'] = $request->input('seo_title');
        $data['seo_meta_description'] = $request->input('seo_meta_description');

        PageOtherItem::where('id',4)->update($data);
        return redirect()->back()->with('success', 'Login Page is updated successfully!');
    }

    public function update5(Request $request)
    {
        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('error', env('PROJECT_NOTIFICATION'));
        }

        $data['seo_title'] = $request->input('seo_title');
        $data['seo_meta_description'] = $request->input('seo_meta_description');

        PageOtherItem::where('id',5)->update($data);
        return redirect()->back()->with('success', 'Registration Page is updated successfully!');
    }

    public function update6(Request $request)
    {
        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('error', env('PROJECT_NOTIFICATION'));
        }

        $data['seo_title'] = $request->input('seo_title');
        $data['seo_meta_description'] = $request->input('seo_meta_description');

        PageOtherItem::where('id',6)->update($data);
        return redirect()->back()->with('success', 'Forget Password Page is updated successfully!');
    }

    public function update7(Request $request)
    {
        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('error', env('PROJECT_NOTIFICATION'));
        }

        $data['seo_title'] = $request->input('seo_title');
        $data['seo_meta_description'] = $request->input('seo_meta_description');

        PageOtherItem::where('id',7)->update($data);
        return redirect()->back()->with('success', 'Traveller Panel Page is updated successfully!');
    }

    public function update8(Request $request)
    {
        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('error', env('PROJECT_NOTIFICATION'));
        }
        
        $data['seo_title'] = $request->input('seo_title');
        $data['seo_meta_description'] = $request->input('seo_meta_description');

        PageOtherItem::where('id',8)->update($data);
        return redirect()->back()->with('success', 'Payment Page is updated successfully!');
    }
}

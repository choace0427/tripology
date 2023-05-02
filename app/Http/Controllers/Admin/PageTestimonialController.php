<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\PageTestimonialItem;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use DB;

class PageTestimonialController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function edit()
    {
        $page_testimonial = PageTestimonialItem::where('id',1)->first();
        return view('admin.page_setting.page_testimonial', compact('page_testimonial'));
    }

    public function update(Request $request)
    {
        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('error', env('PROJECT_NOTIFICATION'));
        }
        
        $data['name'] = $request->input('name');
        $data['detail'] = $request->input('detail');
        $data['status'] = $request->input('status');
        $data['seo_title'] = $request->input('seo_title');
        $data['seo_meta_description'] = $request->input('seo_meta_description');

        PageTestimonialItem::where('id',1)->update($data);

        return redirect()->back()->with('success', 'Testimonial Page Content is updated successfully!');

    }

}

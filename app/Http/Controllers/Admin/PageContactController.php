<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\PageContactItem;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use DB;

class PageContactController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function edit()
    {
        $page_contact = PageContactItem::where('id',1)->first();
        return view('admin.page_setting.page_contact', compact('page_contact'));
    }

    public function update(Request $request)
    {
        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('error', env('PROJECT_NOTIFICATION'));
        }
        
        $data['name'] = $request->input('name');
        $data['detail'] = $request->input('detail');
        $data['status'] = $request->input('status');
        $data['contact_address'] = $request->input('contact_address');
        $data['contact_email'] = $request->input('contact_email');
        $data['contact_phone'] = $request->input('contact_phone');
        $data['contact_map'] = $request->input('contact_map');
        $data['seo_title'] = $request->input('seo_title');
        $data['seo_meta_description'] = $request->input('seo_meta_description');

        PageContactItem::where('id',1)->update($data);

        return redirect()->back()->with('success', 'Contact Page Content is updated successfully!');

    }

}

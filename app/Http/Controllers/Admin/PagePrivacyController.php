<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\PagePrivacyItem;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use DB;

class PagePrivacyController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function edit()
    {
        $page_privacy = PagePrivacyItem::where('id',1)->first();
        return view('admin.page_setting.page_privacy', compact('page_privacy'));
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

        PagePrivacyItem::where('id',1)->update($data);

        return redirect()->back()->with('success', 'Privacy Page Content is updated successfully!');

    }

}

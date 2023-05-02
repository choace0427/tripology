<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\DynamicPage;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use DB;

class DynamicPageController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
        $dynamic_page = DynamicPage::all();
        return view('admin.dynamic_page.index', compact('dynamic_page'));
    }

    public function create()
    {
        return view('admin.dynamic_page.create');
    }

    public function store(Request $request)
    {
        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('error', env('PROJECT_NOTIFICATION'));
        }

        $dynamic_page = new DynamicPage();
        $data = $request->only($dynamic_page->getFillable());

        $request->validate([
            'dynamic_page_name' => 'required|unique:dynamic_pages',
            'dynamic_page_slug' => 'unique:dynamic_pages',
            'dynamic_page_banner' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        if(empty($data['dynamic_page_slug'])) {
            $data['dynamic_page_slug'] = Str::slug($request->dynamic_page_name);
        }

        $statement = DB::select("SHOW TABLE STATUS LIKE 'dynamic_pages'");
        $ai_id = $statement[0]->Auto_increment;
        $ext = $request->file('dynamic_page_banner')->extension();
        $final_name = 'dynamic-page-banner-'.$ai_id.'.'.$ext;
        $request->file('dynamic_page_banner')->move(public_path('uploads/'), $final_name);
        $data['dynamic_page_banner'] = $final_name;

        $dynamic_page->fill($data)->save();
        return redirect()->route('admin.dynamic_page.index')->with('success', 'Dynamic Page is added successfully!');
    }

    public function edit($id)
    {
        $dynamic_page = DynamicPage::findOrFail($id);
        return view('admin.dynamic_page.edit', compact('dynamic_page'));
    }

    public function update(Request $request, $id)
    {
        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('error', env('PROJECT_NOTIFICATION'));
        }

        $dynamic_page = DynamicPage::findOrFail($id);
        $data = $request->only($dynamic_page->getFillable());

        if($request->hasFile('dynamic_page_banner')) {
            $request->validate([
                'dynamic_page_name'   =>  [
                    'required',
                    Rule::unique('dynamic_pages')->ignore($id),
                ],
                'dynamic_page_slug'   =>  [
                    Rule::unique('dynamic_pages')->ignore($id),
                ],
                'dynamic_page_banner' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
            ]);
            unlink(public_path('uploads/'.$dynamic_page->dynamic_page_banner));
            $ext = $request->file('dynamic_page_banner')->extension();
            $final_name = 'dynamic-page-banner-'.$id.'.'.$ext;
            $request->file('dynamic_page_banner')->move(public_path('uploads/'), $final_name);
            $data['dynamic_page_banner'] = $final_name;
        } else {
            $request->validate([
                'dynamic_page_name'   =>  [
                    'required',
                    Rule::unique('dynamic_pages')->ignore($id),
                ],
                'dynamic_page_slug'   =>  [
                    Rule::unique('dynamic_pages')->ignore($id),
                ]
            ]);
            $data['dynamic_page_banner'] = $dynamic_page->dynamic_page_banner;
        }

        $dynamic_page->fill($data)->save();
        return redirect()->route('admin.dynamic_page.index')->with('success', 'Dynamic Page is updated successfully!');
    }

    public function destroy($id)
    {
        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('error', env('PROJECT_NOTIFICATION'));
        }
        
        $dynamic_page = DynamicPage::findOrFail($id);
        unlink(public_path('uploads/'.$dynamic_page->dynamic_page_banner));
        $dynamic_page->delete();
        return Redirect()->back()->with('success', 'Dynamic Page is deleted successfully!');
    }
}

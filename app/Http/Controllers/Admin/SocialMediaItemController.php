<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\SocialMediaItem;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use DB;

class SocialMediaItemController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
        $social_media = SocialMediaItem::orderBy('social_order')->get();
        return view('admin.social_media.index', compact('social_media'));
    }

    public function create()
    {
        return view('admin.social_media.create');
    }

    public function store(Request $request)
    {
        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('error', env('PROJECT_NOTIFICATION'));
        }

        $social_media = new SocialMediaItem();
        $data = $request->only($social_media->getFillable());

        $request->validate([
            'social_url' => 'required',
            'social_icon' => 'required',
            'social_order' => 'numeric|min:0|max:32767'
        ]);

        $social_media->fill($data)->save();
        return redirect()->route('admin.social_media.index')->with('success', 'Social Media Item is added successfully!');
    }

    public function edit($id)
    {
        $social_media = SocialMediaItem::findOrFail($id);
        return view('admin.social_media.edit', compact('social_media'));
    }

    public function update(Request $request, $id)
    {
        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('error', env('PROJECT_NOTIFICATION'));
        }

        $social_media = SocialMediaItem::findOrFail($id);
        $data = $request->only($social_media->getFillable());

        $request->validate([
            'social_url' => 'required',
            'social_icon' => 'required',
            'social_order' => 'numeric|min:0|max:32767'
        ]);

        $social_media->fill($data)->save();
        return redirect()->route('admin.social_media.index')->with('success', 'Social Media Item is updated successfully!');
    }

    public function destroy($id)
    {
        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('error', env('PROJECT_NOTIFICATION'));
        }
        
        $social_media = SocialMediaItem::findOrFail($id);
        $social_media->delete();
        return Redirect()->back()->with('success', 'Social Media Item is deleted successfully!');
    }
}

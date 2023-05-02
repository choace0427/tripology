<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Package;
use App\Models\Admin\PackagePhoto;
use App\Models\Admin\PackageVideo;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use DB;

class PackageController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
        $package = Package::all();
        return view('admin.package.index', compact('package'));
    }

    public function create()
    {
        $destination=DB::table('destinations')->get();
        return view('admin.package.create', compact('destination'));
    }

    public function store(Request $request)
    {
        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('error', env('PROJECT_NOTIFICATION'));
        }

        $package = new Package();
        $data = $request->only($package->getFillable());

        $request->validate([
            'p_name' => 'required|unique:packages',
            'p_slug' => 'unique:packages',
            'p_start_date' => 'required',
            'p_end_date' => 'required',
            'p_last_booking_date' => 'required',
            'p_price' => 'required',
            'p_photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ],
        [],
        [
            'p_name' => "Package Name",
            'p_slug' => "Package Slug",
            'p_start_date' => "Package Start Date",
            'p_end_date' => "Package End Date",
            'p_last_booking_date' => "Package Last Booking Date",
            'p_price' => "Package Price",
            'p_photo' => "Package Photo"
        ]);

        if(empty($data['p_slug'])) {
            $data['p_slug'] = Str::slug($request->p_name);
        }

        $statement = DB::select("SHOW TABLE STATUS LIKE 'packages'");
        $ai_id = $statement[0]->Auto_increment;
        $ext = $request->file('p_photo')->extension();
        $final_name = 'package-main-photo-'.$ai_id.'.'.$ext;
        $request->file('p_photo')->move(public_path('uploads/'), $final_name);
        $data['p_photo'] = $final_name;

        $package->fill($data)->save();
        return redirect()->route('admin.package.index')->with('success', 'Package is added successfully!');
    }

    public function edit($id)
    {
        $package = Package::findOrFail($id);
        $destination=DB::table('destinations')->get();
        return view('admin.package.edit', compact('package', 'destination'));
    }

    public function update(Request $request, $id)
    {
        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('error', env('PROJECT_NOTIFICATION'));
        }

        $package = Package::findOrFail($id);
        $data = $request->only($package->getFillable());

        if($request->hasFile('p_photo')) {
            $request->validate([
                'p_name'   =>  [
                    'required',
                    Rule::unique('packages')->ignore($id),
                ],
                'p_slug'   =>  [
                    Rule::unique('packages')->ignore($id),
                ],
                'p_photo' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
            ],
            [],
            [
                'p_name' => "Package Name",
                'p_slug' => "Package Slug",
                'p_photo' => "Package Photo"
            ]);
            unlink(public_path('uploads/'.$package->p_photo));
            $ext = $request->file('p_photo')->extension();
            $final_name = 'package-main-photo-'.$id.'.'.$ext;
            $request->file('p_photo')->move(public_path('uploads/'), $final_name);
            $data['p_photo'] = $final_name;
        } else {
            $request->validate([
                'p_name'   =>  [
                    'required',
                    Rule::unique('packages')->ignore($id),
                ],
                'p_slug'   =>  [
                    Rule::unique('packages')->ignore($id),
                ]
            ],
            [],
            [
                'p_name' => "Package Name",
                'p_slug' => "Package Slug"
            ]);
            $data['p_photo'] = $package->p_photo;
        }

        $package->fill($data)->save();
        return redirect()->route('admin.package.index')->with('success', 'Package is updated successfully!');
    }

    public function destroy($id)
    {
        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('error', env('PROJECT_NOTIFICATION'));
        }

        $package = Package::findOrFail($id);
        unlink(public_path('uploads/'.$package->p_photo));
        $package->delete();

        $package_photo = PackagePhoto::where('package_id',$id)->get();
        foreach($package_photo as $row)
        {
            unlink(public_path('uploads/'.$row->photo));
            DB::table('package_photos')->where('package_id',$row->package_id)->delete();
        }

        DB::table('package_videos')->where('package_id',$id)->delete();

        return Redirect()->back()->with('success', 'Package is deleted successfully!');
    }

    public function photo($id)
    {
        $package_photo = PackagePhoto::where('package_id',$id)->get();
        $package_id = $id;
        return view('admin.package.photo', compact('package_photo','package_id'));
    }

    public function photostore(Request $request)
    {
        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('error', env('PROJECT_NOTIFICATION'));
        }

        $package_photo = new PackagePhoto();
        $data = $request->only($package_photo->getFillable());

        $request->validate([
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);
        $statement = DB::select("SHOW TABLE STATUS LIKE 'package_photos'");
        $ai_id = $statement[0]->Auto_increment;
        $ext = $request->file('photo')->extension();
        $final_name = 'package-photo-'.$ai_id.'.'.$ext;
        $request->file('photo')->move(public_path('uploads/'), $final_name);
        $data['photo'] = $final_name;
        $data['project_id'] = $request->project_id;
        $package_photo->fill($data)->save();
        return redirect()->back()->with('success', 'Package Photo is added successfully!');
    }

    public function photodelete($id)
    {
        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('error', env('PROJECT_NOTIFICATION'));
        }
        
        $package_photo = PackagePhoto::findOrFail($id);
        unlink(public_path('uploads/'.$package_photo->photo));
        $package_photo->delete();
        return Redirect()->back()->with('success', 'Package Photo is deleted successfully!');
    }

    public function video($id)
    {
        $package_video = PackageVideo::where('package_id',$id)->get();
        $package_id = $id;
        return view('admin.package.video', compact('package_video','package_id'));
    }

    public function videostore(Request $request)
    {
        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('error', env('PROJECT_NOTIFICATION'));
        }

        $package_video = new PackageVideo();
        $data = $request->only($package_video->getFillable());

        $request->validate([
            'video_youtube_id' => 'required'
        ]);
        $data['video_youtube_id'] = $request->video_youtube_id;
        $data['project_id'] = $request->project_id;
        $package_video->fill($data)->save();
        return redirect()->back()->with('success', 'Package Video is added successfully!');
    }

    public function videodelete($id)
    {
        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('error', env('PROJECT_NOTIFICATION'));
        }
        
        $package_video = PackageVideo::findOrFail($id);
        $package_video->delete();
        return Redirect()->back()->with('success', 'Package Video is deleted successfully!');
    }
}

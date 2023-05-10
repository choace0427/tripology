<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Spotlight;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use DB;

class SpotlightController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
        $spotlight = Spotlight::first();
        return view('admin.spotlight.index', compact('spotlight'));
    }

    public function store(Request $request)
    {
        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('error', env('PROJECT_NOTIFICATION'));
        }

       

        $spotlight = Spotlight::count();
        if($spotlight == 0){

            $request->validate([
                'spotlight_facilities_photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);

            $ext = $request->file('spotlight_facilities_photo')->extension();
            $final_name = 'spotlight-'.time().'.'.$ext;
            $request->file('spotlight_facilities_photo')->move(public_path('uploads'), $final_name);

            
            $data = $request->only($spotlight->getFillable());
            unset($data['spotlight_facilities_photo']);
            $data['spotlight_facilities_photo'] = $final_name;

            $slider->fill($data)->save();
        }else{
            $spotlight = Spotlight::first();
            if($request->file('spotlight_facilities_photo')){
                if($spotlight->spotlight_facilities_photo != ''){
                    unlink(public_path('uploads/'.$spotlight->spotlight_facilities_photo));
                }
                // Uploading new photo
                $ext = $request->file('spotlight_facilities_photo')->extension();
                $final_name = 'spotlight-'.time().'.'.$ext;
                $request->file('spotlight_facilities_photo')->move(public_path('uploads/'), $final_name);
        
                $data['spotlight_facilities_photo'] = $final_name;
            }
            $data = $request->only($spotlight->getFillable());
            unset($data['spotlight_facilities_photo']);
            Spotlight::where('id',$spotlight->id)->update($data);
        }
        
        return redirect()->route('admin.spotlight.index')->with('success', 'Spotlight is added successfully!');
    }

}

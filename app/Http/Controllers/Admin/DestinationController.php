<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Destination;
use App\Models\Admin\Package;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use DB;

class DestinationController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
        $destination = Destination::with('parent')->get();
        return view('admin.destination.index', compact('destination'));
    }

    public function create()
    {
        $parents = Destination::with('children')->select('id','d_name','d_parent_id')->get();
        //dd($parents);
        return view('admin.destination.create', compact('parents'));
    }

    public function store(Request $request)
    {
        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('error', env('PROJECT_NOTIFICATION'));
        }

        $destination = new Destination();
        $data = $request->only($destination->getFillable());
        $isParent = Destination::select('d_parent_id')->where('id',$data['d_parent_id'])->first();
        if(isset($isParent) && $isParent->d_parent_id != 0){
            return redirect()->back()->withInput()->with('error', 'Please Select Parent Only!');
        }
        $request->validate([
            'd_name' => 'required|unique:destinations',
            'd_slug' => 'unique:destinations',
            'd_photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ],
        [],
        [
            'd_name' => "Destination Name",
            'd_slug' => "Destination Slug",
            'd_photo' => "Destination Photo",
        ]);

        if(empty($data['d_slug'])) {
            $data['d_slug'] = Str::slug($request->d_name);
        }

        $statement = DB::select("SHOW TABLE STATUS LIKE 'destinations'");
        $ai_id = $statement[0]->Auto_increment;
        $ext = $request->file('d_photo')->extension();
        $final_name = 'destination-'.$ai_id.'.'.$ext;
        $request->file('d_photo')->move(public_path('uploads/'), $final_name);
        $data['d_photo'] = $final_name;

        $destination->fill($data)->save();
        return redirect()->route('admin.destination.index')->with('success', 'Destination is added successfully!');
    }

    public function edit($id)
    {
        $destination = Destination::findOrFail($id);
        $parents = Destination::with('children')->select('id','d_name','d_parent_id')->get();
        return view('admin.destination.edit', compact('destination', 'parents'));
    }

    public function update(Request $request, $id)
    {
        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('error', env('PROJECT_NOTIFICATION'));
        }

        $destination = Destination::findOrFail($id);
        $data = $request->only($destination->getFillable());
        $isParent = Destination::select('d_parent_id')->where('id',$data['d_parent_id'])->first();
        if(isset($isParent) && $isParent->d_parent_id != 0){
            return redirect()->back()->with('error', 'Please Select Parent Only!');
        }
        if($request->hasFile('d_photo')) {
            $request->validate([
                'd_name'   =>  [
                    'required',
                    Rule::unique('destinations')->ignore($id),
                ],
                'd_slug'   =>  [
                    Rule::unique('destinations')->ignore($id),
                ],
                'd_photo' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
            ],
            [],
            [
                'd_name' => "Destination Name",
                'd_slug' => "Destination Slug",
                'd_photo' => "Destination Photo",
            ]);
            if(file_exists(public_path('uploads/'.$destination->d_photo))){
                unlink(public_path('uploads/'.$destination->d_photo));
            }
            $ext = $request->file('d_photo')->extension();
            $final_name = 'destination-'.$id.'.'.$ext;
            $request->file('d_photo')->move(public_path('uploads/'), $final_name);
            $data['d_photo'] = $final_name;
        } else {
            $request->validate([
                'd_name'   =>  [
                    'required',
                    Rule::unique('destinations')->ignore($id),
                ],
                'd_slug'   =>  [
                    Rule::unique('destinations')->ignore($id),
                ]
            ],
            [],
            [
                'd_name' => "Destination Name",
                'd_slug' => "Destination Slug"
            ]);
            $data['d_photo'] = $destination->d_photo;
            $data['d_parent_id'] = $request->d_parent_id;
        }

        $destination->fill($data)->save();
        return redirect()->route('admin.destination.index')->with('success', 'Destination is updated successfully!');
    }

    public function destroy($id)
    {
        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('error', env('PROJECT_NOTIFICATION'));
        }
        
        // Check if there is package under this destination
        $get_pkg = DB::table('packages')->where('destination_id', $id)->first();
        if($get_pkg)
        {
            echo 'Do not delete, because there is package under this';
            return Redirect()->back()->with('error', 'Destination can not be deleted, because there is package under this!');
        }
        else {
            $destination = Destination::findOrFail($id);
            unlink(public_path('uploads/'.$destination->d_photo));
            $destination->delete();
            return Redirect()->back()->with('success', 'Destination is deleted successfully!');
        }
    }
}

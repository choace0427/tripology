<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Admin;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use DB;

class ProfileChangeController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
        $admin_data = Admin::where('id',session('id'))->first();
        return view('admin.auth.profile_change', compact('admin_data'));
    }

    public function update(Request $request)
    {
        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('error', env('PROJECT_NOTIFICATION'));
        }
        
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
        ]);

        $data['name'] = $request->name;
        $data['email'] = $request->email;
        Admin::where('id',session('id'))->update($data);

        session(['name' => $request->name]);
        session(['email' => $request->email]);

        return redirect()->back()->with('success', 'Profile Information is updated successfully!');

    }

}

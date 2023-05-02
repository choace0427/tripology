<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Traveller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use DB;

class TravellerController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
        $travellers = Traveller::all();
        return view('admin.traveller.index', compact('travellers'));
    }

    public function detail($id)
    {
        $traveller_detail = DB::table('travellers')->where('id',$id)->first();
        return view('admin.traveller.detail', compact('traveller_detail'));
    }

    public function make_active($id)
    {
        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('error', env('PROJECT_NOTIFICATION'));
        }

        $data['traveller_status'] = 'Active';
        DB::table('travellers')->where('id',$id)->update($data);

        return redirect()->route('admin.traveller.index')->with('success', 'Traveller status is changed to active successfully!');
    }

    public function make_pending($id)
    {
        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('error', env('PROJECT_NOTIFICATION'));
        }

        $data['traveller_status'] = 'Pending';
        DB::table('travellers')->where('id',$id)->update($data);

        return redirect()->route('admin.traveller.index')->with('success', 'Traveller status is changed to pending successfully!');
    }

    public function destroy($id)
    {
        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('error', env('PROJECT_NOTIFICATION'));
        }
        
        DB::table('travellers')->where('id', $id)->delete();

        return Redirect()->back()->with('success', 'Traveller is deleted successfully!');
    }

}

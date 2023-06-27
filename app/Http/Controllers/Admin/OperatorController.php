<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use DB;

class OperatorController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
        $operators = Admin::where('role','agency')->latest()->get();
        return view('admin.operator.index', compact('operators'));
    }

    public function detail($id)
    {
        $operator_detail = DB::table('admins')->where('id',$id)->first();
        return view('admin.operator.detail', compact('operator_detail'));
    }

    public function make_active($id)
    {
        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('error', env('PROJECT_NOTIFICATION'));
        }

        $data['status'] = '1';
        DB::table('admins')->where('id',$id)->update($data);

        return redirect()->route('admin.operator.index')->with('success', 'Operator status is changed to active successfully!');
    }

    public function make_pending($id)
    {
        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('error', env('PROJECT_NOTIFICATION'));
        }

        $data['status'] = '0';
        DB::table('admins')->where('id',$id)->update($data);

        return redirect()->route('admin.operator.index')->with('success', 'Operator status is changed to pending successfully!');
    }

    public function destroy($id)
    {
        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('error', env('PROJECT_NOTIFICATION'));
        }
        
        DB::table('admins')->where('id', $id)->delete();

        return Redirect()->back()->with('success', 'Operator is deleted successfully!');
    }

}

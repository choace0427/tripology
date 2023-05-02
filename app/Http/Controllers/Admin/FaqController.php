<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Faq;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use DB;

class FaqController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
        $faq = Faq::orderBy('faq_order')->get();
        return view('admin.faq.index', compact('faq'));
    }

    public function create()
    {
        return view('admin.faq.create');
    }

    public function store(Request $request)
    {
        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('error', env('PROJECT_NOTIFICATION'));
        }

        $faq = new Faq();
        $data = $request->only($faq->getFillable());

        $request->validate([
            'faq_title' => 'required',
            'faq_content' => 'required',
            'faq_order' => 'numeric|min:0|max:32767'
        ]);

        $faq->fill($data)->save();
        return redirect()->route('admin.faq.index')->with('success', 'FAQ is added successfully!');
    }

    public function edit($id)
    {
        $faq = Faq::findOrFail($id);
        return view('admin.faq.edit', compact('faq'));
    }

    public function update(Request $request, $id)
    {
        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('error', env('PROJECT_NOTIFICATION'));
        }

        $faq = Faq::findOrFail($id);
        $data = $request->only($faq->getFillable());

        $request->validate([
            'faq_title' => 'required',
            'faq_content' => 'required',
            'faq_order' => 'numeric|min:0|max:32767'
        ]);

        $faq->fill($data)->save();
        return redirect()->route('admin.faq.index')->with('success', 'FAQ is updated successfully!');
    }

    public function destroy($id)
    {
        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('error', env('PROJECT_NOTIFICATION'));
        }
        
        $faq = Faq::findOrFail($id);
        $faq->delete();
        return Redirect()->back()->with('success', 'FAQ is deleted successfully!');
    }
}

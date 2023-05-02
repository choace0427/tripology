<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\FooterColumn;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use DB;

class FooterColumnController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
        $footer_columns = FooterColumn::orderBy('column_name')->orderBy('column_item_order')->get();
        return view('admin.footer_column.index', compact('footer_columns'));
    }

    public function create()
    {
        return view('admin.footer_column.create');
    }

    public function store(Request $request)
    {
        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('error', env('PROJECT_NOTIFICATION'));
        }

        $footer_column_item = new FooterColumn();
        $data = $request->only($footer_column_item->getFillable());

        $request->validate([
            'column_item_text' => 'required',
            'column_item_url' => 'required',
            'column_item_order' => 'numeric|min:0|max:32767'
        ]);

        $footer_column_item->fill($data)->save();
        return redirect()->route('admin.footer.index')->with('success', 'Column Item is added successfully!');
    }

    public function edit($id)
    {
        $footer_column_item = FooterColumn::findOrFail($id);
        return view('admin.footer_column.edit', compact('footer_column_item'));
    }

    public function update(Request $request, $id)
    {
        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('error', env('PROJECT_NOTIFICATION'));
        }

        $footer_column_item = FooterColumn::findOrFail($id);
        $data = $request->only($footer_column_item->getFillable());

        $request->validate([
            'column_item_text' => 'required',
            'column_item_url' => 'required',
            'column_item_order' => 'numeric|min:0|max:32767'
        ]);

        $footer_column_item->fill($data)->save();
        return redirect()->route('admin.footer.index')->with('success', 'Column Item is updated successfully!');
    }

    public function destroy($id)
    {
        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('error', env('PROJECT_NOTIFICATION'));
        }
        
        $footer_column_item = FooterColumn::findOrFail($id);
        $footer_column_item->delete();
        return Redirect()->back()->with('success', 'Column Item is deleted successfully!');
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use DB;
use File;

class LanguageController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
        $json_data = json_decode(file_get_contents(resource_path('lang/main.json')));
        return view('admin.language.index', compact('json_data'));
    }

    public function update(Request $request)
    {
        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('error', env('PROJECT_NOTIFICATION'));
        }
        
        // Form Data
        $arr_key = [];
        foreach($request->key_arr as $item) {
            $arr_key[] = $item;
        }
        $arr_value = [];
        foreach($request->value_arr as $item) {
            $arr_value[] = $item;
        }

        // Updating Data
        for($i=0;$i<count($arr_key);$i++) {
            $data[$arr_key[$i]] = $arr_value[$i];
        }

        // New Data inserting into the existing json
        $new_json = json_encode($data,JSON_PRETTY_PRINT);
        file_put_contents(resource_path('lang/main.json'), $new_json);

        return redirect()->route('admin.language.index')->with('success', 'Language is updated successfully!');
    }
}

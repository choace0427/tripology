<?php 

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Admin\Filter;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use DB;

class FilterController extends Controller {
    public function __construct() {
        $this->middleware('admin');
    }

    public function index() {
        // $filter = Filter::all();
        $filter = DB::select("SELECT * FROM filter_option ORDER BY filter_type");
        return view('admin.filter.index', compact('filter'));
    }

    public function create() {
        $filter_type = DB::select('SELECT filter_type FROM filter_option GROUP BY filter_type');
        return view('admin.filter.create', compact('filter_type'));
    }

    public function store(Request $request) {
        var_dump("store");
        $filter = new Filter();
        $data = $request->only($filter->getFillable());

        $request->validate([
            'filter_name' => 'required|unique:filter_option',
            'filter_slug' => 'unique:filter_option',
            'filter_type' => 'required_if:filter_type,""',
        ],
        [],
        [
            'filter_name' => "Filter Option Name",
            'filter_slug' => "Filter Option Slug",
            'filter_type' => "Filter Option Type",
        ]);
        
        $filter->fill($data)->save();
        return redirect()->route('admin.filter.index')->with('success', 'Package is created successfully!');
    }

    public function delete($id) {
        $filter = Filter::findOrFail($id);
        $filter->delete();

        DB::table('filter_option')->where('id',$id)->delete();

        return Redirect()->back()->with('success', 'Filter is deleted successfully!');

    }

    public function edit($id) {
        $filter = Filter::findOrFail($id);
        $filter_type = DB::select("SELECT DISTINCT filter_type FROM filter_option");
        $selected = DB::select("SELECT filter_type FROM filter_option WHERE id =".$id."");
        return view('admin.filter.edit', compact('filter', 'filter_type', 'selected'));
    }

    public function update(Request $request, $id) {
        $filter = Filter::findOrFail($id);
        $data = $request->only($filter->getFillable());
        $request->validate([
                'filter_name'   =>  [
                    'required',
                    Rule::unique('filter_option')->ignore($id),
                ],
                'filter_slug'   =>  [
                    Rule::unique('filter_option')->ignore($id),
                ],
                'filter_type' => 'required',
            ],
            [],
            [
                'filter_name' => "Filter Option Name",
                'filter_slug' => "Filter Option Slug",
                'filter_type' => "Filter Option Type",
            ]);
        $filter->fill($data)->save();
        return redirect()->route('admin.filter.index')->with('success', 'Package is updated successfully!');
    }
}

?>
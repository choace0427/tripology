<?php

namespace App\Http\Controllers\Front;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\package;
use DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class FilterController extends Controller
{
    public function index() {
            $accomodation = DB::table('filter_option')->where('filter_type', 'accomodation')->get();
            $traveller_type = DB::table('filter_option')->where('filter_type', 'traveller_type')->get();
            $duration = DB::table('filter_option')->where('filter_type', 'duration')->get();
            $transposition = DB::table('filter_option')->where('filter_type', 'transposition')->get();
            $ratings = DB::table('filter_option')->where('filter_type', 'rating')->get();
            $distance = DB::table('filter_option')->where('filter_type', 'distance')->get();
            $price = DB::table('filter_option')->where('filter_type', 'price')->get();
            $destination=DB::table('destinations')->get();
            $filter_count = DB::table("packages")->count();
            // $filter_data = DB::table('packages')->get();
            $filter_data = DB::select("SELECT * FROM packages ORDER BY id LIMIT 5 OFFSET 0");
    
            $page = ceil(count(DB::table('packages')->get()) / 5);
            $type_list = "";
            
            return view('pages.package_filter', compact('filter_data', 'type_list', 'filter_count', 'page', 'price', 'destination', 'duration', 'accomodation', 'traveller_type', 'distance', 'ratings', 'transposition'));
    }

    public function package_filter($slug, Request $request) {
        
        $array = explode("+", $slug);
        $subarray_data = array();
        foreach ($array as $row){
            $subarray = explode("=", $row);
            $subarray_data[$subarray[0]] = $subarray[1]; 
        }

        $accomodation = DB::table('filter_option')->where('filter_type', 'accomodation')->get();
        $traveller_type = DB::table('filter_option')->where('filter_type', 'traveller_type')->get();
        $duration = DB::table('filter_option')->where('filter_type', 'duration')->get();
        $transposition = DB::table('filter_option')->where('filter_type', 'transposition')->get();
        $ratings = DB::table('filter_option')->where('filter_type', 'rating')->get();
        $distance = DB::table('filter_option')->where('filter_type', 'distance')->get();
        $price = DB::table('filter_option')->where('filter_type', 'price')->get();
        $destination=DB::table('destinations')->get();
        $type_list = '';
        if($request->page) {
            $offset = 5 * ($request->page - 1);
        } else {
            $offset = 0;
        }
        $filter_count = '';
        $page = ceil(count(DB::table('packages')->get()) / 5);
        
        if($subarray_data == null) {
            dd(qweqwe);
        } else {
            $query = "SELECT * from packages where id in ( SELECT t_1.package_id ";
            $i=1;
            $data = '';
            foreach($subarray_data as $key => $value) {
                $type = explode(',', $value);
                $quoted_type = array_map(function($type_item) use (&$data) {
                    $data .= '"' . addslashes($type_item) . '",';
                }, $type);
            }
            $type_list = rtrim($data, ','); 
            foreach ($subarray_data as $key => $value) {
                $ddd = "SELECT * FROM filter_option WHERE filter_slug in (".$type_list.")";
                $id = DB::select("SELECT * FROM filter_option WHERE filter_slug in (".$type_list.")");
                $id_list = "";
                foreach($id as $row){
                    $id_list = $id_list . $row->id. ",";
                }
                $id_list = substr($id_list, 0, -1);
                $ids = explode(",", $id_list);
                $subarrays = array_chunk($ids, 2);
                $output_array = array_map(function ($subarray) {
                    return implode(", ", $subarray);
                }, $subarrays);
                $output = implode(", ", $output_array);
                if($i == 1){
                    $query = $query."FROM (SELECT * FROM package_filter WHERE filter_id in (".$output.")) t_1 ";
                    $i++;
                    continue;
                }
                if($id_list){
                    $j = $i -1;
                    $query = $query."INNER JOIN (SELECT * FROM package_filter WHERE filter_id in (".$output.")) t_".$i." ON t_".$j.".package_id = t_".$i.".package_id ";
                }
                $i++;
            }
            $query = $query.") ORDER BY id LIMIT 5 OFFSET ".$offset." ";
            $filter_data = DB::select($query);
            $page = ceil(count($filter_data) / 5);
            $filter_count = count($filter_data);
        }

        return view('pages.package_filter', compact('filter_data', 'type_list', 'filter_count', 'page', 'price', 'destination', 'duration', 'accomodation', 'traveller_type', 'distance', 'ratings', 'transposition'));
        // return array('status' => "success", "page" =>$page, "filter_count" => $filter_count, "data" => $filter_data, "accomodation" => $accomodation, "traveller_type" => $traveller_type, "duration" => $duration, "transposition" => $transposition, "ratings" => $ratings, "distance" => $distance, "price" => $price, "destination" => $destination );
    }

}
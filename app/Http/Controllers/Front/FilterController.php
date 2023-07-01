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
        $combine = DB::table('filter_option')->where('filter_type', 'combine')->get();
        $destination=DB::table('destinations')->get();
        $filter_count = DB::table("packages")->count();
        $filter_slug = "";
        
        // $filter_data = DB::table('packages')->get();
        $filter_data = DB::select("SELECT * FROM packages ORDER BY id LIMIT 5 OFFSET 0");
        $page = ceil(count(DB::table('packages')->get()) / 5);
        $type_list = "";
        
        return view('pages.package_filter', compact('filter_data', 'filter_slug', 'combine', 'type_list', 'filter_count', 'page', 'price', 'destination', 'duration', 'accomodation', 'traveller_type', 'distance', 'ratings', 'transposition'));
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
        $combine = DB::table('filter_option')->where('filter_type', 'combine')->get();
        $destination=DB::table('destinations')->get();
        $filter_slug = $slug;
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
            $subarray_id = array();
               
            foreach($subarray_data as $key => $value) {
                $type = explode(',', $value);
                $quoted_type = array_map(function($type_item) use (&$data) {
                    $data .= '"' . addslashes($type_item) . '",';
                }, $type);
                $quoted_type = "";
                $data = substr($data, 0, -1);
                $ids = DB::select("SELECT id FROM filter_option WHERE filter_slug in (".$data.")");
                $data="";

                $ids_result = collect($ids)->pluck('id')->toArray();
                $quoted_type_ids = array_map(function($type_item_ids) use (&$tmp) {
                    $tmp .= '"' . addslashes($type_item_ids) . '",';
                }, $ids_result);
                $tmp = substr($tmp, 0, -1);
                $a = array($tmp);
                $tmp = "";
                $subarray_id = array_merge($subarray_id,$a);
            }

            foreach($subarray_data as $key => $value) {
                    $type = explode(',', $value);
                    $quoted_type = array_map(function($type_item) use (&$data) {
                        $data .= '"' . addslashes($type_item) . '",';
                    }, $type);
                }

            $type_list = rtrim($data, ','); 
            foreach ($subarray_id as $key => $value) {

                if($i == 1){
                    $query = $query."FROM (SELECT * FROM package_filter WHERE filter_id in (".$value.")) t_1 ";
                    $i++;
                    continue;
                }
                    $j = $i -1;
                    $query = $query."INNER JOIN (SELECT * FROM package_filter WHERE filter_id in (".$value.")) t_".$i." ON t_".$j.".package_id = t_".$i.".package_id ";
                $i++;
            } 
            $query = $query.")";
            $filter_data = DB::select($query);
            if(count($filter_data) > 5) {
                $page = ceil(count($filter_data) / 5);    
                $filter_count = count($filter_data);
                $query = $query."ORDER BY id LIMIT 5 OFFSET ".$offset." ";
                $filter_data = DB::select($query);
            } else{
                $query = $query."ORDER BY id LIMIT 5 OFFSET ".$offset." ";
                $filter_data = DB::select($query);
                $page = ceil(count($filter_data) / 5);
                $filter_count = count($filter_data);
            }
        }

        return view('pages.package_filter', compact('filter_data', 'filter_slug', 'combine', 'type_list', 'filter_count', 'page', 'price', 'destination', 'duration', 'accomodation', 'traveller_type', 'distance', 'ratings', 'transposition'));
        // return array('status' => "success", "page" =>$page, "filter_count" => $filter_count, "data" => $filter_data, "accomodation" => $accomodation, "traveller_type" => $traveller_type, "duration" => $duration, "transposition" => $transposition, "ratings" => $ratings, "distance" => $distance, "price" => $price, "destination" => $destination );
    }

    public function package_filter_pagination(Request $request) {
        if($request->filterUrl == null) {
            $accomodation = DB::table('filter_option')->where('filter_type', 'accomodation')->get();
            $traveller_type = DB::table('filter_option')->where('filter_type', 'traveller_type')->get();
            $duration = DB::table('filter_option')->where('filter_type', 'duration')->get();
            $transposition = DB::table('filter_option')->where('filter_type', 'transposition')->get();
            $ratings = DB::table('filter_option')->where('filter_type', 'rating')->get();
            $distance = DB::table('filter_option')->where('filter_type', 'distance')->get();
            $price = DB::table('filter_option')->where('filter_type', 'price')->get();
            $combine = DB::table('filter_option')->where('filter_type', 'combine')->get();
            $destination=DB::table('destinations')->get();
            $filter_count = DB::table("packages")->count();
            $filter_slug = "";
            $sort_option = $request->sort_option;
            $offset = 5 * (intval($request->page) - 1);
            $filter_data = DB::select("SELECT * FROM packages ORDER BY ".$sort_option." LIMIT 5 OFFSET ".$offset."");
            $page = ceil(count(DB::table('packages')->get()) / 5);
            $type_list = "";
            return response()->json([
                'filter_data' => $filter_data,
                'filter_slug' => $filter_slug,
                'combine' => $combine,
                'type_list' => $type_list,
                'filter_count' => $filter_count,
                'page' => $page,
                'price' => $price,
                'destination' => $destination,
                'duration' => $duration,
                'accomodation' => $accomodation,
                'traveller_type' => $traveller_type,
                'distance' => $distance,
                'ratings' => $ratings,
                'transposition' => $transposition
            ]);
        } else {
            $array = explode("+", $request->filterUrl);
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
            $combine = DB::table('filter_option')->where('filter_type', 'combine')->get();
            $destination=DB::table('destinations')->get();
            $sort_option = $request->sort_option;
            $filter_slug = $request->filterUrl;
            $type_list = '';
            if(intval($request->page)) {
                $offset = 5 * (intval($request->page) - 1);
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
                $subarray_id = array();
               
                foreach($subarray_data as $key => $value) {
                    $type = explode(',', $value);
                    $quoted_type = array_map(function($type_item) use (&$data) {
                        $data .= '"' . addslashes($type_item) . '",';
                    }, $type);
                    $quoted_type = "";
                    $data = substr($data, 0, -1);
                    $ids = DB::select("SELECT id FROM filter_option WHERE filter_slug in (".$data.")");
                    $data="";

                    $ids_result = collect($ids)->pluck('id')->toArray();
                    $quoted_type_ids = array_map(function($type_item_ids) use (&$tmp) {
                        $tmp .= '"' . addslashes($type_item_ids) . '",';
                    }, $ids_result);
                    $tmp = substr($tmp, 0, -1);
                    $a = array($tmp);
                    $tmp = "";
                    $subarray_id = array_merge($subarray_id,$a);
                }

                foreach($subarray_data as $key => $value) {
                    $type = explode(',', $value);
                    $quoted_type = array_map(function($type_item) use (&$data) {
                        $data .= '"' . addslashes($type_item) . '",';
                    }, $type);
                }
                $type_list = rtrim($data, ','); 
                foreach ($subarray_id as $key => $value) {
                    if($i == 1){
                        $query = $query."FROM (SELECT * FROM package_filter WHERE filter_id in (".$value.")) t_1 ";
                        $i++;
                        continue;
                    }
                        $j = $i -1;
                        $query = $query."INNER JOIN (SELECT * FROM package_filter WHERE filter_id in (".$value.")) t_".$i." ON t_".$j.".package_id = t_".$i.".package_id ";
                    $i++;
                }
                $query = $query.") ORDER BY ".$sort_option." LIMIT 5 OFFSET ".$offset." ";

                $filter_data = DB::select($query);
                $page = ceil(count($filter_data) / 5);
                $filter_count = count($filter_data);
                
                return response()->json([
                    'filter_data' => $filter_data,
                    'filter_slug' => $filter_slug,
                    'combine' => $combine,
                    'type_list' => $type_list,
                    'filter_count' => $filter_count,
                    'page' => $page,
                    'price' => $price,
                    'destination' => $destination,
                    'duration' => $duration,
                    'accomodation' => $accomodation,
                    'traveller_type' => $traveller_type,
                    'distance' => $distance,
                    'ratings' => $ratings,
                    'transposition' => $transposition
                ]);

                // return view('pages.package_filter', compact('filter_data', 'filter_slug', 'combine', 'type_list', 'filter_count', 'page', 'price', 'destination', 'duration', 'accomodation', 'traveller_type', 'distance', 'ratings', 'transposition'));
            }
    }

        // return array('status' => "success", "page" =>$page, "filter_count" => $filter_count, "data" => $filter_data, "accomodation" => $accomodation, "traveller_type" => $traveller_type, "duration" => $duration, "transposition" => $transposition, "ratings" => $ratings, "distance" => $distance, "price" => $price, "destination" => $destination );
    }

}
<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Package;
use App\Models\Admin\Admin;
use App\Models\Admin\PackagePhoto;
use App\Models\Admin\PackageSchedule;
use App\Models\Admin\PackageItinerary;
use App\Models\Admin\PackageVideo;
use App\Models\Admin\Filter;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use DB;

class PackageController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
        $package = Package::all();
        return view('admin.package.index', compact('package'));
    }

    public function create()
    {
        $ranges = [ 
            '18-24' => 18,
            '25-35' => 25,
            '36-45' => 36,
            '46+' => 46
        ];
    
        $accomodation = DB::table('filter_option')->where('filter_type', 'accomodation')->get();
        $traveller_type = DB::table('filter_option')->where('filter_type', 'traveller_type')->get();
        $transposition = DB::table('filter_option')->where('filter_type', 'transposition')->get();
        $ratings = DB::table('filter_option')->where('filter_type', 'rating')->get();
        $distance = DB::table('filter_option')->where('filter_type', 'distance')->get();
        $combine = DB::table('filter_option')->where('filter_type', 'combine')->get();
        $price_range = DB::table('filter_option')->where('filter_type', 'price')->get();

        $destination=DB::table('destinations')->get();
        return view('admin.package.create', compact('destination', 'price_range', 'combine', 'ranges', 'accomodation', 'traveller_type', 'distance', 'ratings', 'transposition'));
    }

    public function store(Request $request)
    {
        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('error', env('PROJECT_NOTIFICATION'));
        }
        $package = new Package();
        $data = $request->only($package->getFillable());
        $request->validate([
            'p_name' => 'required|unique:packages',
            'p_slug' => 'unique:packages',
            'p_start_date' => 'required',
            'p_end_date' => 'required',
            'p_last_booking_date' => 'required',
            'p_price' => 'required',
            'p_photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'p_age_range' => 'required|numeric',
            'p_max_group_size' => 'required|numeric',
            'p_tour_operator' => 'required|numeric',
            'p_started_from' => 'required',
            'p_operated_in' => 'required',
            'p_photo' => 'required',
            'p_transposition_id' => 'required',
            'p_accomodation_id' => 'required',
            'p_traveller_id' => 'required',
            'p_rating' => 'required',
            'p_distance_id' => 'required',
            'p_travel_guide' => 'required',
            'p_travel_day' => 'required',
            'p_travel_type' => 'required',
            'p_travel_accomodation' => 'required',
            'p_price_id' => 'required',
            'p_combine_id' => 'required',
            'destination_id' => 'required'
        ],
        [],
        [
            'p_name' => "Package Name",
            'p_slug' => "Package Slug",
            'p_start_date' => "Package Start Date",
            'p_end_date' => "Package End Date",
            'p_last_booking_date' => "Package Last Booking Date",
            'p_price' => "Package Price",
            'p_photo' => "Package Photo",
            'p_age_range' => 'Package Age Range',
            'p_max_group_size' => 'Package Max Group Size',
            'p_tour_operator' => 'Package Tour Operator',
            'p_started_from' => 'Package Started From',
            'p_operated_in' => 'Package Operated In',
            'accomodation_id' => 'Package Accomodation Type',
            'rating_id' => 'Package Hotel Rating Type',
            'distance_id' => 'Package Distance Type',
            'traveller_id' => 'Package Traveller Type',
            'transposition_id' => 'Package Transposition Type',
            'p_travel_guide' => 'Package Travel Guide',
            'p_travel_day' => 'Package Travel Duration',
            'p_travel_Type' => 'Package Travel Type',
            'p_travel_accomodation' => 'Package Travel Accomodation',
            'p_price_id' => 'Package Price',
            'p_combine_id' => 'Package Combine',
            'destination_id' => 'Package Destination'
        ]);
        
        if(empty($data['p_slug'])) {
            $data['p_slug'] = Str::slug($request->p_name);
        }
        
        $statement = DB::select("SHOW TABLE STATUS LIKE 'packages'");
        $ai_id = $statement[0]->Auto_increment;
        $ext = $request->file('p_photo')->extension();
        $final_name = 'package-main-photo-'.$ai_id.'.'.$ext;
        $request->file('p_photo')->move(public_path('uploads/'), $final_name);
        $data['p_photo'] = $final_name;
        
        $package->fill($data)->save();
        $new_package = DB::table('packages')->latest()->first();

        DB::table('package_filter')->insert(
            ['package_id' => $new_package->id , 'filter_id' => $data['destination_id']]
        );
        DB::table('package_filter')->insert(
            ['package_id' => $new_package->id , 'filter_id' => $data['p_transposition_id']]
        );
        DB::table('package_filter')->insert(
            ['package_id' => $new_package->id , 'filter_id' => $data['p_accomodation_id']]
        );
        DB::table('package_filter')->insert(
            ['package_id' => $new_package->id , 'filter_id' => $data['p_traveller_id']]
        );
        DB::table('package_filter')->insert(
            ['package_id' => $new_package->id , 'filter_id' => $data['p_rating']]
        );
        DB::table('package_filter')->insert(
            ['package_id' => $new_package->id , 'filter_id' => $data['p_distance_id']]
        );
        DB::table('package_filter')->insert(
            ['package_id' => $new_package->id , 'filter_id' => $data['p_combine_id']]
        );
        DB::table('package_filter')->insert(
            ['package_id' => $new_package->id , 'filter_id' => $data['p_price_id']]
        );
        if($package->fill($data)->save()) {
            return response()->json(['status' => 'success', 'msg' => 'Package is added successfully!']);
        } else {
            return response()->json(['status' => 'error', 'msg' => 'Package added failed!']);
        }
    }

    public function edit($id)
    {
        $package = Package::findOrFail($id);
        $destination=DB::table('destinations')->get();
        $ranges = [ 
            '18-24' => 18,
            '25-35' => 25,
            '36-45' => 36,
            '46+' => 46
        ];
        $accomodation = DB::table('filter_option')->where('filter_type', 'accomodation')->get();
        $traveller_type = DB::table('filter_option')->where('filter_type', 'traveller_type')->get();
        $transposition = DB::table('filter_option')->where('filter_type', 'transposition')->get();
        $ratings = DB::table('filter_option')->where('filter_type', 'rating')->get();
        $distance = DB::table('filter_option')->where('filter_type', 'distance')->get();
        $combine = DB::table('filter_option')->where('filter_type', 'combine')->get();
        $price_range = DB::table('filter_option')->where('filter_type', 'price')->get();
        
        $agencies = Admin::get()->pluck('name','id');
        return view('admin.package.edit', compact('package', 'price_range', 'destination', 'agencies', 'combine', 'ranges', 'accomodation', 'traveller_type', 'distance', 'ratings', 'transposition'));
    }

    public function update(Request $request, $id)
    {   
        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('error', env('PROJECT_NOTIFICATION'));
        }
        $package = Package::findOrFail($id);

        $data = $request->only($package->getFillable());
        if($request->hasFile('p_photo')) {
            $request->validate([
                'p_name' => 'required|unique:packages',
                'p_slug' => 'unique:packages',
                'p_start_date' => 'required',
                'p_end_date' => 'required',
                'p_last_booking_date' => 'required',
                'p_price' => 'required',
                'p_photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
                'p_age_range' => 'required|numeric',
                'p_max_group_size' => 'required|numeric',
                'p_tour_operator' => 'required|numeric',
                'p_started_from' => 'required',
                'p_operated_in' => 'required',
                'p_photo' => 'required',
                'p_transposition_id' => 'required',
                'p_accomodation_id' => 'required',
                'p_traveller_id' => 'required',
                'p_rating' => 'required',
                'p_distance_id' => 'required',
                'p_travel_guide' => 'required',
                'p_travel_day' => 'required',
                'p_travel_type' => 'required',
                'p_travel_accomodation' => 'required',
                'p_price_id' => 'required',
                'p_combine_id' => 'required',
                'destination_id' => 'required'
            ],
            [],
            [
                'p_name' => "Package Name",
                'p_slug' => "Package Slug",
                'p_start_date' => "Package Start Date",
                'p_end_date' => "Package End Date",
                'p_last_booking_date' => "Package Last Booking Date",
                'p_price' => "Package Price",
                'p_photo' => "Package Photo",
                'p_age_range' => 'Package Age Range',
                'p_max_group_size' => 'Package Max Group Size',
                'p_tour_operator' => 'Package Tour Operator',
                'p_started_from' => 'Package Started From',
                'p_operated_in' => 'Package Operated In',
                'accomodation_id' => 'Package Accomodation Type',
                'rating_id' => 'Package Hotel Rating Type',
                'distance_id' => 'Package Distance Type',
                'traveller_id' => 'Package Traveller Type',
                'transposition_id' => 'Package Transposition Type',
                'p_travel_guide' => 'Package Travel Guide',
                'p_travel_day' => 'Package Travel Duration',
                'p_travel_Type' => 'Package Travel Type',
                'p_travel_accomodation' => 'Package Travel Accomodation',
                'p_price_id' => 'Package Price',
                'p_combine_id' => 'Package Combine',
                'destination_id' => 'Package Destination'
                
            ]);
            unlink(public_path('uploads/'.$package->p_photo));
            $ext = $request->file('p_photo')->extension();
            $final_name = 'package-main-photo-'.$id.'.'.$ext;
            $request->file('p_photo')->move(public_path('uploads/'), $final_name);
            $data['p_photo'] = $final_name;

        } else {
            $data['p_photo'] = $package->p_photo;
        }
        
        $package->fill($data)->save();

        $package_filter = Filter::findOrFail($id);

        $new_package = DB::table('packages')->where('id', $id)->first();

        $filtersToDelete = [
            $data['destination_id'],
            $data['p_transposition_id'],
            $data['p_accomodation_id'],
            $data['p_traveller_id'],
            $data['p_rating'],
            $data['p_distance_id'],
            $data['p_price_id'],
            $data['p_combine_id']

        ];
        DB::table('package_filter')->where('package_id', $new_package->id)->whereIn('filter_id', $filtersToDelete)->delete();

        $insertData = [];
        foreach($filtersToDelete as $filter) {
            $insertData[] = ['package_id' => $new_package->id , 'filter_id' => $filter];
        }
        DB::table('package_filter')->insert($insertData);

        $data = $request->only($package_filter->getFillable());

        $package_filter->fill($data)->save();     

        if($package->fill($data)->save() && $package_filter->fill($data)->save()) {
            return response()->json(['status' => 'success', 'msg' => 'Package is updated successfully!']);
        }
        else {
            return response()->json(['status' => 'error', 'msg' => 'Package update failed!']);
        } 
    }

    public function destroy($id)
    {
        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('error', env('PROJECT_NOTIFICATION'));
        }

        $package = Package::findOrFail($id);
        unlink(public_path('uploads/'.$package->p_photo));
        $package->delete();

        $package_photo = PackagePhoto::where('package_id',$id)->get();
        foreach($package_photo as $row)
        {
            unlink(public_path('uploads/'.$row->photo));
            DB::table('package_photos')->where('package_id',$row->package_id)->delete();
        }

        DB::table('package_videos')->where('package_id',$id)->delete();

        return Redirect()->back()->with('success', 'Package is deleted successfully!');
    }

    public function photo($id)
    {
        $package_photo = PackagePhoto::where('package_id',$id)->get();
        $package_id = $id;
        return view('admin.package.photo', compact('package_photo','package_id'));
    }

    public function photostore(Request $request)
    {
        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('error', env('PROJECT_NOTIFICATION'));
        }

        $package_photo = new PackagePhoto();
        $data = $request->only($package_photo->getFillable());

        $request->validate([
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);
        $statement = DB::select("SHOW TABLE STATUS LIKE 'package_photos'");
        $ai_id = $statement[0]->Auto_increment;
        $ext = $request->file('photo')->extension();
        $final_name = 'package-photo-'.$ai_id.'.'.$ext;
        $request->file('photo')->move(public_path('uploads/'), $final_name);
        $data['photo'] = $final_name;
        $data['project_id'] = $request->project_id;
        $package_photo->fill($data)->save();
        return redirect()->back()->with('success', 'Package Photo is added successfully!');
    }

    public function photodelete($id)
    {
        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('error', env('PROJECT_NOTIFICATION'));
        }
        
        $package_photo = PackagePhoto::findOrFail($id);
        unlink(public_path('uploads/'.$package_photo->photo));
        $package_photo->delete();
        return Redirect()->back()->with('success', 'Package Photo is deleted successfully!');
    }

    public function schedule($id)
    {
        $package_schedule = PackageSchedule::where('package_id',$id)->get();
        $package_id = $id;
        return view('admin.package.schedule', compact('package_schedule','package_id'));
    }

    public function schedulestore(Request $request)
    {
        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('error', env('PROJECT_NOTIFICATION'));
        }

        $package_schedule = new PackageSchedule();
        $data = $request->only($package_schedule->getFillable());

        $request->validate([
            'start_date' => 'required',
            'end_date' => 'required',
            'price' => 'required|numeric|min:0|not_in:0'
        ]);

        $statement = DB::select("SHOW TABLE STATUS LIKE 'package_schedules'");
        $data['package_id'] = $request->package_id;
        $data['start_date'] = $request->start_date;
        $data['end_date'] = $request->end_date;
        $data['price'] = $request->price;
        $package_schedule->fill($data)->save();
        return redirect()->back()->with('success', 'Package Schedule is added successfully!');
    }

    public function scheduledelete($id)
    {
        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('error', env('PROJECT_NOTIFICATION'));
        }
        
        $package_schedule = PackageSchedule::findOrFail($id);
        $package_schedule->delete();
        return Redirect()->back()->with('success', 'Package Schedule is deleted successfully!');
    }
    //Itinerary starts here
    public function itinerary($id)
    {
        $package_itinerary = PackageItinerary::where('package_id',$id)->get();
        $package_id = $id;
        return view('admin.package.itinerary', compact('package_itinerary','package_id'));
    }

    public function itinerarystore(Request $request)
    {
        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('error', env('PROJECT_NOTIFICATION'));
        }

        $package_itinerary = new PackageItinerary();
        $data = $request->only($package_itinerary->getFillable());

        $request->validate([
            'title' => 'required',
            'description' => 'required'
        ]);

        $statement = DB::select("SHOW TABLE STATUS LIKE 'package_itineraries'");
        $data['package_id'] = $request->package_id;
        $data['title'] = $request->title;
        $data['description'] = $request->description;
        $package_itinerary->fill($data)->save();
        return redirect()->back()->with('success', 'Package Itinerary is added successfully!');
    }

    public function itinerarydelete($id)
    {
        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('error', env('PROJECT_NOTIFICATION'));
        }
        
        $package_itinerary = PackageItinerary::findOrFail($id);
        $package_itinerary->delete();
        return Redirect()->back()->with('success', 'Package Itinerary is deleted successfully!');
    }
    //Itinerary ends here

    public function video($id)
    {
        $package_video = PackageVideo::where('package_id',$id)->get();
        $package_id = $id;
        return view('admin.package.video', compact('package_video','package_id'));
    }

    public function videostore(Request $request)
    {
        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('error', env('PROJECT_NOTIFICATION'));
        }

        $package_video = new PackageVideo();
        $data = $request->only($package_video->getFillable());

        $request->validate([
            'video_youtube_id' => 'required'
        ]);
        $data['video_youtube_id'] = $request->video_youtube_id;
        $data['project_id'] = $request->project_id;
        $package_video->fill($data)->save();
        return redirect()->back()->with('success', 'Package Video is added successfully!');
    }

    public function videodelete($id)
    {
        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('error', env('PROJECT_NOTIFICATION'));
        }
        
        $package_video = PackageVideo::findOrFail($id);
        $package_video->delete();
        return Redirect()->back()->with('success', 'Package Video is deleted successfully!');
    }
}
<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

use DB;

class ReviewController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
        $reviews = Review::with('package:id,p_name')->get();
        return view('admin.reviews.index', compact('reviews'));
    }

    public function updateStatus($id){

        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('error', env('PROJECT_NOTIFICATION'));
        }

        $review = Review::findOrFail($id);
        if($review->published == 0){
            $set_review = 1;
        }else{
            $set_review = 0;
        }
        Review::where('id',$id)->update(['published'=>$set_review]);
        return redirect()->route('admin.review.index')->with('success', 'Review status updated Successfully!');
    }

    public function destroy($id)
    {
        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('error', env('PROJECT_NOTIFICATION'));
        }

        $review = Review::findOrFail($id);
        $review->delete();
        return Redirect()->back()->with('success', 'Review is deleted successfully!');
    }
}

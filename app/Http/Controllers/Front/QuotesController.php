<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Quote;
use DB;

class QuotesController extends Controller
{
    public function store(Request $request)
    {
        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('error', env('PROJECT_NOTIFICATION'));
        }
        
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'phone_number' => 'required',
            'email' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
        ],
        [],
        [
            'first_name' => "First Name",
            'last_name' => "Last Name",
            'phone_number' => "Phone Number",
            'email' => "Email",
            'start_date' => "Starte Date",
            'end_date' => "End Date",
        ]);
        $quote = new Quote();
        $data = $request->only($quote->getFillable());
        $quote->fill($data)->save();
        return redirect()->back()->with('success', 'Quote is added successfully!');
    }
}

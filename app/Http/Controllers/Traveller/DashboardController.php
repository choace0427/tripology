<?php

namespace App\Http\Controllers\Traveller;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Models\Lead;
use App\Models\LeadChat;

class DashboardController extends Controller
{
    public function __construct()
    {	
        $this->middleware('traveller');
    }

    public function index()
    {
        $leads = Lead::with('package','chat','traveller')->where('traveller_id',session('traveller_id'))->paginate(5);
        return view('traveller.pages.leads', compact('leads'));
    }

    public function leads(){
        $leads = Lead::with('package','chat','traveller')->where('traveller_id',session('traveller_id'))->paginate(5);
        return view('traveller.pages.leads', compact('leads'));
    }

    public function store(Request $request)
    {
        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('error', env('PROJECT_NOTIFICATION'));
        }

        $request->validate([
            'message' => 'required',
        ]);
        $category = new LeadChat();
        $data = $request->only($category->getFillable());
        
        $data['sender_id'] = session('traveller_id');
        $category->fill($data)->save();
        return redirect()->route('traveller.leads')->with('success', 'Message sent successfully!');
    }
}
<?php

namespace App\Http\Controllers\Agency;
use App\Models\Admin\Blog;
use App\Models\Traveller;
use App\Models\Admin\Service;
use App\Models\Admin\TeamMember;
use App\Models\Admin\Destination;
use App\Models\Admin\Package;
use App\Models\Admin\Order;
use App\Models\Lead;
use App\Models\LeadChat;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LeadsController extends Controller
{
    public function __construct()
    {
        $this->middleware('agency');
    }

    public function index()
    {
        $leads = Lead::with('package','traveller')->where('agency_id',session('id'))->get();
        return view('agency.leads.index', compact('leads'));
    }

    public function show($id){
        $lead = Lead::with('package','chat','traveller')->where('id',$id)->first();
        return view('agency.leads.show', compact('lead'));
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
        
        $data['sender_id'] = session('id');
        $category->fill($data)->save();
        return redirect()->route('agency.leads.view',$request->lead_id)->with('success', 'Message sent successfully!');
    }
}
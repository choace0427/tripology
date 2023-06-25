<?php

namespace App\Http\Controllers\Agency;
use App\Models\Admin\Blog;
use App\Models\Admin\Admin;
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
use DB;
use App\Mail\RegistrationEmailToTraveller;
use Illuminate\Support\Facades\Mail;

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
            'media.*' => 'mimes:jpg,jpeg,png,bmp,gif,svg,webp,pdf,docx',
        ]);

        $files = [];
        if($request->hasfile('media'))
        {
            foreach($request->file('media') as $file)
            {
                $name = time().rand(1,50).'.'.$file->getClientOriginalExtension();
                $file->move(public_path('chat'), $name);  
                $files[] = $name;  
            }
        }

        $category = new LeadChat();
        if(count($files) > 0){
            $category->media = implode(',',$files);
        }
        
        $data = $request->only($category->getFillable());

        $data['sender_id'] = session('id');

        
        $email_template_data = DB::table('email_templates')->where('id', 13)->first();
        $subject = $email_template_data->et_subject;
        $message = $email_template_data->et_content;

        $receiver_id = $request->receiver_id;
        
        $traveller = Traveller::find($receiver_id);

        $agency = Admin::find(session('id'));

        $lead = Lead::with('package')->where('id',$request->lead_id)->first();
        
        $message = str_replace('[[agency_name]]', $agency->name, $message);

        $message = str_replace('[[package_name]]', $lead->package->p_name, $message);

        $message = str_replace('[[message]]', $request->message, $message);

        $login_link = url('traveller/login');

        $message = str_replace('[[login_link]]', $login_link, $message);

        Mail::to($traveller->traveller_email)->send(new RegistrationEmailToTraveller($subject,$message,$files));
        $category->fill($data)->save();
        return redirect()->route('agency.leads.view',$request->lead_id)->with('success', 'Message sent successfully!');
    }
}
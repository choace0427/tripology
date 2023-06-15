<?php

namespace App\Http\Controllers\Traveller;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Models\Lead;
use App\Models\LeadChat;
use App\Mail\RegistrationEmailToTraveller;
use Illuminate\Support\Facades\Mail;
use App\Models\Traveller;
use App\Models\Admin\Admin;

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

        $email_template_data = DB::table('email_templates')->where('id', 14)->first();
        $subject = $email_template_data->et_subject;
        $message = $email_template_data->et_content;

        
        $receiver_id = $request->receiver_id;
        $sender_id = session('traveller_id');

        $traveller = Traveller::find($sender_id);
        
        $agency = Admin::find($receiver_id);
        $lead = Lead::with('package')->where('id',$request->lead_id)->first();
       
        $message = str_replace('[[customer_name]]', $traveller->traveller_name, $message);

        $message = str_replace('[[package_name]]', $lead->package->p_name, $message);

        $message = str_replace('[[message]]', $request->message, $message);

        $login_link = url('admin/login');

        $message = str_replace('[[login_link]]', $login_link, $message);

        Mail::to($agency->email)->send(new RegistrationEmailToTraveller($subject,$message));

        $category->fill($data)->save();
        return redirect()->route('traveller.leads')->with('success', 'Message sent successfully!');
    }
}
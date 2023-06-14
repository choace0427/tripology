<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Lead;
use Illuminate\Support\Facades\Validator;
use App\Models\Traveller;
use Illuminate\Support\Facades\Mail;
use DB;
use Hash;
use App\Mail\RegistrationEmailToTraveller;
use Illuminate\Support\Str;


class LeadController extends Controller
{
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'first_name' => 'required',
            'last_name' => 'required',
            'phone_number' => 'required',
            'traveller_email' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'error' => $validator->errors()->all()
            ]);
        }
       
        $token = hash('sha256',time());
        $exists = Traveller::where('traveller_email',$request->traveller_email);
        if($exists->count() == 0)
        {
            $traveller = new Traveller();
            $data = $request->only($traveller->getFillable());
            $password = Str::random(8);
            $data['traveller_password'] = Hash::make($password);
            $data['traveller_name'] = $request->first_name.' '.$request->last_name;
            $data['traveller_phone'] = $request->phone_number;
            $data['traveller_country'] = '';
            $data['traveller_address'] = '';
            $data['traveller_state'] = '';
            $data['traveller_city'] = '';
            $data['traveller_zip'] = '';
            $data['traveller_token'] = $token;
            $data['traveller_status'] = 'Active';
    
            $traveller->fill($data)->save();
            
            $traveller_id = $traveller->id;
            // Send Email
            $email_template_data = DB::table('email_templates')->where('id', 12)->first();
            $subject = $email_template_data->et_subject;
            $message = $email_template_data->et_content;

            $message = str_replace('[[email]]', $request->traveller_email, $message);

            $message = str_replace('[[password]]', $password, $message);

            $login_link = url('traveller/login');

            $message = str_replace('[[login_link]]', $login_link, $message);
    
            Mail::to($request->traveller_email)->send(new RegistrationEmailToTraveller($subject,$message));
        }else{
            $traveller = $exists->first();
            $traveller_id = $traveller->id;
        }

        Lead::create([
            'package_id' => $request->package_id,
            'traveller_id' => $traveller_id,
            'agency_id' => $request->agency_id,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
        ]);
  
        return response()->json(['success' => 'Lead created successfully.']);
    }
}

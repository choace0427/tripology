<?php

namespace App\Http\Controllers\Agency;
use App\Models\Admin\Admin;
use App\Models\Traveller;
use App\Models\Admin\Service;
use App\Models\Admin\TeamMember;
use App\Models\Admin\Destination;
use App\Models\Admin\Package;
use App\Models\Admin\Order;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Mail\WelcomeEmailAgency;
use App\Mail\ResetPasswordMessageToAdmin;
use Illuminate\Support\Facades\Mail;
use Hash;
use DB;

class RegisterController extends Controller
{
    public function __construct()
    {
        //$this->middleware('agency');
    }

    public function index()
    {
        $city_names = $this->city_names;
        return view('register_agency',compact('city_names'));
    }

    public function store(Request $request){
        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('error', env('PROJECT_NOTIFICATION'));
        }

        $register = new Admin();
        $data = $request->only($register->getFillable());

        $request->validate([
            'company_name' => 'required',
            'username' => 'required',
            'name' => 'required',
            'website' => 'required',
            'email' => 'required|email|unique:admins',
            'password' => 'required',
            'city' => 'required',
            'country' => 'required',
            'phone' => 'required|numeric',
        ],
        [],
        [
            'company_name' => "Company Name",
            'username' => "User Name",
            'name' => "Name",
            'website' => "Website",
            'email' => "Email",
            'password' => "Password",
            'city' => "City",
            'country' => 'Country',
            'phone' => 'Phone',
        ]);

        $token = hash('sha256',time());

        $statement = DB::select("SHOW TABLE STATUS LIKE 'admins'");
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['company_name'] = $request->company_name;
        $data['username'] = $request->username;
        $data['website'] = $request->website;
        $data['token'] = $token;
        $data['password'] = Hash::make($request->password);
        $data['city'] = $request->city;
        $data['country'] = $request->country;
        $data['phone'] = $request->phone;

        if($request->file('photo')){
            $randomNumber = random_int(100000, 999999);
            $ext = $request->file('photo')->extension();
            $final_name = 'agency-photo-'.$randomNumber.'.'.$ext;
            $request->file('photo')->move(public_path('uploads/'), $final_name);
            $data['photo'] = $final_name;
        }    
        $register->fill($data)->save();

         // Send Email
         $email_template_data = DB::table('email_templates')->where('id', 11)->first();
         $subject = $email_template_data->et_subject;
         $message = $email_template_data->et_content;

         $login_link = url('admin/login');
         $message = str_replace('[[agency_owner]]', $request->name, $message);
         $message = str_replace('[[login_link]]', $login_link, $message);

         Mail::to($request->email)->send(new ResetPasswordMessageToAdmin($subject,$message));

        return redirect()->route('agency.register')->with('success', 'Agency is added successfully!');
    }
}
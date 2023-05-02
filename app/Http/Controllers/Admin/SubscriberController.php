<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Subscriber;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Mail;
use App\Mail\MailToAllSubscribers;
use DB;

class SubscriberController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
        $subscriber = Subscriber::where('subs_active', 1)->get();
        return view('admin.subscriber.index', compact('subscriber'));
    }

    public function destroy($id)
    {
        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('error', env('PROJECT_NOTIFICATION'));
        }

        $subscriber = Subscriber::findOrFail($id);
        $subscriber->delete();
        return Redirect()->back()->with('success', 'Subscriber is deleted successfully!');
    }

    public function send_email()
    {
        return view('admin.subscriber.send_email');
    }

    public function send_email_action(Request $request)
    {
        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('error', env('PROJECT_NOTIFICATION'));
        }
        
        $request->validate([
            'subject' => 'required',
            'message' => 'required'
        ]);

        $subject = $request->subject;
        $message = $request->message;

        $all_subscribers = Subscriber::where('subs_active', 1)->get();
        foreach($all_subscribers as $row)
        {
            $subs_email = $row->subs_email;
            Mail::to($subs_email)->send(new MailToAllSubscribers($subject,$message));
        }

        return redirect()->back()->with('success', 'Email is sent successfully to all subscribers!');
    }
}

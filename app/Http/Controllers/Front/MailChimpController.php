<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Subscriber;
use Newsletter;

class MailChimpController extends Controller
{
    public function index(Request $request)
    {
        $request->validate([
                'subs_email' => 'required|email',
                'joining_as' => 'required'
            ],
            [],
            [
                'subs_email' => "Subscriber email required.",
                'joining_as' => "Joining as required."
            ]
        );

        $checkSubscriber = Subscriber::where('subs_email',$request->subs_email)->first();
        if($checkSubscriber)
        {
        	return redirect(url()->previous())->with('error', 'You were already subscribed with us!');
        } else {

            if (Newsletter::isSubscribed($request->subs_email) ) {
            //send error, already sub
                return redirect(url()->previous())->with('error', 'You were already subscribed with us!');
            }

            $parts = explode('@',$request->subs_email);
            $sub_name = $parts[0];
        
            $subscriber = new Subscriber();
            $data = $request->only($subscriber->getFillable());

            $subscriber->fill($data)->save();
            
            Newsletter::subscribe($request->subs_email,['FNAME'=>$sub_name]);
            $tag = env('MAILCHIMP_TAG');
            Newsletter::addTags([$tag], $request->subs_email);
           
            //$request->session()->flash('message-for', 'subscribe');
            //$request->session()->flash('message-content', 'Thanks for subscribing ' . $request->name);
            
            return redirect(url()->previous())->with('success', 'Thanks for subscribing ' . $request->name);
        }
    }
}

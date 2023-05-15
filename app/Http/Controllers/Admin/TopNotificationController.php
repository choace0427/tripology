<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\TopNotification;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use DB;

class TopNotificationController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
        $notification = TopNotification::first();
        return view('admin.top_notification.index', compact('notification'));
    }

    public function store(Request $request) 
    {
        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('error', env('PROJECT_NOTIFICATION'));
        }

        $notification = TopNotification::count();
        if($notification == 0) {
            $request->validate([
                'notification_message' => 'required',
            ]);

            $notification = new TopNotification();
            $data = $request->only($notification->getFillable());

            $notification->fill($data)->save();
            $message = 'Top Notification is added successfully!';
        } else {
            $notification = TopNotification::first();
            $data = $request->only($notification->getFillable());
            TopNotification::where('id',$notification->id)->update($data);
            $message = 'Top Notification is updated successfully!';
        }
        
        return redirect()->route('admin.notification.index')->with('success', $message);
    }
}

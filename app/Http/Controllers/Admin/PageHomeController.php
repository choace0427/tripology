<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\PageHomeItem;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use DB;

class PageHomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function edit()
    {
        $page_home = PageHomeItem::where('id',1)->first();
        return view('admin.page_setting.page_home', compact('page_home'));
    }

    public function update_meta(Request $request)
    {
        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('error', env('PROJECT_NOTIFICATION'));
        }

        $data['seo_title'] = $request->input('seo_title');
        $data['seo_meta_description'] = $request->input('seo_meta_description');

        PageHomeItem::where('id',1)->update($data);
        return redirect()->back()->with('success', 'Home Page Meta Information is updated successfully!');
    }


    public function update_service(Request $request)
    {
        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('error', env('PROJECT_NOTIFICATION'));
        }

        $data['service_title'] = $request->input('service_title');
        $data['service_subtitle'] = $request->input('service_subtitle');
        $data['service_status'] = $request->input('service_status');

        PageHomeItem::where('id',1)->update($data);
        return redirect()->back()->with('success', 'Service Section is updated successfully!');
    }

    public function update_featured_package(Request $request)
    {
        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('error', env('PROJECT_NOTIFICATION'));
        }

        $data['featured_package_title'] = $request->input('featured_package_title');
        $data['featured_package_subtitle'] = $request->input('featured_package_subtitle');
        $data['featured_package_status'] = $request->input('featured_package_status');

        PageHomeItem::where('id',1)->update($data);
        return redirect()->back()->with('success', 'Featured Package Section is updated successfully!');
    }

    public function update_counter(Request $request)
    {
        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('error', env('PROJECT_NOTIFICATION'));
        }

        if($request->hasFile('counter_bg'))
        {
            $request->validate([
                'counter_bg' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
            ]);

            // Unlink old photo
            unlink(public_path('uploads/'.$request->input('current_photo')));

            // Uploading new photo
            $ext = $request->file('counter_bg')->extension();
            $final_name = 'counter_bg'.'.'.$ext;
            $request->file('counter_bg')->move(public_path('uploads/'), $final_name);

            $data['counter_bg'] = $final_name;
        }

        $data['counter1_number'] = $request->input('counter1_number');
        $data['counter1_text'] = $request->input('counter1_text');
        $data['counter2_number'] = $request->input('counter2_number');
        $data['counter2_text'] = $request->input('counter2_text');
        $data['counter3_number'] = $request->input('counter3_number');
        $data['counter3_text'] = $request->input('counter3_text');
        $data['counter4_number'] = $request->input('counter4_number');
        $data['counter4_text'] = $request->input('counter4_text');
        $data['counter_status'] = $request->input('counter_status');

        PageHomeItem::where('id',1)->update($data);
        return redirect()->back()->with('success', 'Counter Section is updated successfully!');
    }

    public function update_destination(Request $request)
    {
        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('error', env('PROJECT_NOTIFICATION'));
        }

        $data['destination_title'] = $request->input('destination_title');
        $data['destination_subtitle'] = $request->input('destination_subtitle');
        $data['destination_status'] = $request->input('destination_status');

        PageHomeItem::where('id',1)->update($data);
        return redirect()->back()->with('success', 'Destination Section is updated successfully!');
    }


    public function update_testimonial(Request $request)
    {
        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('error', env('PROJECT_NOTIFICATION'));
        }

        if($request->hasFile('testimonial_bg'))
        {
            $request->validate([
                'testimonial_bg' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
            ]);

            // Unlink old photo
            unlink(public_path('uploads/'.$request->input('current_photo')));

            // Uploading new photo
            $ext = $request->file('testimonial_bg')->extension();
            $final_name = 'testimonial_bg'.'.'.$ext;
            $request->file('testimonial_bg')->move(public_path('uploads/'), $final_name);

            $data['testimonial_bg'] = $final_name;
        }

        $data['testimonial_title'] = $request->input('testimonial_title');
        $data['testimonial_subtitle'] = $request->input('testimonial_subtitle');
        $data['testimonial_status'] = $request->input('testimonial_status');

        PageHomeItem::where('id',1)->update($data);
        return redirect()->back()->with('success', 'Testimonial Section is updated successfully!');
    }


    public function update_team(Request $request)
    {
        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('error', env('PROJECT_NOTIFICATION'));
        }

        $data['team_member_title'] = $request->input('team_member_title');
        $data['team_member_subtitle'] = $request->input('team_member_subtitle');
        $data['team_member_status'] = $request->input('team_member_status');

        PageHomeItem::where('id',1)->update($data);
        return redirect()->back()->with('success', 'Team Member Section is updated successfully!');
    }


    public function update_blog(Request $request)
    {
        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('error', env('PROJECT_NOTIFICATION'));
        }

        $data['latest_blog_title'] = $request->input('latest_blog_title');
        $data['latest_blog_subtitle'] = $request->input('latest_blog_subtitle');
        $data['latest_blog_status'] = $request->input('latest_blog_status');

        PageHomeItem::where('id',1)->update($data);
        return redirect()->back()->with('success', 'Latest Blog Section is updated successfully!');
    }

    public function update_client(Request $request)
    {
        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('error', env('PROJECT_NOTIFICATION'));
        }

        $data['client_title'] = $request->input('client_title');
        $data['client_subtitle'] = $request->input('client_subtitle');
        $data['client_status'] = $request->input('client_status');

        PageHomeItem::where('id',1)->update($data);
        return redirect()->back()->with('success', 'Client Section is updated successfully!');
    }

    public function update_newsletter(Request $request)
    {
        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('error', env('PROJECT_NOTIFICATION'));
        }
        
        if($request->hasFile('newsletter_bg'))
        {
            $request->validate([
                'newsletter_bg' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
            ]);

            // Unlink old photo
            unlink(public_path('uploads/'.$request->input('current_photo')));

            // Uploading new photo
            $ext = $request->file('newsletter_bg')->extension();
            $final_name = 'newsletter_bg'.'.'.$ext;
            $request->file('newsletter_bg')->move(public_path('uploads/'), $final_name);

            $data['newsletter_bg'] = $final_name;
        }

        $data['newsletter_title'] = $request->input('newsletter_title');
        $data['newsletter_text'] = $request->input('newsletter_text');
        $data['newsletter_status'] = $request->input('newsletter_status');

        PageHomeItem::where('id',1)->update($data);
        return redirect()->back()->with('success', 'Newsletter Section is updated successfully!');
    }

}

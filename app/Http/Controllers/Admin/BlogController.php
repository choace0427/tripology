<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Blog;
use App\Models\Admin\Subscriber;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Mail;
use App\Mail\MailToAllSubscribers;
use DB;

class BlogController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
        $blog = Blog::all();
        return view('admin.blog.index', compact('blog'));
    }

    public function create()
    {
        $category=DB::table('categories')->get();
        return view('admin.blog.create', compact('category'));
    }

    public function store(Request $request)
    {
        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('error', env('PROJECT_NOTIFICATION'));
        }

        $request->validate([
            'blog_title' => 'required|unique:blogs',
            'blog_slug' => 'unique:blogs',
            'blog_content' => 'required',
            'blog_content_short' => 'required',
            'blog_photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $statement = DB::select("SHOW TABLE STATUS LIKE 'blogs'");
        $ai_id = $statement[0]->Auto_increment;

        $ext = $request->file('blog_photo')->extension();
        $final_name = 'blog-'.$ai_id.'.'.$ext;
        $request->file('blog_photo')->move(public_path('uploads'), $final_name);

        $blog = new Blog();
        $data = $request->only($blog->getFillable());
        if(empty($data['blog_slug']))
        {
            unset($data['blog_slug']);
            $data['blog_slug'] = Str::slug($request->blog_title);
        }

        if(preg_match('/\s/',$data['blog_slug']))
        {
            return Redirect()->back()->with('error', 'Slug can not have whitespace');
        }

        unset($data['blog_photo']);
        $data['blog_photo'] = $final_name;
        
        $blog->fill($data)->save();

        // Send Email to Subscribers
        if(request('send_email_to_subscribers') == 'Yes')
        {
            $email_template_data = DB::table('email_templates')->where('id', 4)->first();
            $subject = $email_template_data->et_subject;
            $message = $email_template_data->et_content;

            $post_link = url('blog/'.$data['blog_slug']);
            $message = str_replace('[[post_link]]', $post_link, $message);

            $all_subscribers = Subscriber::where('subs_active', 1)->get();
            foreach($all_subscribers as $row)
            {
                $subs_email = $row->subs_email;
                Mail::to($subs_email)->send(new MailToAllSubscribers($subject,$message));
            }
        }

        return redirect()->route('admin.blog.index')->with('success', 'Blog is added successfully!');
    }

    public function edit($id)
    {
        $blog = Blog::findOrFail($id);
        $category=DB::table('categories')->get();
        return view('admin.blog.edit', compact('blog','category'));
    }

    public function update(Request $request, $id)
    {
        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('error', env('PROJECT_NOTIFICATION'));
        }

        $blog = Blog::findOrFail($id);
        $data = $request->only($blog->getFillable());

        if ($request->hasFile('blog_photo')) {

            $request->validate([
                'blog_photo' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
            ]);

            unlink(public_path('uploads/'.$blog->blog_photo));

            // Uploading the file
            $ext = $request->file('blog_photo')->extension();
            $final_name = 'blog-'.$id.'.'.$ext;
            $request->file('blog_photo')->move(public_path('uploads/'), $final_name);

            unset($data['blog_photo']);
            $data['blog_photo'] = $final_name;
        }

        $request->validate([
            'blog_title'   =>  [
                'required',
                Rule::unique('blogs')->ignore($id),
            ],
            'blog_slug'   =>  [
                Rule::unique('blogs')->ignore($id),
            ]
        ]);

        if(empty($data['blog_slug']))
        {
            unset($data['blog_slug']);
            $data['blog_slug'] = Str::slug($request->blog_title);
        }

        if(preg_match('/\s/',$data['blog_slug']))
        {
            return Redirect()->back()->with('error', 'Slug can not have whitespace');
        }

        $blog->fill($data)->save();

        return redirect()->route('admin.blog.index')->with('success', 'Blog is updated successfully!');
    }

    public function destroy($id)
    {
        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('error', env('PROJECT_NOTIFICATION'));
        }
        
        $blog = Blog::findOrFail($id);
        unlink(public_path('uploads/'.$blog->blog_photo));
        $blog->delete();

        // Success Message and redirect
        return Redirect()->back()->with('success', 'Blog is deleted successfully!');
    }

}

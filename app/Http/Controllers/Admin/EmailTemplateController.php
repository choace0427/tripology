<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Admin\EmailTemplate;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use DB;

class EmailTemplateController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
        $email_template = EmailTemplate::orderBy('id')->get();
        return view('admin.email_template.index', compact('email_template'));
    }

    public function edit($id)
    {
        $email_template = EmailTemplate::findOrFail($id);

        return view('admin.email_template.edit', compact('email_template', 'id'));
    }

    public function update(Request $request, $id)
    {
        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('error', env('PROJECT_NOTIFICATION'));
        }
        
        $email_template = EmailTemplate::findOrFail($id);
        $data = $request->only($email_template->getFillable());

        $request->validate([
            'et_subject' => 'required',
            'et_content' => 'required'
        ]);

        $email_template->fill($data)->save();
        return redirect()->route('admin.email_template.index')->with('success', 'Email Template is updated successfully!');
    }
}

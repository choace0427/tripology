<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\TeamMember;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use DB;

class TeamMemberController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
        $team_member = TeamMember::all();
        return view('admin.team_member.index', compact('team_member'));
    }

    public function create()
    {
        return view('admin.team_member.create');
    }

    public function store(Request $request)
    {
        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('error', env('PROJECT_NOTIFICATION'));
        }

        $team_member = new TeamMember();
        $data = $request->only($team_member->getFillable());

        $request->validate([
            'name' => 'required',
            'slug' => 'unique:team_members',
            'designation' => 'required',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        if(empty($data['slug'])) {
            $data['slug'] = Str::slug($request->name);
        }

        $statement = DB::select("SHOW TABLE STATUS LIKE 'team_members'");
        $ai_id = $statement[0]->Auto_increment;
        $ext = $request->file('photo')->extension();
        $final_name = 'team-member-'.$ai_id.'.'.$ext;
        $request->file('photo')->move(public_path('uploads/'), $final_name);
        $data['photo'] = $final_name;

        $team_member->fill($data)->save();
        return redirect()->route('admin.team_member.index')->with('success', 'Team Member is added successfully!');
    }

    public function edit($id)
    {
        $team_member = TeamMember::findOrFail($id);
        return view('admin.team_member.edit', compact('team_member'));
    }

    public function update(Request $request, $id)
    {
        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('error', env('PROJECT_NOTIFICATION'));
        }

        $team_member = TeamMember::findOrFail($id);
        $data = $request->only($team_member->getFillable());

        if($request->hasFile('photo')) {
            $request->validate([
                'name'   =>  [
                    'required'
                ],
                'slug'   =>  [
                    Rule::unique('team_members')->ignore($id),
                ],
                'designation'   =>  [
                    'required'
                ],
                'photo' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
            ]);
            unlink(public_path('uploads/'.$team_member->photo));
            $ext = $request->file('photo')->extension();
            $final_name = 'team-member-'.$id.'.'.$ext;
            $request->file('photo')->move(public_path('uploads/'), $final_name);
            $data['photo'] = $final_name;
        } else {
            $request->validate([
                'name'   =>  [
                    'required'
                ],
                'slug'   =>  [
                    Rule::unique('team_members')->ignore($id),
                ],
                'designation'   =>  [
                    'required'
                ]
            ]);
            $data['photo'] = $team_member->photo;
        }

        $team_member->fill($data)->save();
        return redirect()->route('admin.team_member.index')->with('success', 'Team Member is updated successfully!');
    }

    public function destroy($id)
    {
        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('error', env('PROJECT_NOTIFICATION'));
        }
        
        $team_member = TeamMember::findOrFail($id);
        unlink(public_path('uploads/'.$team_member->photo));
        $team_member->delete();
        return Redirect()->back()->with('success', 'Team Member is deleted successfully!');
    }
}

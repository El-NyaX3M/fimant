<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index(){
        $id = Auth::user()->id;
        $projectsCount = Project::where('id_user', $id)->count();
        $projects = Project::where('id_user', $id)->orderBy('created_at', 'desc')->get();
        return view('projects', compact('projectsCount', 'projects'));
    }

    public function store(Request $request){
        $project = Project::create([
            'name' => $request->projectName,
            'id_user' => Auth::user()->id,
            'shapes' => null,
        ]);
        $project->save();
        return redirect()->back()->with('success', 'ok');
    }

    public function load($id){
        $project = Project::find($id);
        return view('canvas.edit', ['project' => $project]);
    }

    public function update(Request $request){
        $project = Project::where('id',$request->id)->first();
        if($project){
            $project->update($request->all());
            return redirect()->back()->with('success', 'ok');
        }
        return redirect()->back()->with('error', 'error');
    }

    public function destroy(Request $request)
    {
        $project = Project::find($request->id);
        if ($project) {
            $project->delete();
            return redirect()->back()->with('success', 'ok');
        }
        return redirect()->back()->with('error', 'error');
    }
}

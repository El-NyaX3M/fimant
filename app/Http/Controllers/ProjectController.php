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

    public function create(Request $request){
        Project::create([
            'name' => $request->projectName,
            'id_user' => Auth::user()->id,
            'shapes' => json_encode(''),
        ]);
        return view('canvas');
    }

    public function load(){
        return view('canvas');
    }

    public function save(){
        return view('projects');
    }
}

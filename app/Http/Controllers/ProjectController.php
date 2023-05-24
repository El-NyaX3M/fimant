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
        $projects = Project::where('id_user', $id)->get();
        return view('projects', compact('projectsCount', 'projects'));
    }

    public function create(){
        Project::create([
            'name' => 'PROYECTO',
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

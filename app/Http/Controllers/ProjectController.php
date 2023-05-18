<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index(){
        return view('projects');
    }

    public function create(){
        return view('canvas');
    }

    public function load(){
        return view('canvas');
    }

    public function save(){
        return view('projects');
    }
}

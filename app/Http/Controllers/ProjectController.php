<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\User;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    //
    public function index()
    {
        $users = User::all();
        $projects = Project::orderBy('id','asc')->simplePaginate(10);
        return view('project.index',compact('users','projects'));
    }
    //Add Project
    public function addProject(Request $request){
        $project = new Project();
        $project->user_id = request('user_id');
    }
}

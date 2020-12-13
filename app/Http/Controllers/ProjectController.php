<?php

namespace App\Http\Controllers;

use App\Models\ActivityLog;
use App\Models\Project;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
    public function addProject(): \Illuminate\Http\RedirectResponse
    {
        $project = new Project();
        $project->user_id = request('user_id');
        $project->project = request('project');
        $project->description = request('description');
        $project->save();

        $projectId = $project->id;
        if ($projectId){
            //Activity
            $userId = Auth::user()->id;
            $activity = 'Added a project';
            $activityLog = new ActivityLog();
            $activityLog->user_id = $userId;
            $activityLog->activity = $activity;
            $activityLog->save();
            toast('Project added','success','top-right');
        }
        else{
            toast('Error! something went wrong','warning','top-right');
        }
        return redirect()->back();
    }
}

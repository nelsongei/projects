<?php

namespace App\Http\Controllers;

use App\Models\ActivityLog;
use App\Models\Project;
use App\Models\User;
use App\Notifications\UserNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

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
        $validator = Validator::make(request()->all(),[
            'user_id'=>'required',
            'project'=>'required',
            'description'=>'required'
        ]);
        if ($validator->fails()){
            toast('All Fields are Required','warning','top-right');
            return redirect()->back();
        }
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
            //Notification
            $users = User::first();
            $details = [
                'data'=>Auth::user()->name.' Has Added a project'
            ];
            $users->notify(new UserNotification($details));
            toast('Project added','success','top-right');
        }
        else{
            toast('Error! something went wrong','warning','top-right');
        }
        return redirect()->back();
    }
    //View Project
    public function viewProject(Project $project){
        return view('project.view',compact('project'));
    }
}

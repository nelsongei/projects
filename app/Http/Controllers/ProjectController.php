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
    //Edit Project
    public function editProject(): \Illuminate\Http\RedirectResponse
    {
        $id = request()->input('id');
        $validator = Validator::make(request()->all(),[
            'user_id'=>'required',
            'project'=>'required',
            'description'=>'required'
        ]);
        if($validator->fails()){
            toast('All fields are required','warning','top-right');
            return redirect()->back();
        }
        $project = Project::findOrFail($id);
        $project->user_id = request('user_id');
        $project->project = request('project');
        $project->description = request('description');
        $project->save();

        $projectId = $project->id;
        if ($projectId){
            //Activity
            $userId = Auth::user()->id;
            $activity  = 'Updated Project';

            $activityLog = new ActivityLog();
            $activityLog->user_id = $userId;
            $activityLog->activity = $activity;
            $activityLog->save();
            //Notification
            $users = User::first();
            $details = [
                'data'=>Auth::user()->name.' has edited a project'
            ];
            $users->notify(new UserNotification($details));
            toast('Project Updated successfully','success','top-right');
        }
        else{
            toast('Failed to delete project','warning','top-right');
            }
        return redirect()->back();
    }
    public function deleteProject($project): \Illuminate\Http\RedirectResponse
    {
        $delete = Project::find($project)->delete();
        if ($delete){
            $users = User::first();
            $details = [
                'data'=>Auth()->user()->name.' Deleted Project'
            ];
            $users->notify(new UserNotification($details));
            toast('Project Deleted Successfully','success','top-right');
        }
        else{
            toast('Fail to delete','warning','top-right');
            }
        return redirect()->back();
    }
}

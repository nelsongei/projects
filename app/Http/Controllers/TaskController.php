<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Project;
use App\Models\Card;
use App\Models\ActivityLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    //
    public function index(Project $project, Card $card,Task $task){
        return Task::find($task)->where('project_id',$project)->where('card_id',$card)->get();
    }
    public function store(Request $request): \Illuminate\Http\JsonResponse
    {
//        $tasks = new Task;
//        $tasks->project_id = $request->project_id;
//        $tasks->card_id = $request->card_id;
//        $tasks->task_name = $request->task_name;
//        $tasks->task_description = $request->task_description;
//        $tasks->due_date = $request->due_date;
//        $tasks->save();
        $data =request()->validate([
            'project_id'=>'required',
            'card_id'=>'required',
            'task_name'=>'required',
            'task_description'=>'required',
            'due_date'=>'required'
        ]);
        $tasks = Task::create($data);
        if ($tasks){
            return response()->json(['status' => 0]);
        }
        else{
            return response()->json(['status' => 1]);
        }
    }
    //Update Task Description
    public function update(Request $request, $id){
        $tasksUpdate = Task::find($id);
        $tasksUpdate->task_description = $request->task_description;
        $tasksUpdate->push();
        if($tasksUpdate){
            return response()->json(['status'=>0]);
        }
        else{
            return response()->json(['status'=>1]);
        }
    }
    //Move Task
    public function moveTask(Request $request,$id){
        $moveTask = Task::find($id);
        $moveTask->card_id = $request->card_id;
        $moveTask->push();
        if($moveTask){
            return response()->json(['status'=>0]);
        }
        else{
            return response()->json(['status'=>1]);
        }
    }
}

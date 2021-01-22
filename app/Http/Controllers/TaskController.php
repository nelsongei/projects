<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Project;
use App\Models\Card;
use App\Models\ActivityLog;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    //
    public function index($id){
        $tasks = Project::find($id);
        return $tasks->tasks;
    }
    public function store(Request $request): \Illuminate\Http\JsonResponse
    {
        $tasks = new Task();
        $tasks->project_id = $request->project_id;
        $tasks->card_id  = $request->card_id;
        $tasks->task_name = $request->task_name;
        $tasks->task_description  = $request->task_description;
        $tasks->due_date = $request->due_date;
        $tasks->order = $request->order;
        $tasks->save();
//        $data =request()->validate([
//            'project_id'=>'required',
//            'card_id'=>'required',
//            'task_name'=>'required',
//            'task_description'=>'required',
//            'due_date'=>'required',
//            'order'=>'required'
//        ]);
//        $tasks = Task::create($data);
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
    public function completeTask(Task $task,Request $request,$id){
        $complete = Task::find($id);
        if ($complete){
            $complete->completed = $request->completed;
            $complete->push();
            return $complete;
        }
        return  $complete;
    }
    public function sync(Request $request,Task $task){
        $tasks = Task::find($task);
        $tasks->card_id = $request->card_id;
        $tasks->push();
        return $tasks;
    }
}

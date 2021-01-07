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
        $tasks = Card::find($id);
        return $tasks->tasks;
    }
    public function store(Request $request): \Illuminate\Http\JsonResponse
    {
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
    public function completeTask(Task $task,Request $request,$id){
//        $task=Task::find($id);
//        $task->update([
//            'completed'=>$request->has('completed')
//        ]);
//        return $task;
        $complete = Task::find($id);
        if ($complete){
            $complete->completed = $request->completed ? true : false;
            $complete->push();
            return $complete;
        }
//        if ($complete){
//            return response()->json(['status'=>0]);
//        }
//        return response()->json(['status'=>1]);

    }
}

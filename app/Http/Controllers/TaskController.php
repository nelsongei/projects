<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    //
    public function index(){
        return Task::all();
    }
    public function store(Request $request): \Illuminate\Http\JsonResponse
    {
        $tasks = new Task;
        $tasks->project_id = $request->project_id;
        $tasks->card_id = $request->card_id;
        $tasks->task_name = $request->task_name;
        $tasks->task_description = $request->task_description;
        $tasks->due_date = $request->due_date;
        $tasks->save();
        if ($tasks){
            return response()->json(['status' => 0]);
        }
        else{
            return response()->json(['status' => 1]);
        }
    }
}

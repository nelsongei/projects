<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\Checklist;
use Illuminate\Support\Carbon;

class ChecklistController extends Controller
{
    //Fetch
    public function index(){
        return Checklist::get();

    }
    //Store
    public function store(Request $request){
        $newChecklist = new Checklist();
        $newChecklist->task_id = $request->task_id;
        $newChecklist->name = $request->name;
        $newChecklist->save();
//        return $newChecklist;
        if($newChecklist){
            return response()->json(['status'=>0]);
        }
        else{
            return response()->json(['status'=>1]);
        }
    }
    //Update
    public function update(Request $request,$id){
        $checklist = Checklist::find($id);
        if($checklist){
            $checklist->completed = $request->checklist['completed'] ? true : false;
            $checklist->completed_at = $request->checklist['completed'] ? Carbon::now() : null;
            $checklist->save();

            return response()->json(['status'=>0]);
        }
        else{
            return response()->json(['status'=>1]);
        }
    }
    //Destroy
    public function destroy($id){
        $checklist = Checklist::find($id);
        if($checklist){
            $checklist->delete();
            return response()->json(['status'=>0]);
        }
        return response()->json(['status'=>1]);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    //
    public function index(){
        return Feedback::all();
    }
    public function store(Request $request){
        $feedback = new Feedback();
        $feedback->task_id = $request->task_id;
        $feedback->feedback = $request->feedback;
        $feedback->save();
        if ($feedback){
            return response()->json(['status'=>0]);
        }
        else{
            return response()->json(['status'=>1]);
        }
    }
}

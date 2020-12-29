<?php

namespace App\Http\Controllers;

use App\Models\Card;
use App\Models\Project;
use Illuminate\Http\Request;

class CardController extends Controller
{
    //
    public function index(Project $project, Card $card){
//        return Card::find($card)->where('project_id',$project)->get();
//        return Card::orderBy('id','desc')->with('project')->get();
        $cards = Card::get('project_id')->where('project_id',1);
        return count([$cards]);
    }
    public function store(Request $request){
        $cards = new Card;
        $cards->project_id = $request->project_id;
        $cards->name = $request->name;
        $cards->save();
        if ($cards){
            return response()->json(['status' => 0]);
        }
        else{
            return response()->json(['status'=>1]);
        }
    }
}

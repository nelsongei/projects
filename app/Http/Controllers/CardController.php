<?php

namespace App\Http\Controllers;

use App\Models\Card;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CardController extends Controller
{
    //
    public function index(Project $project, Card $card)
    {
        return Card::where('project_id',$project)->get();
        // return Card::orderBy('id','desc')->get();
        // $cards = DB::table('cards')->where('project_id',$project)->get();
        // return $cards;
    }
    public function store(Request $request)
    {
        $cards = new Card;
        $cards->project_id = $request->project_id;
        $cards->name = $request->name;
        $cards->save();
        if ($cards){
            return response()->json(['status'=>0]);
        }
        else{
            return response()->json(['status'=>1]);
        }
    }
}

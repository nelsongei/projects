<?php

namespace App\Http\Controllers;

use App\Models\Card;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CardController extends Controller
{
    //
    public function index($id)
    {
        $cards = Project::find($id);
        return $cards->card;
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

<?php

namespace App\Http\Controllers;

use App\Models\Card;
use App\Models\Project;
use Illuminate\Http\Request;

class CardController extends Controller
{
    //
    public function index(Project $project, Card $card){
        return Card::find($card)->where('project_id',$project);
    }
}

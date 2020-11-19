<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class EmailController extends Controller
{
    //
    public function index(){
        return view('communication.index');
    }
    public function send(){
        $users = User::all();

    }
}

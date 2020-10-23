<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function index(){
        $users = User::orderBy('id','desc')->paginate(5);
        return view('admin.index',compact('users'));
    }
}

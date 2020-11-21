<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function index(){
        $roles = Role::all();
        $users = User::orderBy('id','desc')->paginate(5);
        return view('admin.index',compact('users','roles'));
    }
    //View User
    public function viewUser(User $user){
        return view('admin.view',compact('user'));
    }
    public function profile(User $user){
        return view('admin.profile',compact('user'));
    }
    public function add(Request $request){

    }
}

<?php

namespace App\Http\Controllers;

use App\Models\ActivityLog;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

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
    //Add User
    public function addUser(Request $request){
        $validator = Validator::make($request->all(),[
            'email'=>'required | unique:users,email'
        ]);
        if ($validator->fails()){
            Alert::warning('Error','Email must be unique or its required');
            return redirect()->back();
        }
        $password = "$2y$10$7qmNLRgUzr.OXSneWfnUSepEclO3yOVulu4B8ESb29ievpgCg1Zrm";
        $admin = new User();
        $admin->name = $request->name;
        $admin->lastName = $request->lastName;
        $admin->phone = $request->phone;
        $admin->email = $request->email;
        $admin->role_id = $request->role_id;
        $admin->password = $password;
        $admin->save();
        $adminId = $admin->id;
        if ($adminId){
            //Get User Data
            $userId = Auth::user()->id;
            $activity = 'Created a user';

            //Logging
            $logs = new ActivityLog();
            $logs->user_id = $userId;
            $logs->activity = $activity;
            $logs->save();

            Alert::success('Success','User Has been Created');
            return redirect()->back();
        }
        else{
            Alert::warning('Error','Sorry Something went wrong');
            return redirect()->back();
        }
    }
    //Edit User
    public function editUser(Request $request){
        $id = $request->input('id');
        $validator = Validator::make($request->all(),[
           'email'=>'required | unique:users,email,'.$id
        ]);
        if ($validator->fails()){
            Alert::error("Failed,Check Email");
            return redirect()->back();
        }
        $admin = User::findOrFail($id);
        $admin->name = $request->name;
        $admin->lastName = $request->lastName;
        $admin->email = $request->email;
        $admin->phone = $request->phone;
        $admin->role_id = $request->role_id;
        $admin->push();
        //Record activity
        $adminId = $admin->id;
        if ($adminId){
            $userId = Auth::user()->id;
            $activity = "Updated user";
            $activityLog = new ActivityLog();
            $activityLog->user_id = $userId;
            $activityLog->activity = $activity;
            $activityLog->save();

            Alert::success("Updated User");
            return redirect()->back();
        }
        else{
            Alert::warning('Failed','To Update user');
            return redirect()->back();
        }
    }
    //Delete User
    public function deleteUser($user){
        $delete = User::findOrFail($user)->delete();
        if ($delete){
            $userId = Auth::user()->id;
            $activity = 'Deleted user';
            //record Activity
            $activityLog = new ActivityLog();
            $activityLog->user_id = $userId;
            $activityLog->activity = $activity;
            $activityLog->save();
            Alert::info("Success,User has been deleted");
        }
        else{
            Alert::warning("Failed,Failed to delete");
        }
        return redirect()->back();
    }
}

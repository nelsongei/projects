<?php

namespace App\Http\Controllers;

use App\Models\ActivityLog;
use App\Models\Role;
use App\Models\User;
use App\Notifications\UserNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
    //
    public function index(){
        $roles = Role::all();
        $users = User::orderBy('id','asc')->simplePaginate(2);
        return view('admin.index',compact('users','roles'));
    }
    //View User
    public function viewUser(User $user){
        return view('admin.view',compact('user'));
    }
    //Profile
    public function profile(User $user){
        return view('admin.profile',compact('user'));
    }
    //Add User
    public function addUser(Request $request): \Illuminate\Http\RedirectResponse
    {
        $validator = Validator::make($request->all(),[
            'email'=>'required | unique:users,email'
        ]);
        if ($validator->fails()){
            toast('Email must be unique or its required','warning','top-right');
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
            $users = User::first();
            $details = [
                'data'=>Auth::user()->name.' Has added a user'
            ];
            $users->notify(new UserNotification($details));
            toast('User has been created','success','top-right');
            return redirect()->back();
        }
        else{
            toast('Sorry Something went wrong','warning','top-right');
            return redirect()->back();
        }
    }
    //Edit User
    public function editUser(Request $request): \Illuminate\Http\RedirectResponse
    {
        $id = $request->input('id');
        $validator = Validator::make($request->all(),[
           'email'=>'required | unique:users,email,'.$id
        ]);
        if ($validator->fails()){
            toast('Failed, Check email','error','top-right');
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

            $users = User::first();
            $details = [
                'data'=>Auth::user()->name.' Has Updated '.request()->name
            ];
            $users->notify(new UserNotification($details));
            toast('User Has been updated','success','top-right');
            return redirect()->back();
        }
        else{
            toast('Failed to update the user','warning','top-right');
            return redirect()->back();
        }
    }
    //Delete User
    public function deleteUser($user): \Illuminate\Http\RedirectResponse
    {
        $delete = User::findOrFail($user)->delete();
        if ($delete){
            $userId = Auth::user()->id;
            $activity = 'Deleted user';
            //record Activity
            $activityLog = new ActivityLog();
            $activityLog->user_id = $userId;
            $activityLog->activity = $activity;
            $activityLog->save();
            //Notification
            $users  = User::first();
            $details = [
                'data'=>Auth::user()->name.' has deleted a user'
            ];
            $users->notify(new UserNotification($details));
            toast('Success! User has been deleted','warning','top-right');
        }
        else{
            toast('Failed to delete the user','error','top-right');
        }
        return redirect()->back();
    }
    public function updateProfilePicture(Request $request): \Illuminate\Http\RedirectResponse
    {
        $validator = Validator::make($request->all(),[
            'img_file'=>'required |image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
        if ($validator->fails()){
            toast('Image is required or input an image');
            return redirect()->back();
        }
        $userId = Auth::user()->id;
        $url = request('img_file')->store('users','public');
        $update = User::where('id',$userId)
                    ->update(['img_file'=>$url]);
        if ($update->success()){
            toast('Profile picture has been updated','success','top-right');
        }
        else{
            toast('Failed to update the profile','error','top-right');
        }
        return redirect()->back();
    }
    //Read Notification
    public function userActivity(): \Illuminate\Http\RedirectResponse
    {
        $readNotification = Auth::user()->unreadNotifications->markAsRead();
        if ($readNotification){
            toast('You have read all notifications','info','top-right');
        }
        return redirect()->back();
    }
    //Clear Activity Logs
    public function clearAdminLog($user): \Illuminate\Http\RedirectResponse
    {
        $delete = ActivityLog::where('user_id',$user)->delete();
        if ($delete){
            $users = User::first();
            $details = [
                'data'=>Auth::user()->name.' Has Cleared Logs'
            ];
            $users->notify(new UserNotification($details));
            toast('Activity Logs have been cleared','success','top-right');
        }
        else{
            toast('Failed to delete Logs','info','top-right');
        }
        return redirect()->back();
    }
}

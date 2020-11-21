<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use RealRashid\SweetAlert\Facades\Alert;

class EmailController extends Controller
{
    //
    public function index(){
        $users = User::all();
        return view('communication.index',compact('users'));
    }
    public function send(Request $request){
        $data = $request->validate([
            'email'=>['email','required'],
            'cc'=>['email','required'],
            'subject'=>['required'],
            'body'=>['required'],
            'file'=>['required']
        ]);
        if (validator()->fails()){
            Alert::error('Input all fields');
        }
        $url = $request->file('file');
        Mail::send('mails',$data,function ($message) use ($data,$url){
            $email = $data['email'];
            $subject = $data['subject'];
            $message->to($email);
            $message->subject($subject);
            foreach ([$url] as $files){
                $message->attach(
                    $files->getRealPath(),array(
                        'as'=>$files->getClientOrigialName(),
                        'mime'=>$files->getMimeType()
                    )
                );
            }
            $message->from(env('MAIL_FROM_NAME'));
        });
    }
}

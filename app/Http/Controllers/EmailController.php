<?php

namespace App\Http\Controllers;

use App\Models\Email;
use App\Models\User;
use Illuminate\Http\Request;
use Mail;
use Illuminate\Support\Facades\Auth;
use App\Models\ActivityLog;

class EmailController extends Controller
{
    //
    public function index(){
        $users = User::all();
        $emails = Email::all();
        return view('communication.index',compact('users','emails'));
    }
    public function sendEmail(Request $request){
        $data = $request->validate([
            'email'=>'required','email',
            'cc'=>'required',
            'subject'=>'required',
            'body'=>'required',
            'img_file'=>'max:2048'
        ]);
        $emailData = array(
            'email'=>$data['email'],
            'cc'=>$data['cc'],
            'subject'=>$data['subject'],
            'body'=>$data['body'],
            'img_file'=>$data['img_file']
            );
        view()->share(compact('emailData'));
        $url = $request->file('img_file');
        $sendMail = Mail::send('communication.mail',$emailData,function($message) use($data,$url){
            $email=$data['email'];
            $subject = $data['subject'];
            $cc = $data['cc'];
            $message->to($email);
            $message->cc($cc);
            $message->subject($subject);
            foreach ($url as $fileAttach){
                $message->attach(
                    $fileAttach->getRealPath(),array(
                        'as'=>$fileAttach->getClientOriginalName(),
                        'mime'=>$fileAttach->getMimeType()
                    )
                );
            }
            $message->from(env('MAIL_USERNAME'));
        });
        if ($sendMail){
            toast('Failed to send Email','warning','top-right');
        }
        else{
            $email = new Email();
            $email->email = request('email');
            $email->cc = request('cc');
            $email->subject = request('subject');
            $email->body = request('body');
            $email->img_file = request('img_file');
            $email->save();
            //
            $userId = Auth::user()->id;
            $activity = "Send Email";
            //Record
            $activityLog = new ActivityLog();
            $activityLog->user_id = $userId;
            $activityLog->activity = $activity;
            $activityLog->save();
            toast('Email Has Been Send successfully','success','top-right');
        }
        return redirect()->back();
    }
}

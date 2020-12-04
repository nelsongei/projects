<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Mail;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class EmailController extends Controller
{
    //
    public function index(){
        $users = User::all();
        return view('communication.index',compact('users'));
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
//        $url = request()->file('img_file');
        $sendMail = \Mail::send('communication.mail',$emailData,function($message) use($request, $data){
//            $url = $request->file('img_file')->store('Attachments','public');
//            $attachmentURL = "https://localhost/MyProject/public/storage".$url;
            $email=$data['email'];
            $subject = $data['subject'];
            $cc = $data['cc'];
            $message->to($email);
            $message->cc($cc);
            $message->subject($subject);
//            $message->attach($attachmentURL
////                $url->getRealPath(),array(
////                    'as'=>$url->getClientOriginalName(),
////                    'mime'=>$url->getMimeType()
////                )
//            );
            $message->from(env('MAIL_USERNAME'));
        });
        if ($sendMail){
            Alert::success('Success','success');
        }
        else{
            Alert::error('Error');
        }
        return redirect()->back();
    }
}

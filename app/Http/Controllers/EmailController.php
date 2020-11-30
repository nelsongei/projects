<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
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
            'email'=>['email','required'],
            'cc'=>['required'],
            'subject'=>['required'],
            'body'=>['required'],
            'img_file'=>['max:2048']
        ]);
////        dd([$request->cc]);
//        $data = Validator::make($request->all(),[
//            'email'=>'email',
//        ]);
//        if ($data->fails()){
//            Alert::error('Input all fields');
//            return redirect()->back();
//        }
        //Looping CC Emails
//        dd ($request->cc);
        foreach (($ccs = $request->cc) as $cc){
            ($cc);
        }
//        foreach(($url = $request->file) as $file){
//            ($file);
//        }
        $emailData = array(
            'email'=>$data['email'],
            'subject'=>$data['subject'],
            'cc'=>$data['cc'],
            'img_file'=>$data['file'],
            'body'=>$data['body']
        );
        view()->share(compact('emailData'));
        $url = $request->file('file');
//        dd ($url);
        $file = $request->file('file');
        dd ($file);
        Mail::send('communication.mail',$emailData,function ($message) use ($data,$url,$cc,$file){
            $email = $data['email'];
            $subject = $data['subject'];
            $message->to($email);
            $message->subject($subject);
            $message->cc($cc);
//            foreach ($file as $files){
//                $message->attach(
//                    $files->getRealPath(),array(
//                        'as'=>$files->getClientOriginalName(),
//                        'mime'=>$files->getMimeType()
//                    )
//                );
//            }
            $message->attach([
                $file->getRealPath(),array(
                    'as'=>$file->getClientOriginalName(),
                    'mime'=>$file->getMimeType()
                )
            ]);
            $message->from(env('MAIL_FROM_NAME'));
        });
        return redirect()->back;
    }
}

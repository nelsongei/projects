<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  Twilio\Rest\Client;

class WhatsappController extends Controller
{
    //
    public function index()
    {
        return view('communication.whatsapp');
    }
    public function send(){
//        $sid    = "AC21ff7fa305bbd58e66824259fe8983be";
//        $token  = "c9c3f9973b936d6ac5a2b1ff4e86274f";
//        $twilio = new Client($sid, $token);
//
//        $message = $twilio->messages
//            ->create("whatsapp:+254719405904", // to
//                array(
//                    "from" => "whatsapp:+14155238886",
//                    "body" => "Laravel PHP"
//                )
//            );
//
//        print($message->sid);
        $id = getenv("TWILIO_ACCOUNT_SID");
        $token = getenv("TWILIO_AUTH_TOKEN");
        $twilio = new Client($id,$token);
        for ($i = 0;$i<5;$i++){
            $messages = $twilio->messages
                ->create("whatsapp:+254719405904",
                array(
                    "from"=>"whatsapp: +14155238886",
                    "body"=>"Testing whatsapp"
                )
            );
            print ($messages->sid);
        }
//        $sid    = "AC21ff7fa305bbd58e66824259fe8983be";
//        $token  = "c9c3f9973b936d6ac5a2b1ff4e86274f";
//        $twilio = new Client($sid, $token);
//
//        $message = $twilio->messages
//            ->create("whatsapp:+254719405904", // to
//                array(
//                    "from" => "whatsapp:+14155238886",
//                    "body" => "Your appointment is coming up on July 21 at 3PM"
//                )
//            );
//
//        print($message->sid);
    }
}

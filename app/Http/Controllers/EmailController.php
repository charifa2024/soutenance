<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\RequestAccepted;
use App\Mail\RequestRefused;
use App\Mail\contactmssgResponse;
use App\Models\signup_request;
use App\Models\contact_message;

class EmailController extends Controller
{
    //
    public function Send_RequestAccepted_Email(signup_request $signuprequestId){//signup_request $signuprequestId
        //@dd($signuprequestId->email);
        $toEmail=$signuprequestId->email;
        $message='Bonjour , Nous avons le plaisir de vous informer que votre compte a été activé avec succès ! 🎉';
        $subject='Activation de votre compte'; 

        $response=Mail::to($toEmail)->send(new RequestAccepted($message,$subject));

        //@dd($response);
        $signuprequestId->delete();
        return redirect()->route('signuprequest.index');
    }
    public function Send_RequestRefused_Email(signup_request $signuprequestId){
        //@dd($signuprequestId->email);
        $toEmail=$signuprequestId->email;
        $message="Bonjour , Nous vous informons que votre demande d'inscription n'a malheureusement pas été acceptée.";
        $subject="Demande d'inscription refusée";

        $response=Mail::to($toEmail)->send(new RequestRefused($message,$subject));
        //@dd($response);
        $signuprequestId->delete();
        return redirect()->route('signuprequest.index');
    }

    public function send_contactmssgResponse_Email(contact_message $contactmssgId){
        //@dd($contactmssgId);
        $toEmail=$contactmssgId->email;
        $message=$contactmssgId->response;
        $subject="Réponse à votre message du suject : ".$contactmssgId->subject;
        $response=Mail::to($toEmail)->send(new contactmssgResponse($message,$subject));
        $contactmssgId->delete();
        return redirect()->route('contactmssg.index');
    }
       

}

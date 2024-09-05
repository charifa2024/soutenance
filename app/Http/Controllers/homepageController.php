<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\contact_message;

class homepageController extends Controller
{
    //
    public function index (){
        return view('homepage.index');
    }
    public function store(){
        $email=request()->email;
        $subject=request()->subject;
        $message=request()->message;
        $contact_message = new contact_message;
        $contact_message->email = $email;
        $contact_message->subject = $subject;
        $contact_message->message =$message;
        $contact_message->save();
        
        return to_route('homepage.index');
    }
}

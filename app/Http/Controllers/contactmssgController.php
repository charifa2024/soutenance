<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\contact_message;


class contactmssgController extends Controller
{
    //
    public function index(){
         $contact_messages_fromDB = contact_message::all();
        // @dd($contact_messages_fromDB);

        return view('contactmssg.index' , ['contact_messages_fromDB' => $contact_messages_fromDB]);
    }


    public function show(contact_message $contactmssgId){
        //@dd($contactmssgId);
        //$single_contactmssg = contact_message::FindOrFail($messageId);
        //$single_contactmssg=contact_message::where('id',$messageId)->first(); model object 
        //$single_contactmssg=contact_message::where('id',$messageId)->get(); collection object
        //@dd($single_contactmssg);
        return view('contactmssg.show' , ['single_contactmssg'=>$contactmssgId]);

    }

    public function edit(contact_message $contactmssgId){
       // @dd($contactmssgId);
        return view('contactmssg.edit' , ['single_contactmssg'=>$contactmssgId]);
    }
    public function update(Request $request , contact_message $contactmssgId){
       // @dd($request->message ,$contactmssgId);
       $response=$request->message;
       $contactmssgId->response=$response;
       $contactmssgId->save();
        return redirect()->route('send_contactmssgResponse_email' ,$contactmssgId->id);
    }
 
}
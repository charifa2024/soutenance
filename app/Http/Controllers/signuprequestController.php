<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\signup_request;

class signuprequestController extends Controller
{
    //
    public function index(){
        $allsignuprequest=signup_request::all();
        return view('signuprequest.index' , ['signuprequests'=>$allsignuprequest]);
    }

    public function show(signup_request $signuprequestId)
    {
        return view('signuprequest.show', ['signuprequest'=>$signuprequestId]);
    }
}

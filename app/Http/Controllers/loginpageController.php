<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class loginpageController extends Controller
{
    //
    public function login(){
        return view('loginpage.login');
    }
    public function signup(){
        return view('loginpage.signup');
    }
    
    public function show(){
        return view('loginpage.show');
    }
    public function store(){
        $data=request()->all();
        //@dd($data);
        return to_route('loginpage.show');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class profilepageController extends Controller
{
    //
    public function index(){
        return view('profilepage.index');
    }
    public function edit(){
        return view('profilepage.edit');
    }
    public function update(){
        $email=request()->email;
        $phone_number=request()->phone_number;
        $password=request()->password;
        $confirm_pwd=request()->confirm_pwd;
       // @dd($email,$phone_number,$password,$confirm_pwd);
       return to_route('profilepage.index');
    }

}

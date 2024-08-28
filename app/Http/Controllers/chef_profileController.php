<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class chef_profileController extends Controller
{
    //
    public function index(){
        return view('chef_profile.index');
    }
    public function edit(){
        return view('chef_profile.edit');
    }
    public function update(){
        $email=request()->email;
        $phone_number=request()->phone_number;
        $password=request()->password;
        $confirm_pwd=request()->confirm_pwd;
        // @dd($email,$phone_number,$password,$confirm_pwd);
        return view('chef_profile.index');
    }
}

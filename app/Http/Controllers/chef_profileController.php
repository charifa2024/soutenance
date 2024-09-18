<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;    

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
        $user = Auth::user();
        //dd($user);
        //@dd($email,$phone_number,$password,$confirm_pwd);
        if($password==$confirm_pwd && $password!==null && $confirm_pwd!==null){
            $user->password = Hash::make($password);
            //dd($user);
            $user->save();
        }
        if($email!==null){
            $user->email=$email;
            $user->save();
        }
        if($phone_number!==null){
            $user->phoneNumber=$phone_number;
            $user->save();
        }
       return to_route('chef_profile.index');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Models\department;

class profilepageController extends Controller
{
    //
    public function index(){
        $user=Auth::user();
        $departments=department::all();
        $department=$departments->find($user->department_id)->department_name;
        return view('profilepage.index',compact('department'));
    }
    public function edit(){
        return view('profilepage.edit');
    }
    public function update(){
        $email=request()->email;
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

       return to_route('profilepage.index');
    }

}

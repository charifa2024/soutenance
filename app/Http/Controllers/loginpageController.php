<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\signup_request;
use Illuminate\Support\Facades\Hash;


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
    public function store(Request $request){
        $request->validate([
            'email'=>'email',
            'password'=>'required|min:8',
            'password_confirmation'=>'required|min:8',
        ]);
        if($request->password!=$request->password_confirmation){
            return redirect()->back()->withErrors('Les deux  mots de passe ne rassemblent pas');
        }
        else{
            $password=Hash::make($request->password);
        };
        $firstname=request()->firstname;
        $lastname=request()->lastname;
        $email=request()->user_email;
        $phoneNumber=request()->phoneNumber;
        $post=request()->post;
        $department=request()->department;
        $employee=request()->employee;
        $manager=request()->manager;
        $terms=request()->terms;
        if($employee="on"){
            $role="employee";
        }
        elseif($manager="on"){
            $role="manager";
        }
        else{
            $role="employee";
        };
      
        //@dd($firstname,$lastname,$email,$password,$phoneNumber,$post,$department,$role);
        $signup_request = new signup_request;
        $signup_request->firstname = $firstname;
        $signup_request->lastname = $lastname;
        $signup_request->email = $email;
        $signup_request->password =$password;
        $signup_request->phoneNumber = $phoneNumber;
        $signup_request->post = $post;
        $signup_request->department = $department;
        $signup_request->role = $role;
        $signup_request->save();
        return to_route('loginpage.show');
    }
}

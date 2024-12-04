<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\signup_request;
use App\Models\department;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Session;




use Illuminate\Support\Facades\Hash;


class loginpageController extends Controller
{
    //
    public function login(){
        return view('loginpage.login');
    }
    public function signup(){
        $departments= department::all();
        return view('loginpage.signup' , ['manager_names'=>$departments]);
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
            return redirect()->back()->withErrors('Les deux mots de passe ne correspondent pas');
        }
        else{
            $password=Hash::make($request->password);
        };
        //dd($request);
        
        $firstname=request()->firstname;
        $lastname=request()->lastname;
        $email=request()->user_email;
        $department_id=request()->department;
        $role=request()->role;
        $terms=request()->terms;  
        //@dd($firstname,$lastname,$email,$password,$department_id,$role);
        $signup_request = new signup_request;
        $signup_request->firstname = $firstname;
        $signup_request->lastname = $lastname;
        $signup_request->email = $email;
        $signup_request->password =$password;
        $signup_request->department_id = $department_id;
        $signup_request->role = $role;
        //dd($signup_request);
        $signup_request->save();
        return to_route('loginpage.show');
    }

    public function Auth(request $request){
        $messages = [
            'user-email.required' => 'L\'adresse e-mail est obligatoire.',
            'user-email.email' => 'Veuillez entrer une adresse e-mail valide.',
            'user-pwd.required' => 'Le mot de passe est obligatoire.',
            'user-pwd.min' => 'Le mot de passe doit contenir au moins 8 caractères.',
        ];
        
        $request->validate([
            'user-email' => 'required|email',
            'user-pwd' => 'required|min:8',
        ], $messages);
        
        
        if (Auth::attempt(['email' => $request->input('user-email'), 'password' => $request->input('user-pwd')])) {
            $user = Auth::user();
            $userInfo = \App\Models\User::find($user->id);
            //dd($userInfo);
            if($userInfo->role == 'employee'){
            //dd($userInfo);
            return redirect()->intended('dashboard');
            }
            if($userInfo->role == 'manager'){
              //  dd($userInfo);
                return redirect()->intended('chef_dashboard');
            }
            if($userInfo->role == 'admin'){
                return redirect()->intended('usersprofiles');
            }
            
            
        }
        else{        
            return back()->withErrors(['user-email' => 'L\'adresse e-mail ou le mot de passe est incorrect.',
        ]);}

    }


    public function logout(){
        Auth::logout();
        Session::flush();
        return redirect()->route('loginpage.login');
    }
}

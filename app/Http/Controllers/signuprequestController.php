<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\signup_request;
use App\Models\manager_department_name;
use App\Models\User;

class signuprequestController extends Controller
{
    //
    public function index(){
        $allsignuprequest=signup_request::all();
        return view('signuprequest.index' , ['signuprequests'=>$allsignuprequest]);
    }

    public function show(signup_request $signuprequestId)
    {
        //dd($signuprequestId);
        return view('signuprequest.show', ['signuprequest'=>$signuprequestId]);
    }
    public function accept(signup_request $signuprequestId)
    {
       /// @dd($signuprequestId);
        $firstname = $signuprequestId->Firstname;
        $lastname = $signuprequestId->Lastname;
        $email = $signuprequestId->email;
        $password = $signuprequestId->password;
        $phone_number = $signuprequestId->phoneNumber;
        $post=$signuprequestId->post;
        $department=$signuprequestId->department;
        $role=$signuprequestId->role;
        //@dd($firstname,$lastname,$email,$password,$post,$department,$role);
        $new_user = new User();
        $new_user->firstName= $firstname;
        $new_user->lastName= $lastname;
        $new_user->email= $email;
        $new_user->password= $password;
        $new_user->phoneNumber= $phone_number;
        $new_user->post= $post;
        $new_user->department= $department;
        $new_user->role= $role;
        if($new_user->role=='manager'){
        $new_user->manager_name=$signuprequestId->Firstname.' '.$signuprequestId->Lastname;
        };
        if($new_user->role=='employee'){
            $new_user->manager_name=manager_department_name::where('department_name',$department)->get('manager_fullName')->first()->manager_fullName;
        };
        //@dd($new_user);
        $new_user->save();
        //$signuprequestId->delete();
       // @dd($signuprequestId);
        return redirect()->route('send_request-accepted_email' ,$signuprequestId->id);
    }
    public function refuse(signup_request $signuprequestId){
        //@dd($signuprequestId);
        $email = $signuprequestId->email;
       // $signuprequestId->delete();
       //@dd($signuprequestId);
        return redirect()->route('send_request-refused_email', $signuprequestId->id);
    }
}

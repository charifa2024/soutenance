<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\signup_request;
use App\Models\department;
use App\Models\User;

class signuprequestController extends Controller
{
    //
    public function index(Request $request)
    {
        $search = $request->input('search');
        
        $signuprequests = Signup_request::query()
            ->where('status', '=', 'pending') // Always filter by 'pending' status
            ->when($search, function ($query, $search) {
                $query->where(function ($query) use ($search) {
                    $query->where('Firstname', 'like', "%{$search}%")
                          ->orWhere('Lastname', 'like', "%{$search}%");
                });
            })
            ->orderBy('created_at', 'desc')
            ->get();


        return view('signuprequest.index', ['signuprequests' => $signuprequests]);
    }
    
    

    public function show(signup_request $signuprequestId)
    {
        //dd($signuprequestId);
        $department_name=department::where('id',$signuprequestId->department_id)->first();
        //dd($department_name);
        return view('signuprequest.show', ['signuprequest'=>$signuprequestId , 'department_name'=>$department_name]);
    }
    public function accept(signup_request $signuprequestId)
    {
        $firstname = $signuprequestId->Firstname;
        $lastname = $signuprequestId->Lastname;
        $email = $signuprequestId->email;
        $password = $signuprequestId->password;
        $department = $signuprequestId->department_id;
        $role = $signuprequestId->role;
    
        $signuprequestId->status = "accepted";
        $signuprequestId->admin_id = auth()->user()->id;
        $signuprequestId->save();
    
        $new_user = new User();
        $new_user->firstName = $firstname;
        $new_user->lastName = $lastname;
        $new_user->email = $email;
        $new_user->password = $password; 
        $new_user->department_id = $department;
        $new_user->role = $role;
        
        $new_user->save();
        $manager_id=$new_user->id;
        if($role=="manager"){
            $dep=department::where('id',$department)->first();
            $dep->manager_id=$manager_id;
            $dep->save();
        }
        return redirect()->route('send_request-accepted_email', $signuprequestId->id);
    }
    
    
    public function refuse(signup_request $signuprequestId){
        //@dd($signuprequestId);
        $signuprequestId->status="refused";
        $signuprequestId->admin_id=auth()->user()->id;
        $signuprequestId->save();
        $email = $signuprequestId->email;
       //@dd($signuprequestId);
        return redirect()->route('send_request-refused_email', $signuprequestId->id);
    }
}

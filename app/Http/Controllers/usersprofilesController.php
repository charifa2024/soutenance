<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\manager_department_name;
use App\Models\User;

class usersprofilesController extends Controller
{
    //
    public function index(){
        $manager_names= manager_department_name::all();
        $users=user::all();
        //dd($users);
        return view('usersprofiles.index ', ['manager_names'=>$manager_names , 'users' => $users] );
    }
 

    public function show($userId){
       $users=user::all();
       //dd($users,$userId);
       
       $user = $users->find($userId);
       //dd($user);
        return view('usersprofiles.show ', ['user'=>$user]);
    }

    public function create(){
        return view('usersprofiles.create');
    }
    public function store(Request $request){
        $manager_name = $request->input('manager_name');
        $department_name = $request->input('department_name');
        $manager_department_name = new manager_department_name();
        $manager_department_name->manager_fullName = $manager_name;
        $manager_department_name->department_name = $department_name;
        $manager_department_name->save();
        return redirect()->route('usersprofiles.index');
    }
    public function edit($id){
        $manager_name = manager_department_name::find($id);
        return view('usersprofiles.edit', ['manager_name' => $manager_name]);
    }
  
    public function update(Request $request, $id){
        $manager_name = $request->input('manager_name');
        $department_name = $request->input('department_name');
       /// @dd($manager_name,$department_name);
        $manager_department_name = manager_department_name::find($id);
        //@dd($manager_department_name);
        $manager_department_name->manager_fullName = $manager_name;
        $manager_department_name->department_name = $department_name;
        //@dd($manager_department_name);
        $manager_department_name->save();
        return redirect()->route('usersprofiles.index');
    }
}

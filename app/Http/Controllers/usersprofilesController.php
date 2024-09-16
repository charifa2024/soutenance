<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\manager_department_name;
use App\Models\User;
use App\Models\break_request;



class usersprofilesController extends Controller
{
    //
    public function index()
    {
        $manager_names = manager_department_name::all();
        $users = User::where('role', '!=', 'admin')->get();
        $allbreakrequest = break_request::with('User')->get();
    
        foreach ($users as $user) {
            if ($user->work_status === 'free') {
                $latestBreakRequest = $user->breakRequests()->latest()->first();
                
                if ($latestBreakRequest && $latestBreakRequest->end_date < now()) {
                    $user->work_status = 'active';
                    $user->save();
                }
            }
        }
    
        return view('usersprofiles.index', ['manager_names' => $manager_names, 'users' => $users]);
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
  
    public function update(Request $request, $id)
    {
        $manager_name = $request->input('manager_name');
        $department_name = $request->input('department_name');
    
        $manager_department_name = manager_department_name::find($id);
        $old_manager_name = $manager_department_name->manager_fullName;
        $old_department_name = $manager_department_name->department_name;
    
        $manager_department_name->manager_fullName = $manager_name;
        $manager_department_name->department_name = $department_name;
        $manager_department_name->save();
    
        // Update all employees in the department with the new manager name
        User::where('department', $old_department_name)
            ->where('manager_name', $old_manager_name)
            ->update(['manager_name' => $manager_name, 'department' => $department_name]);
    
        return redirect()->route('usersprofiles.index');
    }    
    
}

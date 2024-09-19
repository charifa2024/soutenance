<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\manager_department_name;
use App\Models\User;
use App\Models\break_request;
use Illuminate\Support\Facades\DB;



class usersprofilesController extends Controller
{
    //

    public function destroy($userId)
{
    DB::transaction(function () use ($userId) {
        // Delete related records
        DB::table('break_requests')->where('user_id', $userId)->delete();
        DB::table('task_user_relations')->where('user_id', $userId)->delete();
        DB::table('assigned_tasks')->where('created_by', $userId)->delete();
        DB::table('personal_tasks')->where('user_id', $userId)->delete();
        
        // Delete the user
        User::destroy($userId);
    });

    return redirect()->route('usersprofiles.index');
}
public function index(Request $request)
{
    $search = $request->input('search');
    
    $users = User::where('role', '!=', 'admin')
        ->when($search, function ($query, $search) {
            return $query->where('firstName', 'like', "%{$search}%")
                         ->orWhere('lastName', 'like', "%{$search}%")
                         ->orWhere('role', 'like', "%{$search}%");
        })
        ->get();

    foreach ($users as $user) {
        if ($user->work_status === 'free') {
            $latestBreakRequest = $user->breakRequests()->latest()->first();
            
            if ($latestBreakRequest && $latestBreakRequest->end_date < now()) {
                $user->work_status = 'active';
                $user->save();
            }
        }
    }

    $manager_names = manager_department_name::all();

    return view('usersprofiles.index', compact('users', 'manager_names'));
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

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\department;
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
    //$departments = department::all();
    //dd($departments);
    $search = $request->input('search');
    
    // Start with the query excluding "admin" users
    $users = User::where('role', '!=', 'admin')
        ->when($search, function ($query, $search) {
            return $query->where('firstName', 'like', "%{$search}%")
                         ->orWhere('lastName', 'like', "%{$search}%");
        })
        ->get();

    // Process the users to check their work status
    foreach ($users as $user) {
        if ($user->work_status === 'free') {
            $latestBreakRequest = $user->breakRequests()->latest()->first();
            
            if ($latestBreakRequest && $latestBreakRequest->end_date < now()) {
                $user->work_status = 'active';
                $user->save();
            }
        }
    }
    $departments = department::all();
    $department_names=$departments->pluck('department_name');
    //dd($department_names);


    return view('usersprofiles.index', compact('users','department_names'));
}



 

public function show($userId) {
    $users=User::all();
    $user = User::findOrFail($userId); 
    $departments=department::all();
    
    $department = $departments->find($user->department_id)->department_name;
    $manager_id=$departments->find($user->department_id)->manager_id;
    //($manager_id);
    $manager_firstname = $users->find($manager_id)->firstName;
    $manager_lastname = $users->find($manager_id)->lastName;

    // Pass all variables to the view as a single array
    return view('usersprofiles.show', [
        'user' => $user,
        'department' => $department,
        'manager_firstname' => $manager_firstname,
        'manager_lastname' => $manager_lastname,
    ]);
}

    public function create(){
        return view('usersprofiles.create');
    }
    public function store(Request $request){
        //dd($request);
        $department_name = $request->input('titre');
       // dd($department_name);
        $department = new department();
        $department->department_name = $department_name;
        $department->admin_id = auth()->user()->id;
        $department->save();
        return redirect()->route('usersprofiles.index');
    }  
    
}

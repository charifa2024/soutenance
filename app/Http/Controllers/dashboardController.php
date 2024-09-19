<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Personal_task;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\task_user_relation;




class dashboardController extends Controller
{
    //
    public function index(Request $request)
    {
        $user = Auth::user();
        $search = $request->input('search');
    
        $alltasks = Personal_task::where('user_id', $user->id)
            ->when($search, function ($query) use ($search) {
                return $query->where('title', 'like', "%{$search}%")
                             ->orWhere('description', 'like', "%{$search}%");
            })
            ->get();
    
        $notdone = Personal_task::where('user_id', $user->id)
            ->where('status', 'en cours')
            ->count();
    
        $assignedTasksCount = task_user_relation::where('user_id', $user->id)
            ->where('status_user', 'on')
            ->count();
    
        $completedAssignedTasksCount = task_user_relation::where('user_id', $user->id)
            ->where('status_user', 'off')
            ->count();
    
        return view('dashboard.index', [
            'tasks' => $alltasks,
            'nbr_notdone' => $notdone,
            'assignedTasksCount' => $assignedTasksCount,
            'completedAssignedTasksCount' => $completedAssignedTasksCount,
            'search' => $search
        ]);
    }
    
    
    public function show($id){
        $task = Personal_task::find($id);
        return view('dashboard.show', ['task' => $task]);
    }
    public function create(){
        return view('dashboard.create');
    }
    public function store(){
        $task = request()->all();
        $user = Auth::user();
        $userInfo = \App\Models\User::find($user->id);
        //@dd($task, $userInfo);
        $title = $task['titre'];
        $description = $task['description'];
        $user_id = $userInfo->id;
        //@dd($title, $description, $user_id);
        $task = new Personal_task();
        $task->title = $title;
        $task->description = $description;
        $task->user_id = $user_id;
        //@dd($task);
        $task->save();
        return redirect()->route('dashboard.index');
    }
    public function edit($id){
        $task = Personal_task::find($id);
        return view('dashboard.edit', ['task' => $task]);
    }

    public function update(Request $request, $id){
        $task = Personal_task::find($id);
        //dd($task,$request->all());
        $task->title=$request->input('titre');
        $task->description=$request->input('description');
        $task->save();
        return redirect()->route('dashboard.index');
    }
    public function destroy($id){
        $task = Personal_task::find($id);
        $task->delete();
        return redirect()->route('dashboard.index')->with('success', '') ;
    }
    public function state($id){
        $task = Personal_task::find($id);
        $task->status = 'complète';
        $task->save();
        return redirect()->route('dashboard.index');
    }
        
}

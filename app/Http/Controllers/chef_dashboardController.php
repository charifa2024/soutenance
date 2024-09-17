<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Personal_task;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\assigned_task;
class chef_dashboardController extends Controller
{
    //
    public function getEmployeeCount()
{
    $manager = Auth::user();
    $employeeCount = User::where('department', $manager->department)
                         ->where('role', 'employee')
                         ->count();

    return $employeeCount;
}

    public function index(){
        $alltasks = Personal_task::all()->where('user_id', Auth::user()->id);
        $notdone = Personal_task::all()->where('user_id', Auth::user()->id)->where('status', 'en cours');
        $nbr_notdone = count($notdone);
        $assigned_tasks = assigned_task::all()->where('created_by', Auth::user()->id);
        $nbr_assigned_tasks = count($assigned_tasks);
        $employeeCount = $this->getEmployeeCount();
        return view('chef_dashboard.index' , ['tasks' => $alltasks , 'nbr_notdone' => $nbr_notdone , 'employeeCount' => $employeeCount , 'nbr_assigned_tasks' => $nbr_assigned_tasks]);
    }
    public function show($id){
        $task = Personal_task::find($id);
        return view('chef_dashboard.show', ['task' => $task]);
    }
    public function create(){
        return view('chef_dashboard.create');
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
        return redirect()->route('chef_dashboard.index');
    }
    public function edit($id){
        $task = Personal_task::find($id);
        return view('chef_dashboard.edit', ['task' => $task]);
    }
    public function update(Request $request, $id){
        $task = Personal_task::find($id);
        //dd($task,$request->all());
        $task->title=$request->input('titre');
        $task->description=$request->input('description');
        $task->save();
        return redirect()->route('chef_dashboard.index');
    }
    public function destroy($id){
        $task = Personal_task::find($id);
        $task->delete();
        return redirect()->route('chef_dashboard.index')->with('success', '') ;
    }
    public function state($id){
        $task = Personal_task::find($id);
        $task->status = 'complète';
        $task->save();
        return redirect()->route('chef_dashboard.index');
    }
}

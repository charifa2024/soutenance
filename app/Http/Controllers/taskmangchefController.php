<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\assigned_task;
use App\Models\task_user_relation;

class taskmangchefController extends Controller
{
    //
    public function index(Request $request)
    {
        $loggedInUser = Auth::user();
        $query = assigned_task::where('created_by', $loggedInUser->id);
    
        
        if ($request->has('search')) {
            $searchTerm = $request->input('search');
            $query->where(function($q) use ($searchTerm) {
                $q->where('title', 'LIKE', "%{$searchTerm}%")
                  ->orWhere('description', 'LIKE', "%{$searchTerm}%");
            });
        }
    
        $alltasks = $query->get();
        $now = now();
    
        foreach ($alltasks as $task) {
            $allCompleted = task_user_relation::where('task_id', $task->id)
                ->where('status_user', '!=', 'off')
                ->doesntExist();
    
            if ($allCompleted && $task->status !== 'off') {
                $task->status = 'off';
                $task->save();
            }
    
            
            if ($task->due_date < $now && $task->status === 'on') {
                $task->status = 'pause';
                $task->save();
    
                
                task_user_relation::where('task_id', $task->id)
                    ->update(['status_user' => 'pause']);
            }
        }
    
        return view('taskmangchef.index', ['tasks' => $alltasks]);
    }
    
    public function show($id){
        $singletask=assigned_task::find($id);
        $assigned_to = task_user_relation::where('task_id', $id)->get();
        return view('taskmangchef.show',['task' => $singletask,'assigned_to' => $assigned_to]);
    }

   public function create(){
    $loggedInUser = Auth::user();
    //dd($loggedInUser);
    $employees = User::all()->where('department_id', $loggedInUser->department_id)->where('role', 'employee');
    //dd($allemployees);
    return view('taskmangchef.create', ['employees' => $employees]);
   }

   public function store(){
    $data= request()->all();
    $loggedInUser = Auth::user();
   // @dd($data, $loggedInUser);
   $title = $data['titre'];
   $description = $data['description'];
   $notes = $data['notes'];
   $date_depot = $data['date_echeance'];
   $created_by = $loggedInUser->id;
   $assigned_to = $data['group'];
   //dd($title,$description,$notes,$date_depot,$created_by,$assigned_to);
   $assigned_task = new assigned_task();
   $assigned_task->title = $title;
   $assigned_task->description = $description;
   $assigned_task->notes = $notes;
   $assigned_task->due_date = $date_depot;
   $assigned_task->created_by = $created_by;
   //dd($assigned_task);
   $assigned_task->save();
   //dd($assigned_to);
   foreach($assigned_to as $employee){
    $task_user_relation = new task_user_relation();
    $task_user_relation->user_id = $employee;
    $task_user_relation->task_id = $assigned_task->id;
    //dd($task_user_relation);
    $task_user_relation->save();
   }
    return to_route('taskmangchef.index');
   }

   public function edit($id){
    $singletask=assigned_task::find($id);
    return view('taskmangchef.edit',['task' => $singletask]);
   }
   public function update($id){
    $data= request()->all();
    //@dd($data);
    $singletask=assigned_task::find($id);
    $singletask->description = $data['description'];
    $singletask->notes = $data['notes'];
    $singletask->due_date = $data['date_echeance'];
    $singletask->save();

    return to_route('taskmangchef.index');
   }
}
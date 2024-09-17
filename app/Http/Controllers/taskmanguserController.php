<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\assigned_task;
use App\Models\task_user_relation;
use Illuminate\Support\Facades\Auth;
use App\Models\User;



class taskmanguserController extends Controller
{
    //
    public function index(){
        $loggedInUser = Auth::user();
        $taskRelations = task_user_relation::where('user_id', $loggedInUser->id)->get();
        $taskIds = $taskRelations->pluck('task_id');
        $alltasks = assigned_task::whereIn('id', $taskIds)->get();
    
        // Attach status_user to each task
        $alltasks = $alltasks->map(function ($task) use ($taskRelations) {
            $relation = $taskRelations->where('task_id', $task->id)->first();
            $task->status_user = $relation ? $relation->status_user : null;
            return $task;
        });
    
        return view('taskmanguser.index', ['tasks' => $alltasks]);
    }
    

    public function show($id)
    {
        $singletask = assigned_task::find($id);
        $createdBy=User::find($singletask->created_by);
        //dd($createdBy);
        $taskUserRelations = task_user_relation::where('task_id', $id)->get();
        
        $userIds = $taskUserRelations->pluck('user_id');
        $users = User::whereIn('id', $userIds)->get();
    
        $singletask->for = $users;
    
        return view('taskmanguser.show', ['task' => $singletask , 'createdBy' => $createdBy]);
    }
    
}

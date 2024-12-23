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
    public function index(Request $request)
    {
        $loggedInUser = Auth::user();
        //dd($loggedInUser);
        $search = $request->input('search');
    
        // Start with a query builder
        $query = task_user_relation::query()->where('user_id', $loggedInUser->id);
    
        if ($search) {
            $query->whereHas('task', function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%");
            });
        }
    
        // Execute the query to get results
        $taskRelations = $query->get();
        //dd($taskRelations);
        // Extract task IDs from taskRelations
        $taskIds = $taskRelations->pluck('task_id');
        //dd($taskIds);
    
        // Fetch tasks matching the task IDs
        $alltasks = assigned_task::whereIn('id', $taskIds)->get();
    
        // Attach the status_user property to each task
        $alltasks = $alltasks->map(function ($task) use ($taskRelations) {
            $relation = $taskRelations->where('task_id', $task->id)->first();
            $task->status_user = $relation ? $relation->status_user : null;
            return $task;
        });
    
        // Return the view with tasks and search term
        return view('taskmanguser.index', ['tasks' => $alltasks, 'search' => $search]);
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
    public function state($id){
        $loggedInUser = Auth::user();
        //DD($loggedInUser);
        $task = task_user_relation::where('task_id', $id)
        ->where('user_id', $loggedInUser->id)
        ->first();

        //dd($task);
        if ($task) {
            //dd($task->user_id, $task->task_id, $task->status_user);
            $task->status_user = 'off';
            $task->save();
        }
        return redirect()->route('taskmanguser.index');
    }
    
}

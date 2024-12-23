<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\break_request;
use App\Models\department;

class breakrequestadminController extends Controller
{
    //
    public function index(Request $request)
    {
        $search = $request->input('search');
    
        $allbreakrequest = break_request::with('User')
            ->where('status', 'pending')
            ->when($search, function ($query, $search) {
                return $query->whereHas('user', function ($q) use ($search) {
                    $q->where('firstName', 'like', "%{$search}%")
                      ->orWhere('lastName', 'like', "%{$search}%");
                })
                ->orWhere('created_at', 'like', "%{$search}%")
                ->orWhere('reason', 'like', "%{$search}%");
            })
            ->orderBy('created_at', 'desc')->get();
    
        return view('breakrequestadmin.index', ['breakrequests' => $allbreakrequest]);
    }
    

    public function show($id){
        $breakrequest = break_request::with('User')->find($id);
        $departments=department::all();
        $department=$departments->find($breakrequest->user->department_id)->department_name;
       // @dd($breakrequest);
        return view('breakrequestadmin.show', ['breakrequest'=>$breakrequest,'department'=>$department]);
        
    }

    public function accept($id){
        $breakrequest = break_request::find($id);
        //dd($breakrequest,$breakrequest->user);
        $breakrequest->status = 'accepted';
        $breakrequest->user->work_status = 'free';
        $breakrequest->save();
        $breakrequest->user->save();
        //dd($breakrequest,$breakrequest->user);
        return redirect()->route('breakrequestadmin.index');
    }
    public function refuse($id){
        $breakrequest = break_request::find($id);
        $breakrequest->status = 'refused';
        $breakrequest->save();
        return redirect()->route('breakrequestadmin.index');
    }
}

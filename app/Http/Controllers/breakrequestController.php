<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\break_request;
use App\Models\User;



class breakrequestController extends Controller
{
    //
    public function index(Request $request)
    {
        $user = Auth::user();
        $query = break_request::where('user_id', $user->id);
    
        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where(function($q) use ($search) {
                $q->where('reason', 'like', "%$search%")
                  ->orWhere('status', 'like', "%$search%")
                  ->orWhereDate('start_date', 'like', "%$search%")
                  ->orWhereDate('end_date', 'like', "%$search%");
            });
        }
    
        $requests = $query->get();
    
        return view('breakrequest.index', [
            'requests' => $requests,
            'search' => $request->input('search')
        ]);
    }
    
    public function create(){
        return view('breakrequest.create');
    }
    public function store(){
        $data=request()->all();
        $user = Auth::user();
        $userInfo = \App\Models\User::find($user->id);
        //@dd($data,$userInfo);
        $date_start = $data['start_time'];
        $date_end = $data['end_time'];
        $reason = $data['reason'];
        $user_id = $userInfo->id;
        //dd($date_start,$date_end,$reason,$user_id);
        $break_request = new break_request();
        $break_request->start_date = $date_start;
        $break_request->end_date = $date_end;
        $break_request->reason = $reason;
        $break_request->user_id = $user_id;
        //dd($break_request);
        $break_request->save();

        //@dd($data);
        return redirect()->route('breakrequest.index');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class chef_breakrequestController extends Controller
{
    //
    public function create(){
        return view('chef_breakrequest.create');
    }
    public function store(){
        $data=request()->all();
        return redirect()->route('chef_breakrequest.store');
    }
}

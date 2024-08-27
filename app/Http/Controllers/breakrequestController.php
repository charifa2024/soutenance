<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class breakrequestController extends Controller
{
    //
    public function create(){
        return view('breakrequest.create');
    }
    public function store(){
        $data=request()->all();
        return redirect()->route('breakrequest.store');
    }
}

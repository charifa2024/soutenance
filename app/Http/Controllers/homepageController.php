<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class homepageController extends Controller
{
    //
    public function index (){
        return view('homepage.index');
    }
    public function store (){
        $data=request()->all();
        dd($data);
        return to_route('homepage.index');
    }
}

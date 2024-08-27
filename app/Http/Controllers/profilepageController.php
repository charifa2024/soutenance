<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class profilepageController extends Controller
{
    //
    public function index(){
        return view('profilepage.index');
    }
}

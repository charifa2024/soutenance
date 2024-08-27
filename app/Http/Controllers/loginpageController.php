<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class loginpageController extends Controller
{
    //
    public function index(){
        return view('loginpage.index');
    }
}

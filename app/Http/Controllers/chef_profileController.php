<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class chef_profileController extends Controller
{
    //
    public function index(){
        return view('chef_profile.index');
    }
}

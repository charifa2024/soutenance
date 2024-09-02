<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class chef_breakrequestController extends Controller
{
    //
    public function index(){
        $requests = [
            ['id' => 1, 'date' => '2023-05-01', 'reason' => 'Vacances', 'status' => 'En attente'],
            ['id' => 2, 'date' => '2023-05-02', 'reason' => 'Maladie', 'status' => 'Accepté'],
            ['id' => 3, 'date' => '2023-05-03', 'reason' => 'Congés payés', 'status' => 'Refusé'],
            ['id' => 4, 'date' => '2023-05-04', 'reason' => 'Congés payés', 'status' => 'Accepté'],
            ['id' => 5, 'date' => '2023-05-05', 'reason' => 'Congés payés', 'status' => 'En attente']];
        return view('chef_breakrequest.index' , ['requests'=>$requests]);
    }
    public function create(){
        return view('chef_breakrequest.create');
    }
    public function store(){
        $data=request()->all();
        return redirect()->route('chef_breakrequest.store');
    }
}

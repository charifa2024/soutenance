<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class breakrequestController extends Controller
{
    //
    public function index(){
        $requests=[
            [
                'id'=>1,
                'date'=>'2023-03-01',
                'reason'=>'Congé de formation',
                'status'=>'En attente'
            ],
            [
                'id'=>2,
                'date'=>'2023-03-02',
                'reason'=>'Congé de formation',
                'status'=>'En attente'
            ],
            [
                'id'=>3,
                'date'=>'2023-03-03',
                'reason'=>'Congé de formation',
                'status'=>'En attente'
            ],
            [
                'id'=>4,
                'date'=>'2023-03-04',
                'reason'=>'Congé de formation',
                'status'=>'En attente'
            ],
            [
                'id'=>5,
                'date'=>'2023-03-05',
                'reason'=>'Congé de formation',
                'status'=>'En attente'
            ]
    
            ];
        return view('breakrequest.index' , ['requests'=>$requests]);
    }
    public function create(){
        return view('breakrequest.create');
    }
    public function store(){
        $data=request()->all();
        //@dd($data);
        return redirect()->route('breakrequest.index');
    }
}

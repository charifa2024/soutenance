<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class taskmangchefController extends Controller
{
    //
   public function index(){
    $alltasks=[
        [
            'id'=>1,
            'titre'=>'PROJET DU STAGE',
            'date'=>'20/07/2024',
            'date_depot'=>'20/08/2024',
            'status'=>'En Cours'
        ],
        [
            'id'=>2,
            'titre'=>'RAPPORT DU STAGE',
            'date'=>'01/08/2024',
            'date_depot'=>'01/09/2024',
            'status'=>'En Cours'
        ],
        [
            'id'=>3,
            'titre'=>'RAPPORT DU STAGE',
            'date'=>'01/08/2024',
            'date_depot'=>'01/09/2024',
            'status'=>'En Cours'
        ],
        [
            'id'=>4,
            'titre'=>'RAPPORT DU STAGE',
            'date'=>'01/08/2024',
            'date_depot'=>'01/09/2024',
            'status'=>'En Cours'
        ],
    ];
    return view('taskmangchef.index', ['tasks'=>$alltasks]);
   }

   public function show($id){
    $singletask = [
        'id'=>1,
        'titre'=>'PROJET DU STAGE',
        'date'=>'20/07/2024',
        'date_depot'=>'20/08/2024',
        'statut'=>'En Cours',
        'description'=>'Lorem ipsum dolor sit amet',
        'notes'=>'Lorem ipsum dolor sit amet',
        'responsable'=>'responsable',
        'for'=>[
            '1'=>'responsable 1',
            '2'=>'responsable 2',
            '3'=>'responsable 3',
        ],

    ];
    return view('taskmangchef.show' , ['task' => $singletask]);
   }

   public function create(){
    return view('taskmangchef.create');
   }

   public function store(){
    $data= request()->all();
    return to_route('taskmangchef.index');
   }
}

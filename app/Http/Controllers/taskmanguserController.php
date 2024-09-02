<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class taskmanguserController extends Controller
{
    //
    public function index(){
        $alltasks=[
            [
                'id'=>1,
                'titre'=>'PROJET DU STAGE',
                'date'=>'20/07/2024',
                'date_depot'=>'20/08/2024',
                'status'=>'En Cours',
            ],
            [
                'id'=>2,
                'titre'=>'RAPPORT DU STAGE',
                'date'=>'01/08/2024',
                'date_depot'=>'01/09/2024',
                'status'=>'En Cours',
            ],
            [
                'id'=>3,
                'titre'=>'RAPPORT DU STAGE',
                'date'=>'01/08/2024',
                'date_depot'=>'01/09/2024',
                'status'=>'En Cours',
            ],
            [
                'id'=>4,
                'titre'=>'RAPPORT DU STAGE',
                'date'=>'01/08/2024',
                'date_depot'=>'01/09/2024',
                'status'=>'En Cours',
            ],
        ];
        return view('taskmanguser.index', ['tasks'=>$alltasks]);
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
                [
                    'id'=>1,
                    'name'=>'nom',
                ],
                [
                    'id'=>2,
                    'name'=>'nom',
                ]
                ]
        ];
        return view('taskmanguser.show' , ['task' => $singletask]);
    }
}

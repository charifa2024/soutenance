<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class breakrequestadminController extends Controller
{
    //
    public function index(){
        $allbreakrequest = [
            [
                'id'=>1,
                'date'=>'20/07/2024',
                'nom'=>'Moussa',
            ],
            [
                'id'=>2,
                'date'=>'20/07/2024',
                'nom'=>'Moussa',
            ],
            [
                'id'=>3,
                'date'=>'20/07/2024',
                'nom'=>'Moussa',
            ],
            [
                'id'=>4,
                'date'=>'20/07/2024',
                'nom'=>'Moussa',
            ],

        ];
        return view('breakrequestadmin.index' , ['breakrequests'=>$allbreakrequest]);
    }

    public function show($id){
        $breakrequest = [
            'id'=>1,
            'date'=>'20/07/2024',
            'nom'=>'Moussa',
            'post'=>'Chef de projet',
            'departement'=>'Informatique',
            'reason'=>'Congé de mariage',
            'date_start'=>'20/07/2024',
            'date_end'=>'20/07/2024',
        ];
        return view('breakrequestadmin.show', ['breakrequest'=>$breakrequest]);
        
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class signuprequestController extends Controller
{
    //
    public function index(){
        $allsignuprequest =[
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

        return view('signuprequest.index' , ['signuprequests'=>$allsignuprequest]);
    }

    public function show($id)
    {
        $signuprequest=            [
            'id'=>1,
            'date'=>'20/07/2024',
            'nom'=>'Moussa',
            'email'=>'example@gmail.com',
            'phone_number'=>123456789,
            'role'=>'admin',
            'department'=>'IT',
            'post'=>'administrateur',
            'manager_name'=>'<NAME>',
        ];
        return view('signuprequest.show' ,  ['signuprequest' => $signuprequest]);
    }
}

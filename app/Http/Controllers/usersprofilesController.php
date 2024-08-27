<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class usersprofilesController extends Controller
{
    //
    public function index(){
        $allusersprofiles = [
            [
                'id' => 1,
                'date' => '2020-01-01',
                'nom' => '<NAME>',
                'email' => '<EMAIL>',
                'phone_number' => '0600000000',
                'role' => 'admin',
                'department' => 'Développement',
                'post' => 'Développeur',
               'manager_name' => '<NAME>'
            ],
            [
                'id' => 2,
                'date' => '2020-01-01',
                'nom' => '<NAME>',
                'email' => '<EMAIL>',
                'phone_number' => '0600000000',
                'role' => 'admin',
                'department' => 'Développement',
                'post' => 'Développeur',
               'manager_name' => '<NAME>'
            ],
            [
                'id' => 3,
                'date' => '2020-01-01',
                'nom' => '<NAME>',
                'email' => '<EMAIL>',
                'phone_number' => '0600000000',
                'role' => 'admin',
                'department' => 'Développement',
                'post' => 'Développeur',
               'manager_name' => '<NAME>'
            ],

        ];
        return view('usersprofiles.index ', ['usersprofiles'=>$allusersprofiles ]);
    }


    public function show($id){
        $usersprofile =
            [
                'id' => 1,
                'date' => '2020-01-01',
                'nom' => '<NAME>',
                'email' => '<EMAIL>',
                'phone_number' => '0600000000',
                'role' => 'admin',
                'department' => 'Développement',
                'post' => 'Développeur',
               'manager_name' => '<NAME>'
            ]
            ;
            return view('usersprofiles.show ', ['usersprofile' => $usersprofile]);
    }
}

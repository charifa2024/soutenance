<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\manager_department_name;

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

        $manager_names= manager_department_name::all();
        return view('usersprofiles.index ', ['usersprofiles'=>$allusersprofiles ] , ['manager_names'=>$manager_names]);
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
                'status' => 'actif',
               'manager_name' => '<NAME>'
            ]
            ;
            return view('usersprofiles.show ', ['usersprofile' => $usersprofile]);
    }

    public function create(){
        return view('usersprofiles.create');
    }
    public function store(Request $request){
        $manager_name = $request->input('manager_name');
        $department_name = $request->input('department_name');
        $manager_department_name = new manager_department_name();
        $manager_department_name->manager_fullName = $manager_name;
        $manager_department_name->department_name = $department_name;
        $manager_department_name->save();
        return redirect()->route('usersprofiles.index');
    }
    public function edit($id){
        $manager_name = manager_department_name::find($id);
        return view('usersprofiles.edit', ['manager_name' => $manager_name]);
    }
  
    public function update(Request $request, $id){
        $manager_name = $request->input('manager_name');
        $department_name = $request->input('department_name');
       /// @dd($manager_name,$department_name);
        $manager_department_name = manager_department_name::find($id);
        //@dd($manager_department_name);
        $manager_department_name->manager_fullName = $manager_name;
        $manager_department_name->department_name = $department_name;
        //@dd($manager_department_name);
        $manager_department_name->save();
        return redirect()->route('usersprofiles.index');
    }
}

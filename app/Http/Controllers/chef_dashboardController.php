<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class chef_dashboardController extends Controller
{
    //
    public function index(){
        $alltasks = [
            ['id' => 1, 'titre' => 'Tâche 1', 'description' => 'Description de la tâche 1', 'status' => 'En Cours'],
            ['id' => 2, 'titre' => 'Tâche 2', 'description' => 'Description de la tâche 2', 'status' => 'En Cours'],
            ['id' => 3, 'titre' => 'Tâche 3', 'description' => 'Description de la tâche 3', 'status' => 'En Cours'],
            ['id' => 4, 'titre' => 'Tâche 4', 'description' => 'Description de la tâche 4', 'status' => 'En Cours'],
            ['id' => 5, 'titre' => 'Tâche 5', 'description' => 'Description de la tâche 5', 'status' => 'En Cours'],
        ];
        return view('chef_dashboard.index' , ['tasks' => $alltasks]);
    }
    public function create(){
        return view('chef_dashboard.create');
    }
    public function store(){
        $task = request()->all();
        return redirect()->route('dashboard.index');
    }
    public function edit(){
        return view('chef_dashboard.edit');
    }

    public function update(){
        $task = request()->all();
        return redirect()->route('chef_dashboard.index');
    }
    public function destroy(){
        return redirect()->route('chef_dashboard.index')->with('success', '') ;
    }
}

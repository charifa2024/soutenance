<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class contactmssgController extends Controller
{
    //
    public function index(){
        $contactmssgs = [
            ['id' => 1, 'date' => '2023-06-13', 'Email' => 'example@example.com', 'subject' => 'Subject 1'],
            ['id' => 2, 'date' => '2023-06-14', 'Email' => 'example2@example.com', 'subject' => 'Subject 2'],
            ['id' => 3, 'date' => '2023-06-15', 'Email' => 'example3@example.com', 'subject' => 'Subject 3'],
            ['id' => 4, 'date' => '2023-06-16', 'Email' => 'example4@example.com', 'subject' => 'Subject 4'],
            ['id' => 5, 'date' => '2023-06-17', 'Email' => 'example5@example.com', 'subject' => 'Subject 5'],];
        return view('contactmssg.index' , ['contactmssgs' => $contactmssgs]);
    }


    public function show($id){
        $contactmssg =
            [
                'id' => 1,
                'date' => '2023-06-13',
                'email' => 'example@example.com',
                'subject' => 'Subject 1',
                'message' => 'This is the first message.',
            ] 
            ;
            return view('contactmssg.show' , ['contactmssg' => $contactmssg]);
}

    public function create(){
        return view('contactmssg.create');
    }
    
    public function store(){
        $data= request()->all();
        return to_route('contactmssg.index');
    }
}
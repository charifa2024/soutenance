@extends('layouts.adminnav')
@section('text_css')
<title>sign up requests details</title>
<link rel="stylesheet" href="{{ asset('css/signuprequest.css') }}">
</head>
<body>
<div class="details_container">
    <div class="card">
    <div class="card-title">
    Vérifier les Informations   
    </div>
    <div class="card-details">
    <p><label>Date :</label>{{$signuprequest->created_at}}</p>
    <p><label>Nom Complet :</label>{{$signuprequest->Firstname}} {{$signuprequest->Lastname}}</p>
    <p><label>Email :</label>{{$signuprequest->email}}</p>
    <p><label>Rôle :</label>{{$signuprequest->role}}</p>
    <p><label>Département :</label>{{$department_name->department_name}}</p>
    </div>
    
    <div class="button-container">
    <div class="close-btn"><a href="{{route('signuprequest.index')}}" >Fermer</a></div>
</div>

    </div>

    </div>
    </div>
</body>
</html>
@endsection
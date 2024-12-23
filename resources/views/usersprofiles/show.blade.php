@extends('layouts.adminnav')
@section('text_css')
<title>users profiles details</title>
<link rel="stylesheet" href="{{ asset('css/usersprofiles.css') }}">
</head>
<body>
<div class="details_container">
    <div class="card">
    <div class="card-title">
    Voir les Informations  
    </div>
    <div class="card-details">
    <p><label>Date de création :</label>{{$user['created_at']}}</p>
    <p><label>Nom complet :</label>{{$user['firstName']}} {{$user['lastName']}}</p>
    <p><label>Email :</label>{{$user['email']}}</p>
    <p><label>Rôle :</label>{{$user['role']}}</p>
    <p><label>Departement :</label>{{$department}}</p>
    <p><label>status :</label>{{$user['work_status']}}</p>
    <p><label>Nom du Manager :</label>{{$manager_firstname }}  {{$manager_lastname }}</p>
    </div>
    
    <div class="button-container">
    <div class="close-btn"><a href="{{route('usersprofiles.index')}}" >Fermer</a></div>
</div>

    </div>

    </div>
    </div>
</body>
</html>
@endsection
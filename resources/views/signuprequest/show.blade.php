@extends('layouts.adminnav')
@section('text_css')
<title>sign up requests</title>
<link rel="stylesheet" href="{{ asset('css/signuprequest.css') }}">
</head>
<body>
<div class="details_container">
    <div class="card">
    <div class="card-title">
    Vérifier les Informations   
    </div>
    <div class="card-details">
    <p><label>Date :</label>{{$signuprequest['date']}}</p>
    <p><label>Nom Complet :</label>{{$signuprequest['nom']}}</p>
    <p><label>Email :</label>{{$signuprequest['email']}}</p>
    <p><label>Numéro de Téléphone :</label>{{$signuprequest['phone_number']}}</p>
    <p><label>Rôle :</label>{{$signuprequest['role']}}</p>
    <p><label>Departement :</label>{{$signuprequest['department']}}</p>
    <p><label>Poste :</label>{{$signuprequest['post']}}</p>
    <p><label>Nom du Manager :</label>{{$signuprequest['manager_name']}}</p>
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
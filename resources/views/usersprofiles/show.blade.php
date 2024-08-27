@extends('layouts.adminnav')
@section('text_css')
<title>users profiles</title>
<link rel="stylesheet" href="{{ asset('css/usersprofiles.css') }}">
</head>
<body>
<div class="details_container">
    <div class="card">
    <div class="card-title">
    Voir les Informations  
    </div>
    <div class="card-details">
    <p><label>Date de création :</label>{{$usersprofile['date']}}</p>
    <p><label>Nom complet :</label>{{$usersprofile['nom']}}</p>
    <p><label>Email :</label>{{$usersprofile['email']}}</p>
    <p><label>Numéro du Téléphone:</label>{{$usersprofile['phone_number']}}</p>
    <p><label>Rôle :</label>{{$usersprofile['role']}}</p>
    <p><label>Departement :</label>{{$usersprofile['department']}}</p>
    <p><label>Poste :</label>{{$usersprofile['post']}}</p>
    <p><label>Nom du Manager :</label>{{$usersprofile['manager_name']}}</p>
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
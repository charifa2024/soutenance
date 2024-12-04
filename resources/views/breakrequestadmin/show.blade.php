@extends('layouts.adminnav')
@section('text_css')
<title>Break Request management details</title>
<link rel="stylesheet" href="{{ asset('css/breakrequestadmin.css') }}">
</head>
<body>
<div class="details_container">
    <div class="card">
    <div class="card-title">
    Détails de la demande  
    </div>
    <div class="card-details">
    <p><label>Date de la demande :</label>{{$breakrequest['created_at']}}</p>
    <p><label>Nom complet de l'Employé :</label>{{$breakrequest->user['firstName']}} {{$breakrequest->user['lastName']}}</p>
    <p><label>Département :</label>{{$department}}</p>
    <p><label>Raison du Congé :</label>{{$breakrequest['reason']}}</p>
    <p><label>Date de Début :</label>{{$breakrequest['start_date']}}</p>
    <p><label>Date de Fin :</label>{{$breakrequest['end_date']}}</p>
    </div>
    <div class="close-btn"><a href="{{route('breakrequestadmin.index')}}" >Fermer</a></div>
    </div>
    </div>
</body>
</html>
@endsection
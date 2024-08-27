@extends('layouts.adminnav')
@section('text_css')
<title>Break Request management</title>
<link rel="stylesheet" href="{{ asset('css/breakrequestadmin.css') }}">
</head>
<body>
<div class="details_container">
    <div class="card">
    <div class="card-title">
    Détails de la demande  
    </div>
    <div class="card-details">
    <p><label>Date de la demande :</label>{{$breakrequest['date']}}</p>
    <p><label>Nom complet de l'Employé :</label>{{$breakrequest['nom']}}</p>
    <p><label>Poste :</label>{{$breakrequest['post']}}</p>
    <p><label>Département :</label>{{$breakrequest['departement']}}</p>
    <p><label>Raison du Congé :</label>{{$breakrequest['reason']}}</p>
    <p><label>Date de Début :</label>{{$breakrequest['date_start']}}</p>
    <p><label>Date de Fin :</label>{{$breakrequest['date_end']}}</p>
    </div>
    <div class="close-btn"><a href="{{route('breakrequestadmin.index')}}" >Fermer</a></div>
    </div>
    </div>
</body>
</html>
@endsection
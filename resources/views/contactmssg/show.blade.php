@extends('layouts.adminnav')
@section('text_css')
<title>contact form messages details</title>
<link rel="stylesheet" href="{{ asset('css/contactmssg.css') }}">
</head>
<body>
<div class="details_container">
    <div class="card">
    <div class="card-title">
    Détails du message  
    </div>
    <div class="card-details">
    <p><label>Date :</label>{{$contactmssg['id']}}</p>
    <p><label>Email :</label>{{$contactmssg['email']}}</p>
    <p><label>subjet:</label>{{$contactmssg['subject']}}</p>
    <p><label>Message :</label>{{$contactmssg['message']}}</p>
    </div>
    
    <div class="button-container">
    <div class="responce"><a href="{{route('contactmssg.create')}}">Repondre</a></div>
    <div class="close-btn"><a href="{{route('contactmssg.index')}}" >Fermer</a></div>
</div>

    </div>

    </div>
    </div>
</body>
</html>
@endsection
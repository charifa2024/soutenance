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
    
    <p><label>Date :</label>{{$single_contactmssg->created_at}}</p>
    <p><label>Email :</label>{{$single_contactmssg->email}}</p>
    <p><label>subjet:</label>{{$single_contactmssg->subject}}</p>
    <p><label>Message :</label>{{$single_contactmssg->message}}</p>
    </div>
    <div class="button-container">
    <div class="responce"><a href="{{route('contactmssg.edit',$single_contactmssg->id)}}">Repondre</a></div>
    <div class="close-btn"><a href="{{route('contactmssg.index')}}" >Fermer</a></div>
</div>

    </div>

    </div>
    </div>
</body>
</html>
@endsection
@extends('layouts.nav')
@section('text_css')
<title>task management task details</title>
    <link rel="stylesheet" href="{{asset('css/taskmanguser.css')}}">
</head>
<body>
    <div class="details_container">
    <div class="card">
    <div class="card-title">
    Détails de la Tâche  
    </div>
    <div class="card-details">
    <p><label>Date :</label>{{$task['created_at']}}</p>
    <p><label>Date d'échéance :</label> {{$task['due_date']}}</p>
    <p><label>Titre :</label> {{$task['title']}}</p>
    <p><label>Status :</label> {{$task['status']}}</p>
    <p><label>Description :</label> {{$task['description']}}</p>
    <p><label>Affecté à :</label>
    <ul>
        @foreach($task['for'] as $user)
        <li>{{$user['firstName']}} {{$user['lastName']}}</li>
        @endforeach
    </ul>
    </p>
    <p><label>Notes :</label> {{$task['notes']}}</p>
    </div>
    <div class="close-btn"><a href="{{route('taskmanguser.index')}}" >Fermer</a></div>
    </div>
    </div>
<script src="{{asset('JS/state_button.js')}}"></script>
</body>
</html>
@endsection

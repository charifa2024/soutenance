@extends('layouts.chefnav')
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
    @if($task['notes'] != null)
    <p><label>Notes :</label> {{$task['notes']}}</p>
    @endif
    <p>
    <label>Assignée à :</label>
    <div>
    @foreach($assigned_to as $assigned)
            <div>{{ $assigned->user->firstName }} {{ $assigned->user->lastName }}</div>
        <span> status : </span>{{ $assigned->status_user }} <br><br>
    @endforeach
    </div>
</p>

    </div>
    <div class="close-btn"><a href="{{route('taskmangchef.index')}}" >Fermer</a></div>
    </div>
    </div>
</body>
</html>
@endsection

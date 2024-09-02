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
    <p><label>Date :</label>{{$task['date']}}</p>
    <p><label>Date d'échéance :</label> {{$task['date_depot']}}</p>
    <p><label>Titre :</label> {{$task['titre']}}</p>
    <p><label>Status :</label> {{$task['status']}}</p>
    <p><label>Description :</label> {{$task['description']}}</p>
    <p><label>Affecté à :</label>
    <ul>
    @foreach ($task['for'] as $for)
    <li><strong>{{$for['name']}}</strong>
    @if ($task['status'] == 'En Cours')
    <p>status : <span class="status-en-cours">{{$for['status']}}</span></p>
    @endif
    </li>
    @endforeach
    </ul>
    </p>
    <p><label>Notes :</label> {{$task['notes']}}</p>
    </div>
    <div class="close-btn"><a href="{{route('taskmangchef.index')}}" >Fermer</a></div>
    </div>
    </div>
</body>
</html>
@endsection

@extends('layouts.chefnav')
@section('text_css')
<title>Dashboard task </title>
<link rel="stylesheet" href="{{asset('css/dashboard.css')}}">
</head>
<body>
<div class="container">
    <div class="title-form"><h2>Détails de la Tâche</h2></div>
    <label for="titre">Titre de la Tâche :</label>
    <span>{{ $task['title']}}</span>
    <label for="description">Description :</label>
    <span>{{ $task['description']}}</span>
    <div class="close-btn"><a href="{{route('chef_dashboard.index')}}">Fermer</a></div>
</div>
</body>
</html>
@endsection

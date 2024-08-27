@extends('layouts.chefnav')
@section('text_css')
<title>Dashboard</title>
<link rel="stylesheet" href="{{asset('css/dashboard.css')}}">
</head>
<body>
<div class="container">
        <div class="title-form"><h2>Modifier une Tâche</h2></div>
    <form method="POST" action="{{route('chef_dashboard.update',1)}}">
    
        @csrf
        @method('PUT')
        <label for="titre">Titre de la Tâche :</label>
        <input type="text" id="titre" name="titre" required>


        <label for="description">Description :</label>
        <textarea id="description" name="description" rows="4" cols="50" required></textarea>

        <input type="submit" value="Modifier la Tâche">
        <div class="close-btn"><a href="{{route('chef_dashboard.index')}}" >Fermer</a></div>
    </form>
    </div>


</body>
</html>
@endsection

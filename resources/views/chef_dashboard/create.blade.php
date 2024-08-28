@extends('layouts.chefnav')
@section('text_css')
<title>Dashboard task creation</title>
<link rel="stylesheet" href="{{asset('css/dashboard.css')}}">
</head>
<body>
<div class="container">
        <div class="title-form"><h2>Créer une Tâche</h2></div>
    <form action="{{route('chef_dashboard.store')}}" method="post">
        @csrf
        <label for="titre">Titre de la Tâche :</label>
        <input type="text" id="titre" name="titre" required>


        <label for="description">Description :</label>
        <textarea id="description" name="description" rows="4" cols="50" required></textarea>

        <input type="submit" value="Créer la Tâche">
        <div class="close-btn"><a href="{{route('chef_dashboard.index')}}" >Fermer</a></div>
    </form>
    </div>


</body>
</html>
@endsection

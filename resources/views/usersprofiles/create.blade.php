@extends('layouts.adminnav')
@section('text_css')
<title>add a new department</title>
<link rel="stylesheet" href="{{ asset('css/usersprofiles.css') }}">
</head>
<body>
<div class="container">
        <div class="title-form"><h2>Ajouter un dépatement</h2></div>
    <form action="{{route('usersprofiles.store')}}" method="post">
        @csrf
        <label for="manager_name">Nom complet du manager :</label>
        <input type="text" id="manager_name" name="manager_name" placeholder="Nom du manager" required>
        <label for="department_name">Le département :</label>
        <input type="text" id="department_name" name="department_name" placeholder="Nom du département" required>
        <input type="submit" value="Créer" style="margin-bottom : 10px ; margin-top : 10px; "></input>
        <div class="close-btn"><a href="{{route('usersprofiles.index')}}" >Fermer</a></div>
    </form>
    </div>
</body>
</html>
@endsection
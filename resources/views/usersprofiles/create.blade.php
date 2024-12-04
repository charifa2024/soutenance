@extends('layouts.adminnav')
@section('text_css')
<title>ajouter un département</title>
<link rel="stylesheet" href="{{ asset('css/usersprofiles.css') }}">
</head>
<body>
<div class="container">
        <div class="title-form"><h2>Créer un département</h2></div>
    <form action="{{route('usersprofiles.store')}}" method="post">
        @csrf
        <label for="titre">nom du département  :</label>
        <input type="text" id="titre" name="titre" placeholder="nom du département" required>

        <input type="submit" value="ajouter">
        <div class="close-btn"><a href="{{route('usersprofiles.index')}}" >Fermer</a></div>
    </form>
    </div>



</body>
</html>
@endsection
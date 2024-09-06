@extends('layouts.adminnav')
@section('text_css')
<title>edit a department</title>
<link rel="stylesheet" href="{{ asset('css/usersprofiles.css') }}">
</head>
<body>
<div class="container">
        <div class="title-form"><h2>Editer un dépatement</h2></div>
    <form action="{{route('usersprofiles.update',$manager_name->id)}}" method="post">
        @csrf
        @method('PUT')
        <label for="manager_name">Nom complet du manager :</label>
        <input type="text" id="manager_name" name="manager_name" placeholder="Nom du manager" value="{{$manager_name->manager_fullName}}" required>
        <label for="department_name">Le départment :</label>
        <input type="text" id="department_name" name="department_name" placeholder="Nom du département" value="{{$manager_name->department_name}}" required>
        <input type="submit" value="Editer" style="margin-bottom : 10px ; margin-top : 10px; "></input>
        <div class="close-btn"><a href="{{route('usersprofiles.index')}}" >Fermer</a></div>
    </form>
    </div>
</body>
</html>
@endsection
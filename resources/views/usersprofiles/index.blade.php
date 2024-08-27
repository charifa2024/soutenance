@extends('layouts.adminnav')
@section('text_css')
<title>users profiles</title>
<link rel="stylesheet" href="{{ asset('css/usersprofiles.css') }}">
</head>
<body>
    
<div class="usersprofiles-table">
    <div class="usersprofiles-table-container">
        <div class="usersprofiles-table-header">
            <h1>Gestion des profils des utilisateurs</h1>
        </div>
        <div class="usersprofiles-table-body">
            <table>
            <thead>
            <tr>
                <th>#</th>
                <th>Date de création</th>
                <th>Nom complet</th>
                <th>Rôle</th>
                <th>Voir les Informations</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($usersprofiles as $usersprofile)
    <tr>
      <td>{{$usersprofile['id']}}</td>
      <td>{{$usersprofile['date']}}</td>
      <td>{{$usersprofile['nom']}}</td>
      <td>{{$usersprofile['role']}}</td>
      <td><a href="{{route('usersprofiles.show' , $usersprofile['id'])}}" class="action-btn">Voir</a></td>
    </tr>
    @endforeach
        </tbody>
        </table>
        </div>
</div>
</body>
</html>
@endsection

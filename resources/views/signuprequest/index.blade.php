@extends('layouts.adminnav')
@section('text_css')
<title>sign up requests</title>
<link rel="stylesheet" href="{{ asset('css/signuprequest.css') }}">
</head>
<body>
    
<div class="signuprequest-table">
    <div class="signuprequest-table-container">
        <div class="signuprequest-table-header">
            <form action="#" method="get" class="search-form">
            <h1> Demandes d'inscription des utilisateurs</h1>
                <input type="text" name="search" placeholder="Rechercher..." class="search-input">
                <button type="submit" class="search-btn">Rechercher</button>
            </form>
        </div>
        <div class="signuprequest-table-body">
            <table>
            <thead>
            <tr>
                <th>Date</th>
                <th>Nom complet</th>
                <th>Vérifier les informations</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($signuprequests as $signuprequest)
    <tr>
      <td>{{$signuprequest->created_at}}</td>
      <td>{{$signuprequest->Firstname}} {{$signuprequest->Lastname}}</td>
      <td><a href="{{route('signuprequest.show' ,$signuprequest->id)}}" class="action-btn">Vérifier</a></td>
      <td class="action-buttons">
        <div><form action="{{route('signuprequest.accept',$signuprequest->id)}}" method="post">
            @csrf
            <input type="submit" value="Accepter" class="action-btn" style=" background-color : green;">
        </form>
        </div>
        <div>
            <form action="{{route('signuprequest.refuse',$signuprequest->id)}}" method="post">
                @csrf
                @method('DELETE')
                <input type="submit" value="Refuser" class="action-btn" style=" background-color : red;">
            </form>
        </div>
    
    </td>
    </tr>
    @endforeach
        </tbody>
        </table>
        </div>
</div>
</body>
</html>
@endsection

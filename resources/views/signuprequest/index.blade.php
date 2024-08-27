@extends('layouts.adminnav')
@section('text_css')
<title>sign up requests</title>
<link rel="stylesheet" href="{{ asset('css/signuprequest.css') }}">
</head>
<body>
    
<div class="signuprequest-table">
    <div class="signuprequest-table-container">
        <div class="signuprequest-table-header">
            <h1> Demandes d'inscription des utilisateurs</h1>
        </div>
        <div class="signuprequest-table-body">
            <table>
            <thead>
            <tr>
                <th>#</th>
                <th>Date</th>
                <th>Nom complet</th>
                <th>Vérifier les informations</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($signuprequests as $signuprequest)
    <tr>
      <td>{{$signuprequest['id']}}</td>
      <td>{{$signuprequest['date']}}</td>
      <td>{{$signuprequest['nom']}}</td>
      <td><a href="{{route('signuprequest.show' , $signuprequest['id'])}}" class="action-btn">Vérifier</a></td>
      <td class="action-buttons">
        <div><input type="button" value="Accepter" class="action-btn" style=" background-color : green;"></div>
        <div><input type="button" value="Refuser" class="action-btn" style=" background-color : red;"></div>
    
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

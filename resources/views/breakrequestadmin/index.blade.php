@extends('layouts.adminnav')
@section('text_css')
<title>Break Request management</title>
<link rel="stylesheet" href="{{ asset('css/breakrequestadmin.css') }}">
</head>
<body>
<div class="breakrequest-table">
    <div class="breakrequest-table-container">
        <div class="breakrequest-table-header">
        <form action="{{ route('breakrequestadmin.index') }}" method="get" class="search-form">
        <h1>Demandes de Congés</h1>
        <input type="text" name="search" placeholder="Rechercher..." class="search-input" value="{{ request('search') }}">
        <button type="submit" class="search-btn">Rechercher</button>
            </form>
        </div>
        <div class="breakrequest-table-body">
            <table>
            <thead>
            <tr>
                <th>Date de Demande</th>
                <th>Nom Complet de l'Employé</th>
                <th>Détails</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($breakrequests as $breakrequest)
    <tr>
      <td>{{$breakrequest['created_at']}}</td>
      <td>{{$breakrequest->user['lastName']}} {{$breakrequest->user['firstName']}}</td>
      <td><a href="{{route('breakrequestadmin.show' , $breakrequest['id'])}}" class="action-btn">Voir</a></td>
      <td class="action-buttons">
        <form action="{{route('breakrequestadmin.accept',$breakrequest['id'])}}" method="post">
            @csrf
        <div><input type="submit" value="Accepter" class="action-btn" style=" background-color : #308830;"></div>
        </form>
        <form action="{{route('breakrequestadmin.refuse',$breakrequest['id'])}}" method="post">
            @csrf
        <div><input type="submit" value="Refuser" class="action-btn" style=" background-color : #cc4141;"></div>
        </form>
    
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

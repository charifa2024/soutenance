@extends('layouts.adminnav')
@section('text_css')
<title>Break Request management</title>
<link rel="stylesheet" href="{{ asset('css/breakrequestadmin.css') }}">
</head>
<body>
<div class="breakrequest-table">
    <div class="breakrequest-table-container">
        <div class="breakrequest-table-header">
            <h1>Demandes de Congés</h1>
        </div>
        <div class="breakrequest-table-body">
            <table>
            <thead>
            <tr>
                <th>#</th>
                <th>Date de Demande</th>
                <th>Nom Complet de l'Employé</th>
                <th>Détails</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($breakrequests as $breakrequest)
    <tr>
      <td>{{$breakrequest['id']}}</td>
      <td>{{$breakrequest['date']}}</td>
      <td>{{$breakrequest['nom']}}</td>
      <td><a href="{{route('breakrequestadmin.show' , $breakrequest['id'])}}" class="action-btn">Voir</a></td>
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

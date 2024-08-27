@extends('layouts.nav')
@section('text_css')
<title>task management</title>
    <link rel="stylesheet" href="{{asset('css/taskmanguser.css')}}">
</head>
@endsection
<body>
<div class="tasks-table">
    <div class="tasks-table-container">
        <div class="tasks-table-header">
            <h1>Tâches Assignées</h1>
        </div>
        <div class="tasks-table-body">
            <table>
            <thead>
            <tr>
                <th>#</th>
                <th>Date</th>
                <th>Titre</th>
                <th>Date de dépôt</th>
                <th>Statut</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($tasks as $task)
    <tr>
      <td>{{$task['id']}}</td>
      <td>{{$task['date']}}</td>
      <td>{{$task['titre']}}</td>
      <td>{{$task['date_depot']}}</td>
      <td><button class="state">{{$task['status']}}</button></td>
      <td><a href="{{route('taskmanguser.show' , $task['id'])}}" class="action-btn">Voir</a></td>
    </tr>
    @endforeach
        </tbody>
        </table>
        </div>
</div>
<script src="{{asset('JS/state_button.js')}}" ></script>

</body>
</html>


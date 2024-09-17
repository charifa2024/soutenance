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
            <form action="#" method="get" class="search-form">
            <h1>Tâches Assignées</h1>
                <input type="text" name="search" placeholder="Rechercher..." class="search-input">
                <button type="submit" class="search-btn">Rechercher</button>
            </form>
        </div>
        <div class="tasks-table-body">
            <table>
            <thead>
            <tr>
                <th>Date</th>
                <th>Titre</th>
                <th>Date de dépôt</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($tasks as $task )
    <tr>
      <td>{{$task['created_at']}}</td>
      <td>{{$task['title']}}</td>
      <td>{{$task['due_date']}}</td>
      <td>{{$task['status_user']}}</td>
    <td><div class="actions">
      <button class="view-btn"> <a href="{{route('taskmanguser.show' , $task['id'])}}">Voir</a></button>
      @if ($task['status_user'] === 'on')
      <form method="get" action="#">
        @csrf
    <button type="submit" class="state">Terminé</button>
</form>
@endif

      </div>

      </td>
    </tr>
    @endforeach
        </tbody>
        </table>
        </div>
</div>
<script src="{{asset('JS/state_button.js')}}" ></script>

</body>
</html>


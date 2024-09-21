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
        <form action="{{ route('taskmanguser.index') }}" method="get" class="search-form">
        <h1>Tâches Assignées au group</h1>
    <input type="text" name="search" placeholder="Rechercher..." class="search-input" value="{{ $search }}">
    <button type="submit" class="search-btn">Rechercher</button>
</form>

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
      @if ($task['status_user'] === 'on')
      <td style="color:red;" >{{$task['status_user']}}</td>
      @endif
      @if($task['status_user'] === 'off')
      <td style="color:green;" >{{$task['status_user']}}</td>
      @endif
      @if($task['status_user'] === 'pause')
      <td>temps Terminé</td>
      @endif
    <td><div class="actions">
      <button class="view-btn"> <a href="{{route('taskmanguser.show' , $task['id'])}}">Voir</a></button>
      @if ($task['status_user'] === 'on')
      <form method="get" action="{{ route('taskmanguser.state', $task['id']) }}">
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


</body>
</html>


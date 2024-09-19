@extends('layouts.nav')
@section('text_css')
<title>Dashboard</title>
<link rel="stylesheet" href="{{asset('css/dashboard.css')}}">
</head>
<body>
<div class="dashboard-container">
    <div class="welcome">
    <h class="welcome-message">Bienvenue {{ Auth::user()->firstName }} {{ Auth::user()->lastName }} sur votre tableau de bord !</h>
    </div>
    <div class="resume_data">
      <div class="resume_data_item">
        <div class="tasks-done">
          <h2>Tâches personnelles</h2>
          <div class="data-cercle">{{$nbr_notdone}}</div>
        </div>
        <div class="tasks-done">
          <h2>Tâches assignées</h2>
          <div class="data-cercle">{{$assignedTasksCount}}</div>
        </div>
        <div class="tasks-done">
          <h2>Tâches complétées</h2>
          <div class="data-cercle">{{$completedAssignedTasksCount}}</div>
        </div>
      </div>
    </div>

    <div class="dashboard-content">
    <div class="tasks_container">
    <div class="tasks-table-header">
    <form action="{{ route('dashboard.index') }}" method="get" class="search-form">
        <h1>Liste de Tâches personnelles</h1>
        <input type="text" name="search" placeholder="Rechercher..." class="search-input" value="{{ request('search') }}">
        <button type="submit" class="search-btn">Rechercher</button>
    </form>
</div>

    <div class="tasks-table">
    <table class="table">
  <thead>
    <tr>
      <th>Date</th>
      <th>Titre</th>
      <th>status</th>
      <th>Actions</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($tasks as $task)
    <tr>
      <td>{{$task['created_at']}}</td>
      <td>{{$task['title']}}</td>
      @if ($task['status'] === 'en cours')
      <td style="color:red;" >{{$task['status']}}</td>
      @endif
      @if($task['status'] === 'complète')
      <td style="color:green;" >{{$task['status']}}</td>
      @endif
      <td><div class="actions">
      <button class="view-btn"> <a href="{{route('dashboard.show' , $task['id'])}}">Voir</a></button>
      <button class="edit-btn" ><a href="{{route('dashboard.edit' , $task['id'])}}">Modifier</a></button>
      <form method="POST" action="{{route('dashboard.destroy', $task['id'])}}" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cette tâche ?');">
    @csrf
    @method('DELETE')
    <button type="submit" class="delete-btn">Supprimer</button>
</form>

      @if ($task['status'] === 'en cours')
      <form method="get" action="{{ route('dashboard.state', $task['id']) }}">
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
    <div>
        <div class="add">
            <a href="{{route('dashboard.create')}}" class="add-btn">Ajouter une tâche </a>
        </div>
    </div>
</div>
    </div>
</div>
<script>
  
</script>
</body>
</html>
@endsection

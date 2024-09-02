@extends('layouts.nav')
@section('text_css')
<title>Dashboard</title>
<link rel="stylesheet" href="{{asset('css/dashboard.css')}}">
</head>
<body>
<div class="dashboard-container">
    <div class="welcome">
    <h class="welcome-message">Bienvenue sur votre tableau de bord !</h>
    </div>
    <div class="resume_data">
      <div class="resume_data_item">
        <div class="tasks-done">
          <h2>Tâches personnelles</h2>
          <div class="data-cercle">23</div>
        </div>
        <div class="tasks-done">
          <h2>Tâches assignées</h2>
          <div class="data-cercle">23</div>
        </div>
        <div class="tasks-done">
          <h2>Tâches complétées</h2>
          <div class="data-cercle">23</div>
        </div>
      </div>
    </div>

    <div class="dashboard-content">
    <div class="tasks_container">
    <div class="tasks-table-header">
            <form action="#" method="get" class="search-form">
            <h1>Liste de Tâches personnelles</h1>
                <input type="text" name="search" placeholder="Rechercher..." class="search-input">
                <button type="submit" class="search-btn">Rechercher</button>
            </form>
    </div>

    <div class="tasks-table">
    <table class="table">
  <thead>
    <tr>
      <th>#</th>
      <th>Titre</th>
      <th>description</th>
      <th>statut</th>
      <th>Actions</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($tasks as $task)
    <tr>
      <td>{{$task['id']}}</td>
      <td>{{$task['titre']}}</td>
      <td>{{$task['description']}}</td>
      <td><button class="state">{{$task['status']}}</button></td>
      <td><div class="actions">
      <button class="edit-btn" ><a href="{{route('dashboard.edit' , $task['id'])}}">Modifier</a></button>
      <form method="POST" action="{{route('dashboard.destroy', $task['id'])}}">
        @csrf
        @method('DELETE')
      <button  type="submit" class="delete-btn" >Supprimer</button>
      </form>
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
@if(session()->has('success'))
<div class="popup-confirm">
  <div class="popup">
  <div class="popup-confirm-content">
    <h2>Êtes-vous sûr de vouloir supprimer cette tâche?</h2>
    <div class="popup-confirm-btn">
      {{session('success')}}
    
      <button class="btn-confirm" onclick="destroy_session()">Oui</button>
      <button class="btn-cancel" onclick="destroy_session()">Non</button>
    </div>
    </div>
</div>
@endif

<script>
  function destroy_session(){
    sessionStorage.removeItem('success');
    window.location.reload();
  }
</script>
<script src="{{asset('JS/state_button.js')}}" ></script>
</body>
</html>
@endsection

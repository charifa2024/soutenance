@extends('layouts.chefnav')
@section('text_css')
<title>task management</title>
    <link rel="stylesheet" href="{{asset('css/taskmangchef.css')}}">
    <div class="tasks_container">
    <div class="tasks-table-header">
      <form action="#" method="get" class="search-form">
      <h1>Tâches Assignées au group</h1>
                <input type="text" name="search" placeholder="Rechercher..." class="search-input">
                <button type="submit" class="search-btn">Rechercher</button>
            </form>
    </div>


    <div class="tasks-table">
    <table class="table">
  <thead>
    <tr>
      <th>#</th>
      <th>Date</th>
      <th>Titre</th>
      <th>Date de dépôt</th>
      <th>status</th>
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
      <td>{{$task['status']}}</td>
      <td><div class="actions">
      <button class="edit-btn" ><a href="{{route('taskmangchef.edit' , $task['id'])}}">Modifier</a></button>
      <button class="view-btn"> <a href="{{route('taskmangchef.show' , $task['id'])}}">Voir</a></button>
      </div>
    </tr>
    @endforeach
  </tbody>
</table>
<div>
        <div class="add">
            <a href="{{route('taskmangchef.create')}}" class="add-btn">Ajouter une tâche au group</a>
        </div>
    </div>
    </div>
</div>

</body>
</html>
@endsection
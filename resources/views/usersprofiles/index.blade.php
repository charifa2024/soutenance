@extends('layouts.adminnav')
@section('text_css')
<title>users profiles</title>
<link rel="stylesheet" href="{{ asset('css/usersprofiles.css') }}">
</head>
<body>
    
<div class="usersprofiles-table">
    <div class="usersprofiles-table-container">
        <div class="usersprofiles-table-header">
        <form action="{{ route('usersprofiles.index') }}" method="get" class="search-form">
    <h1>Gestion des profils des utilisateurs</h1>
    <input type="text" name="search" placeholder="Rechercher..." class="search-input" value="{{ request('search') }}">
    <button type="submit" class="search-btn">Rechercher</button>
</form>

        </div>

        <div class="usersprofiles-table-body">
            <table>
            <thead>
            <tr>
                <th>Date de création</th>
                <th>Nom complet</th>
                <th>Rôle</th>
                <th>Voir les Informations</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
    <tr>
      <td>{{$user['created_at']}}</td>
      <td>{{$user['firstName']}} {{$user['lastName']}}</td>
      <td>{{$user['role']}}</td>
      <td><div class="actions">
      <button class="view-btn"> <a href="{{route('usersprofiles.show' ,$user->id)}}">Voir</a></button>
      <form id="delete-form-{{ $user->id }}" method="POST" action="{{ route('usersprofiles.destroy', $user->id) }}">    @csrf
    @method('DELETE')
    <button type="button" class="delete-btn" onclick="confirmDelete({{ $user->id }})">Supprimer</button>
    </form>
</td>
    </tr>
    @endforeach
        </tbody>
        </table>
        </div>


        <div class="usersprofiles-table-body">
            <table>
            <thead>
            <tr>
                <th>Nom des départements ajoutés à l'application</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($department_names as $name)
    <tr>
      <td>{{$name}}</td>
    </tr>
    @endforeach
        </tbody>
        </table>
        </div>
</div>

        <div class="add">
            <a href="{{route('usersprofiles.create')}}" class="add-btn">Ajouter un département</a>
        </div>
    </div>
    </div>
</div>
<script>
function confirmDelete(userId) {
    if (confirm('Est-ce que vous êtes sûr de vouloir supprimer cet utilisateur ?')) {
        document.getElementById('delete-form-' + userId).submit();
    }
}
</script>


</body>
</html>
@endsection

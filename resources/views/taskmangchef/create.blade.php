@extends('layouts.chefnav')
@section('text_css')
<title>task management task creation</title>
    <link rel="stylesheet" href="{{asset('css/taskmangchef.css')}}">
</head>
<body>
    <div class="container">
        <div class="title-form"><h2>Créer une Tâche</h2></div>
    <form action="{{route('taskmangchef.store')}}" method="post">
        @csrf
        <label for="titre">Titre de la Tâche :</label>
        <input type="text" id="titre" name="titre" required>
        
        <label for="date_echeance">Date d'échéance :</label>
        <input type="date" id="date_echeance" name="date_echeance" required>

        <label for="description">Description :</label>
        <textarea id="description" name="description" rows="4" cols="50" required></textarea>

        <label for="notes">Notes :</label>
        <textarea id="notes" name="notes" rows="3" cols="50"></textarea>

    <label>Sélection des noms du group :</label>
    <div class="case">
    <div>
    <input type="checkbox" id="employe1" name="team[]" value="employe1">
    <label for="employe1">Employé 1</label>
    </div>
    <div>
    <input type="checkbox" id="employe2" name="team[]" value="employe2">
    <label for="employe2">Employé 2</label>
    </div>
    <div>
    <input type="checkbox" id="employe3" name="team[]" value="employe3">
    <label for="employe3">Employé 3</label>
    </div>
    </div>


        <input type="submit" value="Créer la Tâche">
        <div class="close-btn"><a href="{{route('taskmangchef.index')}}" >Fermer</a></div>
    </form>
    </div>
</body>
</html>  

@endsection
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
        <input type="text" id="titre" name="titre"  placeholder="titre" required>
        
        <label for="date_echeance">Date d'échéance :</label>
        <input type="date" id="date_echeance" name="date_echeance" required>

        <label for="description">Description :</label>
        <textarea id="description" name="description" rows="4" cols="50" placeholder="description" required></textarea>

        <label for="notes">Notes :</label>
        <textarea id="notes" name="notes" rows="3" cols="50" placeholder="notes"></textarea>
        <label for="group">selectionnez les membres :</label>
        <div id="select">
            @foreach ($employees as $employee)
            <input type="checkbox" name="group[]" value="{{$employee['id']}}"><span for="name">{{$employee['name']}}</span><br>
            @endforeach
        </div>
        <input type="submit" value="Créer la Tâche">
        <div class="close-btn"><a href="{{route('taskmangchef.index')}}" >Fermer</a></div>
    </form>
    </div>
</body>
</html>  

@endsection
@extends('layouts.chefnav')
@section('text_css')
<title>task management task edit</title>
    <link rel="stylesheet" href="{{asset('css/taskmangchef.css')}}">
</head>
<body>
    <div class="container">
        <div class="title-form"><h2>Modifier une Tâche</h2></div>
    <form action="{{route('taskmangchef.update' , 1)}}" method="post">
        @csrf
        @method('PUT')
        <label for="date_echeance">Date d'échéance :</label>
        <input type="date" id="date_echeance" name="date_echeance" required>

        <label for="description">Description :</label>
        <textarea id="description" name="description" rows="4" cols="50" placeholder="description" required></textarea>

        <label for="notes">Notes :</label>
        <textarea id="notes" name="notes" rows="3" cols="50" placeholder="notes"></textarea>

        <input type="submit" value="Modifier la Tâche">
        <div class="close-btn"><a href="{{route('taskmangchef.index' , )}}" >Fermer</a></div>
    </form>
    </div>
</body>
</html>  

@endsection
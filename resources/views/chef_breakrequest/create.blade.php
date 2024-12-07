@extends('layouts.chefnav')
@section('text_css')
<title>Break Request</title>
<link rel="stylesheet" href="{{ asset('css/breakrequest.css') }}">
</head>
<body>
    <div class="container">
        <h2>Formulaire de Demande de Congé</h2>
        <form action="{{route('chef_breakrequest.store')}}" method="POST">
            @csrf
            <div class="form-group">
            <label for="start_time">Date de début :</label>
                <input type="date" name="start_time" id="start_time" required>
            </div>
            <div class="form-group">
            <label for="end_time">Date de fin :</label>
                <input type="date" name="end_time" id="end_time" required>
            </div>
            <div class="form-group">
            <label for="reason">Raison :</label>
                <textarea name="reason" id="reason" rows="3" required></textarea>
            </div>
            <div>
                <input type="submit" value="Envoyer">
            </div>
            <div class="close-btn"><a href="{{route('chef_breakrequest.index')}}" >Fermer</a></div>
        </form>
    </div>
</body>
</html>
@endsection

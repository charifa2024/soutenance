@extends('layouts.adminnav')
@section('text_css')
<title>contact form messages creation</title>
<link rel="stylesheet" href="{{ asset('css/contactmssg.css') }}">
</head>
<body>
<div class="container">
        <div class="title-form"><h2>Réponse au Message</h2></div>
    <form action="{{route('contactmssg.store')}}" method="post">
        @csrf
        
        <label for="message">Message :</label>
        <textarea id="message" name="message" rows="4" cols="50" required></textarea>
        <input type="submit" value="Envoyer" style="margin-bottom : 10px ; margin-top : 10px; "></input>
        <div class="close-btn"><a href="{{route('contactmssg.index')}}" >Fermer</a></div>
    </form>
    </div>
</body>
</html>
@endsection
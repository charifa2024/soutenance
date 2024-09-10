@extends('layouts.app')
@section('content')
<link rel="stylesheet" href="{{asset('css/nav.css')}}">
@yield('text_css')
@section('nav')
<div class="navigation">
    <a href="{{route('breakrequestadmin.index')}}">Gestion des Demandes de Pause</a>
    <a href="#">Telegram</a>
    <a href="{{route('contactmssg.index')}}"> Messages de Contact</a>
    <a href="{{route('signuprequest.index')}}"> Demandes d'Inscription</a>
    <a href="{{route('usersprofiles.index')}}"> Les utilisateurs</a>
    <form action="{{route('loginpage.logout')}}" method="get">
                <input type="submit" value="Déconnexion" class="btnLogout">
        </form>
</div>
</header>
</body>
</html>
@endsection
@endsection
@extends('layouts.app')
@section('content')
<link rel="stylesheet" href="{{asset('css/nav.css')}}">
@yield('text_css')
@section('nav')
<div class="navigation">
        <a href="{{route('chef_dashboard.index')}}">Gestion des Performances</a>
        <a href="{{route('taskmangchef.index')}}">Gestion des Tâches</a>
        <a href="{{route('chef_breakrequest.index')}}">Demande de Pause</a>
        <a href="#">Telegram</a>
        <a href="{{route('chef_profile.index')}}">Profil</a>
        <form action="{{route('loginpage.logout')}}" method="get">
                <input type="submit" value="Déconnexion" class="btnLogout">
        </form>
</div>

</header>
</body>

</html>
@endsection
@endsection
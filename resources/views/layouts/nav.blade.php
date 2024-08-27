@extends('layouts.app')
@section('content')
<link rel="stylesheet" href="{{asset('css/nav.css')}}">
@yield('text_css')
@section('nav')
<div class="navigation">
        <a href="{{route('dashboard.index')}}">Gestion des Performances</a>
        <a href="{{route('taskmanguser.index')}}">Gestion des Tâches</a>
        <a href="{{route('breakrequest.create')}}">Demande de Pause</a>
        <a href="#">Telegram</a>
        <a href="{{route('profilepage.index')}}">Profil</a>
        <button class="btnLogout">Déconnexion</button>
</div>
</header>
</body>
</html>
@endsection
@endsection
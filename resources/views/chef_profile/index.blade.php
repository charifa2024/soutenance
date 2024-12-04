@extends('layouts.chefnav')
@section('text_css')
<title>profile</title>
    <link rel="stylesheet" href="{{asset('css/profilepage.css')}}">
</head>
<body>
<div class="container">
    <div class="profile">
        <h1>Profil</h1>
        <div class="profile-info">
        <h2>vos Informations</h2>
            <div class="profile-info-item">
                <label for="name">Nom complet :</label>
                <span id="name">{{ Auth::user()->firstName }} {{ Auth::user()->lastName }}</span>
            </div>
            <div class="profile-info-item">
            <label for="email">Email :</label>
            <span id="email">{{ Auth::user()->email }}</span>
            </div>
            <div class="profile-info-item">
                <label for="department">Département :</label>
                <span id="department">{{ $department }}</span>
            </div>
            <div class="profile-info-item">
                <label for="role">Rôle :</label>
                <span id="role">{{ Auth::user()->role }}</span>
            </div>
        </div>


        <div class="edit_button"><button class="edit-btn" ><a href="{{route('chef_profile.edit')}}">Modifier</a></button></div>
        </div>
</div>

</body>
</html>
@endsection
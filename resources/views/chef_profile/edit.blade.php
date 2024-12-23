@extends('layouts.chefnav')
@section('text_css')
<title>profile editing</title>
    <link rel="stylesheet" href="{{asset('css/profilepage.css')}}">
</head>
<body>
<div class="container">
        <div class="title-form"><h2>Modifier votre profil</h2></div>
    <form method="POST" action="{{ route('chef_profile.update') }}">
        @csrf
        @method('PUT')
        <label for="email">Email :</label>
        <input type="email" id="email" name="email" placeholder="email" required>

        <input type="submit" value="Modifier" id="email.btn"  >
    </form>
    <form method="POST" action="{{ route('chef_profile.update') }}">
        @csrf
        @method('PUT')
        <label for="password">Mot de passe :</label>
        <input type="password" id="password" name="password" placeholder="mot de passe" required >
        <label for="confirm_pwd">Confirmez le Mot de passe</label>
        <input type="password" id="confirm_pwd" name="confirm_pwd" placeholder="confirmez le mot de passe" required >

        <input type="submit" value="Modifier" id="password.btn" >
    </form>
    <div class="close-btn"><a href="{{route('chef_profile.index')}}" >Fermer</a></div>
    </div>

</body>
</html>
@endsection
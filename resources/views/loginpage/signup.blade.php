@extends('layouts.app')
@section('content')
<title>sign up page</title>
    <link rel="stylesheet" href="{{asset('css/login-signuppage.css')}}">
</head>
<body>
</header>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="box" style="margin-top: 5%;">
<div class="wrapper">
    <div class="form-box register">
        <h2>Créez un compte</h2>
        <form action="#" method="POST">
        @csrf
        <div class="input-group">
        <div class="input-box">
            <span class="icon"><ion-icon name="person-outline"></ion-icon></span>
        <input type="text" name="firstname" required>
        <label>Prénom</label>
        </div>
        <div class="input-box">
        <input type="text" name="lastname" required>
        <label>Nom de famille</label>
        </div>
        </div>

            <div class="input-box">
                    <span class="icon"><ion-icon name="mail-outline"></ion-icon></span>
                    <input type="email" name="user_email" required>
                    <label>Email</label>
            </div>
            <div class="input-group">
                <div class="input-box">
                <span class="icon"><ion-icon name="lock-closed-outline"></ion-icon></span>
                <input type="password" name="password" required>
                <label>Mot de passe</label>
                </div>
                <div class="input-box">
                <input type="password" name="password_confirmation" required>
                <label>Confirmez le mot de passe</label>
                </div>
            </div>
            <div class="input-box">
                <span class="icon"><ion-icon name="call-outline"></ion-icon></span>
                <input type="tel" name="phoneNumber" required>
                <label>Téléphone</label>
            </div>
            <div class="input-group">
                <div class="input-box">
                <span class="icon"><ion-icon name="briefcase-outline"></ion-icon></span>
                <input type="text" name="post" required>
                <label>Poste</label>
                </div>
                <div class="input-box">
                <input type="text" name="department" required>
                <label>Département</label>
                </div>

            </div>
            <div class="check">
                <input type="checkbox" name="manager" id="manager" >
                <label for="manager">Je suis un gestionnaire</label>
                <input type="checkbox" name="employee" id="employee" >
                <label for="employee">Je suis un employé</label>
            </div>
            <div class="check">
                <input type="checkbox" name="terms" id="terms" required>
                <label for="terms">J'accepte les termes et conditions</label>
            </div>
            <input type="submit" class="btn" value="S'inscrire" ></input>
        </form>
    </div>
</div>
</div>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>

@endsection
@extends('layouts.app')
@section('content')
<title>sign up page</title>
    <link rel="stylesheet" href="{{asset('css/login-signuppage.css')}}">
</head>
<body>
</header>
<div class="box" style="margin-top: 5%;">
<div class="wrapper">
    <div class="form-box register">
        <h2>Créez un compte</h2>
        <form action="{{route('loginpage.store')}}" method="POST">
        @csrf
        <div class="input-group">
        <div class="input-box">
            <span class="icon"><ion-icon name="person-outline"></ion-icon></span>
        <input type="text" required>
        <label>Prénom</label>
        </div>
        <div class="input-box">
        <input type="text" required>
        <label>Nom de famille</label>
        </div>
        </div>

            <div class="input-box">
                    <span class="icon"><ion-icon name="mail-outline"></ion-icon></span>
                    <input type="email" name="user-email" required>
                    <label>Email</label>
            </div>
            <div class="input-group">
                <div class="input-box">
                <span class="icon"><ion-icon name="lock-closed-outline"></ion-icon></span>
                <input type="password" name="user-pwd" required>
                <label>Mot de passe</label>
                </div>
                <div class="input-box">
                <input type="password" name="user-pwd" required>
                <label>Confirmez le mot de passe</label>
                </div>
            </div>
            <div class="input-box">
                <span class="icon"><ion-icon name="call-outline"></ion-icon></span>
                <input type="tel" name="user-tel" required>
                <label>Téléphone</label>
            </div>
            <div class="input-group">
                <div class="input-box">
                <span class="icon"><ion-icon name="briefcase-outline"></ion-icon></span>
                <input type="text" name="post" required>
                <label>Poste</label>
                </div>
                <div class="input-box">
                <input type="text" name="departement" required>
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
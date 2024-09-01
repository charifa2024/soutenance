@extends('layouts.app')
@section('content')
<title>Log in page</title>
    <link rel="stylesheet" href="{{asset('css/login-signuppage.css')}}">
</head>
<body>
</header>
<div class="box" style="margin-top: 5%;">
<div class="wrapper">
        <div class="form-box login">
            <h2>Connexion</h2>
            <form  method="post" action="#">
                @csrf
                <div class="input-box">
                    <span class="icon"><ion-icon name="mail-outline"></ion-icon></span>
                    <input type="email" name="user-email" required>
                    <label>Email</label>
                </div>
                <div class="input-box">
                    <span class="icon"><ion-icon name="lock-closed-outline"></ion-icon></span>
                    <input type="password" name="user-pwd" required>
                    <label>Mot de passe</label>
                </div>
                <button type="submit" class="btn" >Connexion</button>
                <div class="login-register">
                    <p>Vous n'avez pas de compte? <a href="{{route('loginpage.signup')}}" class="register-link">Créez-en un ici</a></p>
                </div>
                
            </form>

    </div>
</div>
</div>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>

@endsection
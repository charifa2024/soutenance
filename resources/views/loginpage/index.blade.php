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
            <form action="#">
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
                    <p>Vous n'avez pas de compte? <a class="register-link" onclick="changeform()" >Créez-en un ici</a></p>
                </div>
                
            </form>

    </div>
</div>
</div>
<div class="box" style="margin-top: -5%;">
<div class="wrapper">
    <div class="form-box register">
        <h2>Créez un compte</h2>
        <form action="#">
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
                <div class="input-box">
                    <input type="text" name="manager-name" not required>
                    <label>Nom du responsable</label>
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
            <button type="submit" class="btn" onclick="endregistration()">S'inscrire</button>
        </form>
    </div>
</div>
</div>
<div class="box" style="margin-top: 10%; margin-bottom: 5%;">
<div class="confirmation-card">
    <h2>🎉 Merci pour votre inscription !</h2>
    <p>✅ Votre demande de compte a été soumise. Un administrateur examinera vos informations et activera votre compte si elles sont validées.</p>
    <p>📧 Vous recevrez un e-mail de confirmation une fois que votre compte sera activé.</p>
</div>
</div>
<div class="homepagebtn" >
    <a href="{{route('homepage.index')}}">Retour à l'accueil</a>
</div>

<br><br>


    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script>
        function changeform(){
            document.querySelector('.login').style.display = 'none';
            document.querySelector('.register').style.display = 'block';
        }

        function endregistration(){
            document.querySelector('.login').style.display = 'none';
            document.querySelector('.register').style.display = 'none';
            document.querySelector('.confirmation-card').style.display = 'block';
            document.querySelector('.homepagebtn').style.display = 'block';
        }
    </script>
</body>
</html>

@endsection
@extends('layouts.app')
@section('content')
<title>sign up done</title>
    <link rel="stylesheet" href="{{asset('css/login-signuppage.css')}}">
    <style>
        footer{
            position: absolute;
            bottom: 0;
        }
    </style>
</head>
<body>
</header>
<div class="box" >
<div class="confirmation-card" 
onclick="location.href='{{route('homepage.index')}}'">
    <h2>🎉 Merci pour votre inscription !</h2>
    <p>✅ Votre demande de compte a été soumise. Un administrateur examinera vos informations et activera votre compte si elles sont validées.</p>
    <p>📧 Vous recevrez un e-mail de confirmation une fois que votre compte sera activé.</p>
</div>
</div>
</body>
</html>

@endsection
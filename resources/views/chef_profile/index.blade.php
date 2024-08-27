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
                <span id="name">John Doe</span>
            </div>
            <div class="profile-info-item">
            <label for="email">Email :</label>
            <span id="email">johndoe@example.com</span>
            </div>
            <div class="profile-info-item">
                <label for="phone">Téléphone :</label>
                <span id="phone">123-456-7890</span>
            </div>
            <div class="profile-info-item">
                <label for="department">Département :</label>
                <span id="department">Informatique</span>
            </div>
            <div class="profile-info-item">
                <label for="post">Poste :</label>
                <span id="post">Développeur</span>
            </div>
            <div class="profile-info-item">
                <label for="role">Rôle :</label>
                <span id="role">Chef du group</span>
            </div>
        </div>
        <form  method="POST"  action="#"></form>
        <div class="edit_profile">
            <h2>Modifier le profil</h2>
            <div class="edit_profile_item">
                <label for="pwd">Modifier le mot de passe :</label>
                <input type="password" id="pwdedit" name="pwd" placeholder="Entrez votre mot de passe">
                <button type="submit" class="btnEdit" id="btnpwd" >Enregistré</button>
            </div>
            <div class="edit_profile_item">
                <label for="email">Modifier l'email :</label>
                <input type="email" id="emailedit" name="email" placeholder="Entrez votre email">
                <button type="submit" class="btnEdit" id="btnemail" >Enregistré</button>
            </div>
            <div class="edit_profile_item">
                <label for="phone">Modifier le téléphone :</label>
                <input type="tel" id="phoneedit" name="phone" placeholder="Entrez votre téléphone">
                <button type="submit" class="btnEdit" id="btnphone" >Enregistré</button>
            </div>
        </div>
</form>
        <div class="popup">
            <div class="popup-content">
            <img src="{{asset('images/404-tick.png')}}">
            <h2>Modification effectuée avec succès</h2>
            </div>

        </div>
        <div class="error">
            <div class="error-content">
            <img src="{{asset('images/error.jpg')}}">
            <h2>Veuillez remplir le champs d'abord </h2>
            </div>
        </div>
    </div>
</div>
</div>

<script>
    pwdinput = document.getElementById("pwdedit");
    emailinput = document.getElementById("emailedit");
    phoneinput = document.getElementById("phoneedit");
    email=document.getElementById("email");
    phone=document.getElementById("phone");

    btnpwd=document.getElementById("btnpwd");
    btnemail=document.getElementById("btnemail");
    btnphone=document.getElementById("btnphone");

    popup=document.querySelector(".popup");
    error=document.querySelector(".error");
    btnpwd.addEventListener("click",function(){
        if(pwdinput.value!=""){
            popup.style.display="flex";
        }
        else{
            error.style.display="flex";
        }
    });
    btnemail.addEventListener("click",function(){
        if(emailinput.value!=""){
            email.innerHTML=emailinput.value;
            popup.style.display="flex";
        }
        else{
            error.style.display="flex";
        }
    });
    btnphone.addEventListener("click",function(){
        if(phoneinput.value!=""){
            phone.innerHTML=phoneinput.value;
            popup.style.display="flex";
        }
        else{
            error.style.display="flex";
        }
    });
    popup.addEventListener("click",function(){
        popup.style.display="none";
    });
    error.addEventListener("click",function(){
        error.style.display="none";
    });
    
</script>
</body>
</html>
@endsection
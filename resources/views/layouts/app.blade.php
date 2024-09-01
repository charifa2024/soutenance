<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
    .header{
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    padding: 20px 40px;
    display: flex;
    justify-content: space-between;
    align-items:center;
    z-index: 99;
    }

    .logo{
    font-size:1.7em;
    color:white;
    user-select:none;
    font-weight: bold;
    text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
    transition: all  0.3s ease;
    position: relative;
}
    .logo:hover{
    text-shadow: 3px 3px 6px rgba(0, 0, 0, 0.5);
    transform: scale(1.05);
}
a{
    text-decoration: none;
}
.copyrights {
    text-align: center;
    padding: 20px 0;
    margin-bottom: 0;
}

.copyrights p {
    margin: 0;
    font-size: 20px;
    color: #333333;
}
footer{
    position: relative;
    bottom: 0;
}
    </style>
@yield('content')
<header class="header">
<div class="logo"><a href="/homepage"><h2 class="logo" >ProManag</h2></a></div>
@yield('nav')
</header>
<footer>
<div class="copyrights">
    <p>&copy; 2024 ProManag. Tous droits réservés.</p>
</div>
</footer>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>home page</title>
    <link rel="stylesheet" href="{{url('css/homepage.css')}}">
</head>
<body>
<header class="header">
        <div class="logo"><h2 class="logo">ProManag</h2></div>
        <nav class="navigation">
        <a href="/loginpage" class="btn">Connexion</a>
        </nav>
</header>


<div class="container">
    <h1>Bienvenue sur notre plateforme</h1>
    <p>Découvrez nos services</p>
    <div class="img-office">
    <img src="{{asset('images/office.jpg')}}" alt="office">
</div>
</div>



<div class="section card">
    <h1>À propos de nous</h1>
    <br><br>
    <P>Bienvenue sur <strong>ProManag</strong> ,
    votre solution incontournable pour une gestion simplifiée des performances et des tâches. 
    Notre application web est conçue pour améliorer la productivité et la communication au sein de votre organisation,
    garantissant que chaque membre de l'équipe puisse contribuer de manière efficace et efficiente.
    </P>
    <br>
    <p>Chez <strong>ProManag</strong> , nous croyons en l'autonomisation des utilisateurs grâce à des outils simples mais puissants. Notre plateforme offre:</p>
    <br>
    <ul>
        <li><h3>Gestion des performances :</h3> Suivez et évaluez les performances individuelles et d'équipe avec facilité. Les responsables peuvent fournir des retours constructifs et les employés peuvent consulter leurs progrès et les domaines à améliorer.</li>
        <li><h3>Gestion des tâches :</h3>Créez, assignez et gérez les tâches sans effort. Que vous gériez des tâches personnelles ou des projets d'équipe, notre système garantit que tout le monde reste sur la bonne voie.</li>
        <li><h3>Gestion des pauses :</h3> Demandez et gérez les temps de pause de manière efficace, en veillant à respecter les politiques de l'organisation et en améliorant le bien-être des employés.</li>
        <li><h3>Contrôle administratif :</h3> Les administrateurs ont un contrôle total sur la gestion des utilisateurs, y compris l'approbation des nouvelles inscriptions, la réponse aux messages de contact et la supervision des demandes de pause.</li>
    </ul>
    <br>
    <p>Notre mission est de fournir une plateforme complète qui répond aux besoins divers des lieux de travail modernes. Que vous soyez un employé cherchant à mieux gérer vos tâches ou un responsable visant à améliorer les performances de l'équipe, <strong>ProManag</strong>  dispose des outils nécessaires pour réussir.</p>
    <br>
    <p>Rejoignez-nous dès aujourd'hui et faites le premier pas vers un environnement de travail plus organisé, productif et collaboratif.</p>
</div>
<br><br>

<footer class="footer">
<div class="contact-form">
    <h2 class="contact-title">Contactez-nous</h2>
    <form action="{{route('homepage.store')}}" method="post" class="form">
        @csrf
        <label for="email" class="form-label">Email :</label>
        <input type="email" id="email" name="email" required class="form-input">
        <label for="subject" class="form-label">Sujet :</label>
        <input type="text" id="subject" name="subject" required class="form-input">
        <label for="message" class="form-label">Message :</label>
        <textarea id="message" name="message" required class="form-input" rows="4"></textarea>
        <button type="submit" class="form-submit">Envoyer</button>
    </form>
</div>

<div class="busseniss-contact">
    <h2 class="contact-title">Contact Business</h2>
    <p class="contact-info">
        <strong>Email :</strong> contact.promanag@gmail.com  
        <strong>Téléphone :</strong> +21 26 56 26 63 79
    </p>
</div>
<div class="copyrights">
    <p>&copy; 2024 ProManag. Tous droits réservés.</p>
</div>
</footer>


</body>
</html>
<?php
session_start();
session_destroy();

?>


<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Déconnexion</title>
    <!-- FONT -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
</head>

<body>
    <section>
        <div>
            <h2>BLC !</h2>
            <h2>Bravo Les Copains !</h2>
            <h2>Vous vous êtes bien déconnecté...</h2>

            <h3>Revenez vite chez les FDP* !</h3>

            <p>FDP : la communauté des Fans De Pokémon ;)</p>

            <button class="bouton">
                <a href="accueil.php">Retour à l'accueil de PHP</a>
            </button>


        </div>
    </section>

</body>

</html>
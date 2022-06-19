<?php


session_start();
session_destroy();
include_once __DIR__ . "/includes/request.modif-suppr-profil.include.php";


?>


<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Déconnexion</title>
</head>

<body>
    <section>
        <div>
            <h2> BLC : Bravo Les Copains !</h2>
            <h2>Vous vous êtes bien déconnecté...</h2>

            <h3>Revenez vite chez les Fans De Pokémons !</h3>

            <p>FDP : la communauté des Fans De Pokémon </p>

            <button>
                <a href="accueil.php">Retour à l'accueil de PHP</a>
            </button>


        </div>
    </section>

</body>

</html>
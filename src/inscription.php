<?php

/* Imports */
include __DIR__ . "/classes/Utilisateurs.class.php";
require_once __DIR__ . "/includes/db.php";






/* Vérification du verbe HTTP */
if ($_SERVER["REQUEST_METHOD"] != "POST") {
    http_response_code(405); // Code HTTP Method Not Allowed (Verbe HTTP non autorisé)
    die(); // Arrêt du script
}

/* Récupération des valeurs  */
$category_type = $_POST["category_type"]; // Type d'utilisateur

if ($category_type == "Inscription") {
    $nom = $_POST["nom"]; // Le film choisi
    $prenom = $_POST["prenom"];
    $email = $_POST["email"];
    $mdp = $_POST["mdp"];
    $age = $_POST["age"];

    /* Préparation de la requête */
    $query = $dbh->prepare("INSERT INTO contacts (nom, prenom, email, mdp, age) VALUES (?, ?, ?, ?, ?);");
    /* Exécution de la requête */
    $result = $query->execute([$nom, $prenom, $email, $mdp, $age]);
} else if ($category_type == "Connexion") {
    $email = $_POST["email"];
    $mdp = $_POST["mdp"];

    /* Préparation de la requête */
    $query = $dbh->prepare("SELECT email and mdp FROM utilisateurs WHERE email=? and mdp=?");
    /* Exécution de la requête */
    $query->execute();
    /* Récupération des données retournées par la requête */
    $Utilisateurs = $query->fetchAll(PDO::FETCH_ASSOC);
}



?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Inscription</title>
</head>

<body>
    <?php if ($category == null) { ?>
        <p> Erreur, veuillez choisir une catégorie (Inscription ou Connexion) </p>
    <?php } else {
        // show_registration_summary($category_type, $category);
    } ?>
</body>

</html>
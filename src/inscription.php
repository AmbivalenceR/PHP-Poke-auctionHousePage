<?php

/* Imports */
require __DIR__ . "/includes/inscription_form.php";
include __DIR__ . "/classes/utilisateurs.classe.php";
require_once __DIR__ . "/includes/db.php";




/* Vérification du verbe HTTP */
if ($_SERVER["REQUEST_METHOD"] != "POST") {
    http_response_code(405); // Code HTTP verbe HTTP non autorisé
    die();
}

/* Récupération des valeurs  */
$category_type = $_POST["category_type"]; // Type d'utilisateur

if ($category_type == "Inscription") {
    $nom = $_POST["nom"];
    $prenom = $_POST["prenom"];
    $email = $_POST["email"];
    $mdp = $_POST["mdp"];
    $age = $_POST["age"];

    /* Préparation de la requête */
    $query = $dbh->prepare("INSERT INTO utilisateurs (nom, prenom, email, mdp, age) VALUES (?, ?, ?, ?, ?);");
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
    <?php if ($result == null) { ?>
        <p> Erreur, veuillez choisir une catégorie (Inscription ou Connexion) </p>
    <?php } else {
    } ?>
</body>

</html>
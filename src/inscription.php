<?php
//////// peut etre fusion avec Connexion-inscription ??////////
/* Imports */

use Utilisateurs\Utilisateurs;

require __DIR__ . "/includes/inscription_form.php";
include __DIR__ . "/classes/utilisateurs.classe.php";
require __DIR__ . "/includes/db.php";




/* Vérification du verbe HTTP */
if ($_SERVER["REQUEST_METHOD"] != "POST") {
    http_response_code(405); // Code HTTP verbe HTTP non autorisé
    die();
}

/* Récupération des valeurs  */
$category_type = $_POST["category_type"]; // Type d'utilisateur

if ($category_type == "Inscription") {
    $prenom = htmlspecialchars($_POST["prenom"]);
    $nom = htmlspecialchars($_POST["nom"]);
    $email = htmlspecialchars(filter_var($_POST["email"], FILTER_SANITIZE_EMAIL));
    $mdp = password_hash($_POST["mdp"], PASSWORD_DEFAULT);
    $age = htmlspecialchars($_POST["age"]);


    /* Création de l'utilisateur */
    $utilisateur = new Utilisateurs($prenom, $nom, $email, $mdp, $age);
    $result = $utilisateur->inscriptionUtilisateur();
} else if ($category_type == "Connexion") {
    $email = $_POST["email"];
    $mdp = $_POST["mdp"];

    /* Préparation de la requête */
    $query = $dbh->prepare("SELECT email and mdp FROM utilisateurs WHERE email=?");
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
    <?php if ($result == 1) { ?>
        <p>Merci pour votre inscription <?php $utilisateur->prenom ?> !</p>
    <?php } else { ?>
        <p> Erreur, veuillez choisir une catégorie (Inscription ou Connexion) fdp </p>
    <?php } ?>
</body>

</html>
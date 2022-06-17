<?php
/* Imports */

use Utilisateurs\Utilisateurs;

require __DIR__ . "/inscription_form.php";
include __DIR__ . "/../classes/utilisateurs.classe.php";
require __DIR__ . "/db.php";





/* Vérification du verbe HTTP */
// if ($_SERVER["REQUEST_METHOD"] != "POST") {
//     http_response_code(405); // Code HTTP verbe HTTP non autorisé
//     die();
// }

/* Récupération des valeurs  */
$category_type = $_POST["category_type"];
// Type d'utilisateur

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
    $email = htmlspecialchars(filter_var($_POST["email"], FILTER_SANITIZE_EMAIL));
    $mdp = $_POST["mdp"];

    /* Création de l'utilisateur */
    $utilisateur = Utilisateurs::connecterUtilisateur($email, $mdp);
}

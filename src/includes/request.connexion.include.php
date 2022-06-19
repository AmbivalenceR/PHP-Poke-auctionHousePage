<?php
/* Imports */

use Utilisateurs\Utilisateurs;

require __DIR__ . "/inscription_form.php";
include __DIR__ . "/../classes/utilisateurs.classe.php";
require __DIR__ . "/db.php";

// function connexionOuInscription()
// {
// };

/* Récupération des valeurs  */


if (isset($_POST["category_type"])) {
    $category_type = $_POST["category_type"];
    echo "Valeur de category_type à l'entrée dans request_connexion : " . $category_type;
    echo "ICI category_type est SET";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        echo "Entrée dans request_connexion";




        // Type d'utilisateur

        if ($category_type == "Inscription") {
            $prenom = htmlspecialchars($_POST["prenom"]);
            $nom = htmlspecialchars($_POST["nom"]);
            $email = htmlspecialchars(filter_var($_POST["email"], FILTER_SANITIZE_EMAIL));
            $mdp = password_hash($_POST["mdp"], PASSWORD_DEFAULT);
            $age = htmlspecialchars($_POST["age"]);
            $passePourConnexion = $_POST["mdp"];


            /* Création de l'utilisateur */
            $utilisateur = new Utilisateurs($prenom, $nom, $email, $mdp, $age);
            $result = $utilisateur->inscriptionUtilisateur();
            /* Connexion de l'utilisateur à la suite de son inscription */
            Utilisateurs::connecterUtilisateur($email, $passePourConnexion);
        } else if ($category_type == "Connexion") {
            $email = htmlspecialchars(filter_var($_POST["email"], FILTER_SANITIZE_EMAIL));
            $mdp = $_POST["mdp"];
            /* Connexion de l'utilisateur */
            $utilisateur = Utilisateurs::connecterUtilisateur($email, $mdp);
        }
    } else {
        return "ERREUR : category_type non défini.";
    }
}

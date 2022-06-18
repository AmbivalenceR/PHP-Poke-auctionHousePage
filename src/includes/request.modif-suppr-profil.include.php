<?php
/* Imports */

use Utilisateurs\Utilisateurs;

require __DIR__ . "/modif_form.include.php.php";
include __DIR__ . "/../classes/utilisateurs.classe.php";
require __DIR__ . "/db.php";

// function connexionOuInscription()
// {
// };

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    /* Récupération des valeurs  */
    $modifier_supprimer = $_POST["modifier_supprimer"];
    $validerSuppression = $_POST["validerSuppression"];

    /** --------------------------------------------------------------------------
     * Modification du profil
     */
    if ($modifier_supprimer == "Modifier") {
        $prenom = htmlspecialchars($_POST["prenom"]);
        $nom = htmlspecialchars($_POST["nom"]);
        $email = htmlspecialchars(filter_var($_POST["email"], FILTER_SANITIZE_EMAIL));
        $mdp = password_hash($_POST["mdp"], PASSWORD_DEFAULT);
        $age = htmlspecialchars($_POST["age"]);
        $passePourConnexion = $_POST["mdp"];


        /* Modification de l'utilisateur */
        $utilisateur = new Utilisateurs($prenom, $nom, $email, $mdp, $age);
        $result = $utilisateur->modifierUtilisateur();
        /* Connexion de l'utilisateur à la suite de son inscription */
        Utilisateurs::connecterUtilisateur($email, $passePourConnexion);

        /** --------------------------------------------------------------------------
         * Suppression du profil
         */
    } else if ($modifier_supprimer == "Supprimer" && $validerSuppression == "oui") {
        /* Récupération de l'id */
        $id_utilisateur = filter_var($_SESSION["id_utilisateur"], FILTER_SANITIZE_NUMBER_INT);

        /* Préparation de la requête */
        $query = $dbh->prepare("DELETE FROM utilisateurs WHERE id = ?;");

        /* Exécution de la requête */
        $suppressionReussie = $query->execute([$id_utilisateur]);
    }

    if ($suppressionReussie == 1) { ?>
        <p>Contact supprimé</p>
    <?php } else { ?>
        <p>Une erreur s'est produite, veuillez réessayer.</p>
    <?php } ?>

    <a href="accueil.php">Vers l'accueil de Poké'auction House Page</a>


<?php }

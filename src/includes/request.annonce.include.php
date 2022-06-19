<?php
// include de la classe "Annonce"
include __DIR__ . "/../classes/annonce.classe.php";

// Accès au namspace "Annonce"
use Annonce\Annonce;

// Require du new PDO
require_once __DIR__ . "/db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Récupération des données du formulaire de création d'annonce

    $prixDepart = $_POST["prixDepart"];
    $prixActuel = $_POST["prixDepart"];
    $date = $_POST["date"];
    $dateFinEncheres = $_POST["dateFinEncheres"];
    $nomPokemon = $_POST["nomPokemon"];
    $pvPokemon = $_POST["pvPokemon"];
    $typePokemon = $_POST["typePokemon"];
    $conditionCarte = $_POST["conditionCarte"];
    $rareteCarte = $_POST["rareteCarte"];
    $numeroSerieCarte = $_POST["numeroSerieCarte"];
    $descriptionPokemon = $_POST["descriptionPokemon"];
    $id_utilisateur = $_SESSION["id_utilisateur"];


    // création d'une instence de Annonce
    // pour potentiellement faire une page de validation avant enregistrement dans la bdd 
    $annonceCree = new Annonce($prixDepart, $date, $dateFinEncheres, $nomPokemon, $pvPokemon, $typePokemon, $conditionCarte, $rareteCarte, $numeroSerieCarte, $descriptionPokemon, $id_utilisateur);

    $_SESSION["annonce_prixDepart"] = $_POST["prixDepart"];
    $_SESSION["annonce_prixActuel"] = $_POST["prixDepart"];
    $_SESSION["annonce_date"] = $_POST["date"];
    $_SESSION["annonce_dateFinEncheres"] = $_POST["dateFinEncheres"];
    $_SESSION["annonce_nomPokemon"]  = $_POST["nomPokemon"];
    $_SESSION["annonce_pvPokemon"] = $_POST["pvPokemon"];
    $_SESSION["annonce_typePokemon"] = $_POST["typePokemon"];
    $_SESSION["annonce_conditionCarte"] = $_POST["conditionCarte"];
    $_SESSION["annonce_rareteCarte"] = $_POST["rareteCarte"];
    $_SESSION["annonce_numeroSerieCarte"] = $_POST["numeroSerieCarte"];
    $_SESSION["annonce_descriptionPokemon"] = $_POST["descriptionPokemon"];
}





// Préparation de la requête d'affichage de annonces 
$query = $dbh->prepare("SELECT * FROM annonces;");

// Exécution 
$query->execute();

// Afficher le resultat de l'execution. 
$annonces = $query->fetchAll(PDO::FETCH_ASSOC);

<?php
include __DIR__ . "/../classes/annonce.classe.php";

use Annonce\Annonce;

require_once __DIR__ . "/db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

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
    $id_utilisateur = $_SESSION["id"];



    $annonceCree = new Annonce($prixDepart, $date, $dateFinEncheres, $nomPokemon, $pvPokemon, $typePokemon, $conditionCarte, $rareteCarte, $numeroSerieCarte, $descriptionPokemon, $id_utilisateur);



    $query = $dbh->prepare("INSERT INTO annonces (`prix_depart`,`prix_actuel`, `date_annonce`,`date_de_fin`, `nom`,`pv`,`type`,`condition`,`rarete`,`n_serie`,`description`,`id_utilisateur`) VALUES (?,?,?,?,?,?,?,?,?,?,?,?);");

    $query->execute([$prixDepart, $prixActuel, $date, $dateFinEncheres, $nomPokemon, $pvPokemon, $typePokemon, $conditionCarte, $rareteCarte, $numeroSerieCarte, $descriptionPokemon, $id_utilisateur]);
}

/* Préparation de la requête */
$query = $dbh->prepare("SELECT * FROM annonces;");

/* Exécution de la requête */
$query->execute();

$annonces = $query->fetchAll(PDO::FETCH_ASSOC);

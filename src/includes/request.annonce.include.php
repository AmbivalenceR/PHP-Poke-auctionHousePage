<?php
include __DIR__ . "/../classes/annonce.classe.php";

use Annonce\Annonce;

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nomPokemon = $_POST["nomPokemon"];
    $typePokemon = $_POST["typePokemon"];
    $pvPokemon = $_POST["pvPokemon"];
    $descriptionPokemon = $_POST["descriptionPokemon"];
    $rareteCarte = $_POST["rareteCarte"];
    $numeroSerieCarte = $_POST["numeroSerieCarte"];
    $conditionCarte = $_POST["conditionCarte"];
    $prixDepart = $_POST["prixDepart"];
    $dateFinEncheres = $_POST["dateFinEncheres"];

    $annonceCree = new Annonce($nomPokemon, $typePokemon, $pvPokemon, $descriptionPokemon, $rareteCarte, $numeroSerieCarte, $conditionCarte, $prixDepart, $dateFinEncheres);
}

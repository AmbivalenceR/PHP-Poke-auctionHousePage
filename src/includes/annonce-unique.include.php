<?php

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $_SESSION["idAnnonce"] = $_GET["annonce"];
}

/* new PDO */
require_once __DIR__ . "/db.php";

/* Préparation de la requête */
$query = $dbh->prepare("SELECT * FROM annonces WHERE id = ?;");

/* Exécution de la requête */
$query->execute([$_SESSION["idAnnonce"]]);

$annonceSelectionne = $query->fetchAll(PDO::FETCH_ASSOC);

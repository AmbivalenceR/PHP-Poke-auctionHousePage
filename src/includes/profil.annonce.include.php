<?php
/* new PDO */
require_once __DIR__ . "/db.php";

/* Préparation de la requête */
$query = $dbh->prepare("SELECT * FROM annonces WHERE id_utilisateur = ?;");

/* Exécution de la requête */
$query->execute([$_SESSION["id_utilisateur"]]);

$annoncesId = $query->fetchAll(PDO::FETCH_ASSOC);

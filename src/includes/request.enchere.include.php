<?php

include __DIR__ . "/../classes/enchere.classe.php";
include __DIR__ . "/annonce-unique.include.php";
require __DIR__ . "/db.php";



if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $prix_offert = $_POST["prix_offert"];
    $id_utilisateur = $_SESSION["id"];
    $id_annonce = $_SESSION["idAnnonce"];

    // $enchere = new Enchere($prix_offert, $id_utilisateur, $id_annonce);
    // $resultatEnchere = $enchere->requeteEnchere();

    $query = $dbh->prepare("INSERT INTO encheres (`prix_offert`,`id_utilisateur`, `id_annonce`) VALUES (?,?,?);");

    //Exécution de la requête
    $result = $query->execute([$prix_offert, $id_utilisateur,  $id_annonce]);
    $enchere = $query->fetchAll(PDO::FETCH_ASSOC);
}

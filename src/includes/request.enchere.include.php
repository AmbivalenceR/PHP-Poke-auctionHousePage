<?php

include __DIR__ . "/../classes/enchere.classe.php";
include __DIR__ . "/annonce-unique.include.php";
require __DIR__ . "/db.php";



if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $prix_offert = $_POST["prix_offert"];
    $id_utilisateur = $_SESSION["id_utilisateur"];
    $id_annonce = $_SESSION["id_annonce"];
    $id_prenom = $_SESSION["id_prenom"];

    // $enchere = new Enchere($prix_offert, $id_utilisateur, $id_annonce);
    // $resultatEnchere = $enchere->requeteEnchere();

    $query = $dbh->prepare("INSERT INTO encheres (`prix_offert`,`id_utilisateur`, `id_annonce`, `id_prenom`) VALUES (?,?,?,?);");

    //Exécution de la requête
    $result = $query->execute([$prix_offert, $id_utilisateur, $id_annonce, $id_prenom]);
    $enchere = $query->fetchAll(PDO::FETCH_ASSOC);

    $query = $dbh->prepare("SELECT * FROM encheres WHERE id_annonce=?;");

    // Exécution de la requête //
    $query->execute([$_SESSION["id_annonce"]]);

    $enchererino = $query->fetchAll(PDO::FETCH_ASSOC);
}

<?php
include __DIR__ . "/../classes/enchere.classe.php";

require_once __DIR__ . "/db.php";

use Enchere\Enchere;



if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $prix_offert = $_POST["prix_offert"];
    $id_utilisateur = $_SESSION["id"];
    $id_annonce = $_SESSION["idAnonnce"];

    $enchere = new Enchere($prix_offert, $id_utilisateur, $id_annonce);
    $resultatEnchere = $enchere->requeteEnchere();
}

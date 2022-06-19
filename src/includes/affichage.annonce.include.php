<?php
// Require du fichier PHP relatif aux annonces publiées
require_once __DIR__ . "/request.annonce.include.php";

function afficherAnnonce()
{ ?>

    <h2 class="nomPokemon"><?= $annonce["nom_pokemon"] ?></h2>
    <p> Type : <?= $annonce["type"] ?> </p>
    <p> PV : <?= $annonce["pv"] ?> </p>
    <p> Description du Pokemon : <?= $annonce["description"] ?></p>
    <p> Rareté de la carte : <?= $annonce["rarete"] ?></p>
    <p> Numero de série de la carte : <?= $annonce["n_serie"] ?></p>
    <p> État de la carte : <?= $annonce["condition"] ?></p>
    <p> Prix de départ de enchères : <?= $annonce["prix_depart"] ?></p>
    <p> Prix actuel : <?= $annonce["prix_actuel"] ?></p>
    <p> Date : <?= $annonce["date_annonce"] ?></p>
    <p> Date de fin des enchères : <?= $annonce["date_de_fin"] ?></p>
    <p> Dernière enchère : X</p>
    <p> ID annonce : <?= $annonce["id_annonce"] ?></p>
    <p> ID utilisateur : <?= $annonce["id_utilisateur"] ?></p>
    <form action="annonce-unique.php" method="GET">
        <button type="submit" name="annonce" value="<?= $annonce["id_annonce"]; ?>">Voir l'annonce</button>
    </form>

<?php } ?>
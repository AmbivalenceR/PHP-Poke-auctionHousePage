<?php
include __DIR__ . "/includes/bandeau.includes.php";
include __DIR__ . "/includes/annonce-unique.include.php";
?>


<!DOCTYPE html>

<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>PHP</title>
</head>

<body>
    <header>
        <?php afficherBandeau(); ?>
    </header>
    <main>
        <?php if (isset($annonceSelectionne)) {
            foreach ($annonceSelectionne as $index => $annonce) { ?>

                <h2 class="nomPokemon"><?= $annonce["nom"] ?></h2>
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
                <p> ID annonce : <?= $annonce["id"] ?></p>
                <p> ID utilisateur : <?= $annonce["id_utilisateur"] ?></p>

        <?php }
        } ?>
    </main>
</body>

</html>
<?php
include __DIR__ . "/includes/request.annonce.include.php";
include __DIR__ . "/includes/bandeau.includes.php";


?>
<!DOCTYPE html>

<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>PHP : Poké'auction House Page</title>
</head>

<body>
    <header>

        <?php afficherBandeau();

        ?>

    </header>
    <main>
        <?php if (isset($annonces)) {
            foreach ($annonces as $index => $annonce) { ?>

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
                <form action="annonce-unique.php" method="GET">
                    <button type="submit" name="annonce" value="<?= $annonce["id"]; ?>">Voir l'annonce</button>
                </form>

        <?php }
        }

        ?>
    </main>


</body>

</html>
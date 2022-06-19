<?php
include __DIR__ . "/includes/bandeau.includes.php";
include __DIR__ . "/includes/annonce-unique.include.php";
include __DIR__ . "/includes/request.enchere.include.php";
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
        }
        ?>

        <?php if (date("Y-m-d H:i:s") <= $annonce["date_de_fin"]) { ?>

            <form action="annonce-unique.php" method="post">
                <div>
                    <label>prix offert :</label>
                    <input class="" type="number" name="prix_offert" placeholder="€" />
                </div>
            </form>

        <?php } ?>

        <!-- Insert du prix de l'enchere -->
        <?php if ($annonce["prix_actuel"] < $_POST["prix_offert"]) {
            $query = $dbh->prepare("INSERT INTO encheres (`prix_offert`,`id_utilisateur`, `id_annonce`) VALUES (?,?,?);");

            //Exécution de la requête
            $result = $query->execute([$prix_offert, $id_utilisateur, $id_annonce]);
            $enchere = $query->fetchAll(PDO::FETCH_ASSOC);
        } ?>




        <!-- Affichage de l'enchere sur l'annonce -->
        <?php if ($annonce["prix_actuel"] < $_POST["prix_offert"]) {
            foreach ($affichageEnchere as $index => $enchere) { ?>

                <p> Prix offert : <?= $enchere["prix_offert"] ?> €</p>
                <p> De <?= $enchere["id_utilisateur"] ?></p>
            <?php }
        } else if ($annonce["prix_actuel"] > $_POST["prix_offert"]) {
            echo "Votre enchère doit etre supérieur au prix actuel";
            ?> <?php
            } else { ?>
            <p>Saississez un montant supérieur à <?= $annonce["prix_actuel"] ?> </p>
        <?php } ?>



        <!-- Update de l'enchere dans la bdd annonce -->
        <?php if ($annonce["prix_actuel"] < $_POST["prix_offert"]) {
            $query = $dbh->prepare("UPDATE annonces SET`prix_actuel`= ? WHERE id=?;");

            //Exécution de la requête
            $result = $query->execute([$prix_offert, $id_annonce]);
            $nouveauprix = $query->fetchAll(PDO::FETCH_ASSOC);
        }
        ?>
    </main>
</body>

</html>
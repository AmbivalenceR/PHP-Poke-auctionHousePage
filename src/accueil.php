<?php
// Include du fichier PHP du bandeau de navigation
include __DIR__ . "/includes/bandeau.includes.php";

// Require du fichier PHP relatif aux annonces publiées
require_once __DIR__ . "/includes/request.annonce.include.php";

?>


<!DOCTYPE html>

<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>PHP : Poké'auction House Page</title>
    <!-- FONT -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
    <!--CSS-->
    <link rel="stylesheet" type="text/css" href="/css/style.css" />
</head>

<body>

    <header>
        <!-- Affichage de la navigation -->

        <?php afficherBandeau(); ?>

    </header>
    <main>
        <h1>Nos annonces</h1>
        <!-- Boutons de filtres des annonces -->

        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="get" class="filtrerPar">
            <button class="bouton" type="submit" name="filtre" value="toutes">Toutes les annonces</button>
            <button class="bouton" type="submit" name="filtre" value="cours">Annonces en cours</button>
            <button class="bouton" type="submit" name="filtre" value="terminees">Annonces terminées</button>
        </form>

        <!-- Début fonction du filtre -->

        <?php
        if (!empty($_GET['filtre'])) {
            $filtre = $_GET['filtre'];
        }
        // choix par défaut
        else {
            $filtre = "toutes";
        }

        // Fin fonction du filtre 


        // Affichage par défaut de toutes les annonces

        if ($filtre == "toutes") {
        ?>

            <section>
                <?php if (isset($annonces)) {
                    foreach ($annonces as $index => $annonce) { ?>
                        <article id="annonce">
                            <div class="image">
                                <img src=" /img/cartePoke.jpeg" alt="carte pokemon" style="width: 100%;">
                            </div>
                            <div style="width: 73%; padding: 2% 0% 0% 4%;">
                                <h2><?= $annonce["nom_pokemon"] ?></h2>
                                <div style="display: flex;">
                                    <div class="aPropos">

                                        <p> Type : <?= $annonce["type"] ?> </p>
                                        <p> PV : <?= $annonce["pv"] ?> </p>
                                    </div>
                                    <div class="aPropos">
                                        <p> Série n° : <?= $annonce["n_serie"] ?></p>
                                        <p> Rareté : <?= $annonce["rarete"] ?></p>
                                        <p> État : <?= $annonce["condition"] ?></p>
                                    </div>
                                    <div class="aPropos">
                                        <p> Fin de l'enchère : <?= $annonce["date_de_fin"] ?></p>
                                        <p> Vendu par : <?= $annonce["id_utilisateur"] ?></p>
                                        <p> Dernière enchère : <?= $annonce["prix_actuel"] ?></p>
                                        <p> Encherisseur : X</p>
                                        <form action="annonce-unique.php" method="GET">
                                            <button class="bouton" type="submit" name="annonce" value="<?= $annonce["id_annonce"]; ?>">Voir l'annonce</button>
                                        </form>
                                    </div>
                                </div>
                            </div>

                        </article>

                <?php }
                } ?>
            </section>
        <?php }

        //
        // Affichage des annonces en cours
        //

        else if ($filtre == "cours") { ?>
            <section>
                <?php if (isset($annonces)) {
                    foreach ($annonces as $index => $annonce) {
                        if (date("Y-m-d H:i:s") <= $annonce["date_de_fin"]) {  ?>

                            <article id="annonce">
                                <div class="image">
                                    <img src=" /img/cartePoke.jpeg" alt="carte pokemon" style="width: 100%;">
                                </div>
                                <div style="width: 73%; padding: 2% 0% 0% 2%;">
                                    <h2><?= $annonce["nom_pokemon"] ?></h2>
                                    <div style="display: flex;">
                                        <div class="aPropos">

                                            <p> Type : <?= $annonce["type"] ?> </p>
                                            <p> PV : <?= $annonce["pv"] ?> </p>
                                        </div>
                                        <div class="aPropos">
                                            <p> Série n° : <?= $annonce["n_serie"] ?></p>
                                            <p> Rareté : <?= $annonce["rarete"] ?></p>
                                            <p> État : <?= $annonce["condition"] ?></p>
                                        </div>
                                        <div class="aPropos">
                                            <p> Fin de l'enchère : <?= $annonce["date_de_fin"] ?></p>
                                            <p> Vendu par : <?= $annonce["id_utilisateur"] ?></p>
                                            <p> Dernière enchère : <?= $annonce["prix_actuel"] ?></p>
                                            <p> Encherisseur : X</p>
                                            <form action="annonce-unique.php" method="GET">
                                                <button class="bouton" type="submit" name="annonce" value="<?= $annonce["id_annonce"]; ?>">Voir l'annonce</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                            </article>

                <?php }
                    }
                } ?>
            </section>
        <?php }

        //
        // Affichage des annonces terminées
        //

        else if ($filtre == "terminees") { ?>
            <section>
                <?php if (isset($annonces)) {
                    foreach ($annonces as $index => $annonce) {
                        if (date("Y-m-d H:i:s") >= $annonce["date_de_fin"]) {  ?>

                            <article id="annonce">
                                <div class="image">
                                    <img src=" /img/cartePoke.jpeg" alt="carte pokemon" style="width: 100%;">
                                </div>
                                <div style="width: 73%; padding: 2% 0% 0% 2%;">
                                    <h2><?= $annonce["nom_pokemon"] ?></h2>
                                    <div style="display: flex;">
                                        <div class="aPropos">

                                            <p> Type : <?= $annonce["type"] ?> </p>
                                            <p> PV : <?= $annonce["pv"] ?> </p>
                                        </div>
                                        <div class="aPropos">
                                            <p> Série n° : <?= $annonce["n_serie"] ?></p>
                                            <p> Rareté : <?= $annonce["rarete"] ?></p>
                                            <p> État : <?= $annonce["condition"] ?></p>
                                        </div>
                                        <div class="aPropos">
                                            <p> Fin de l'enchère : <?= $annonce["date_de_fin"] ?></p>
                                            <p> Vendu par : <?= $annonce["id_utilisateur"] ?></p>
                                            <p> Dernière enchère : <?= $annonce["prix_actuel"] ?></p>
                                            <p> Encherisseur : X</p>
                                            <form action="annonce-unique.php" method="GET">
                                                <button class="bouton" type="submit" name="annonce" value="<?= $annonce["id_annonce"]; ?>">Voir l'annonce</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                            </article>

                <?php }
                    }
                } ?>
            </section>
        <?php } ?>

        <!-- Fin affichage conditionnel -->

    </main>

    <footer>
        <img id="sachaEtPika" src="/img/sachaEtPika.png" alt="Sacha et Pikachu">
    </footer>

</body>

</html>
<?php
// Include du fichier PHP du bandeau de navigation
include __DIR__ . "/includes/bandeau.includes.php";
include __DIR__ . "/includes/request.connexion.include.php";
include __DIR__ . "/includes/profil.annonce.include.php";
include_once __DIR__ . "/includes/modif_form.include.php";
include_once __DIR__ . "/includes/request.modif-suppr-profil.include.php";

// Traitement de la requête en GET pour la modification / suppresion du profil

$modifier_supprimer = null;
if (isset($_GET["modifier_supprimer"])) {
    $modifier_supprimer = $_GET["modifier_supprimer"];
}

// Require du fichier PHP relatif au formulaire de connexion
require_once __DIR__ . "/includes/request.connexion.include.php";

// Require du fichier PHP de recupération des annonces dans la bdd filtrées par id_utilisateur
require_once __DIR__ . "/includes/profil.annonce.include.php";

require_once __DIR__ . "/includes/validation.request.include.php";
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8" />

    <title>Profil</title>
    <!-- FONT -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
    <!--CSS-->
    <link rel="stylesheet" type="text/css" href="css/style.css" />
</head>

<body>
    <header>

        <!-- Affichage de la navigation -->

        <?php afficherBandeau(); ?>

    </header>
    <main>
        <!-- Condition d'être connecté -->

        <?php if (isset($_SESSION["id_utilisateur"])) { ?>

            <h1> Bienvenue sur votre espace personnel <?= $_SESSION["prenom"] ?>. <br> Vous êtes le dresseur n° <?= $_SESSION["id_utilisateur"] ?> .</h2>


                <!-- Boutons de filtres des annonces -->

                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="get">
                    <button class="bouton" type="submit" name="filtre" value="publiees">Publiées</button>
                    <button class="bouton" type="submit" name="filtre" value="suivies">Suivies</button>
                    <button class="bouton" type="submit" name="filtre" value="remportees">Remportées</button>
                </form>

                <!-- Début fonction du filtre -->

                <?php
                if (!empty($_GET['filtre'])) {
                    $filtre = $_GET['filtre'];
                }
                // choix par défaut
                else {
                    $filtre = "publiees";
                } ?>
                <!-- Fin fonction du filtre  -->


                <?php

                // Annonces postées

                if ($filtre == "publiees") { ?>
                    <section>
                        <?php if (isset($annoncesPublieesParId_utilisateur)) {

                            // Affichage par défaut des annonces publiées

                            foreach ($annoncesPublieesParId_utilisateur as $index => $annonce) { ?>

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
                        } ?>
                    </section>
                <?php
                }

                // Annonces suivies

                else if ($filtre == "suivies") { ?>
                    <section>
                        <?php if (isset($annoncesSuiviesParId_utilisateur)) {

                            // Affichage par défaut des annonces publiées

                            foreach ($annoncesSuiviesParId_utilisateur as $index => $annonce) {
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
                <?php
                }

                // Annonces Remportées

                else if ($filtre == "remportees") { ?>
                    <section>
                        <?php if (isset($annoncesRemporteesParId_utilisateur)) {

                            // Affichage par défaut des annonces publiées

                            foreach ($annoncesRemporteesParId_utilisateur as $index => $annonce) {
                                if (date("Y-m-d H:i:s") >= $annonce["date_de_fin"]) { ?>

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
                <?php
                }
            }

            // Sinon demande de connexion 
            else { ?>
                <p>connectez-vous</p>
            <?php } ?>

    </main>

    <footer>
        <img id="sachaEtPika" src="/img/sachaEtPika.png" alt="Sacha et Pikachu">
    </footer>
</body>

</html>
<?php

session_start();

/**
 * BANDEAU SUPERIEUR DU SITE
 */

function afficherBandeau()
{
    // COMMENT VERIFIER QUE L'UTILISATEUR EST BIEN CONNECTE  -> ok grâce à session_start()

?>

    <!--     <nav>
        <a href="accueil.php">Accueil</a>
        <a href="creation-annonce.php">Création annonce</a>
        <a href="annonce-unique.php">Annonce unique</a>
        <a href="profil.php">Profil</a>
    </nav>
    <section id="devNav">
        <form action="connexion-inscription.php" method="POST">
            <input type="submit" value="Connexion">
        </form>
    </section> -->


    <!-- BANDEAU SUPERIEUR DU SITE -->

    <nav id="bandeauSup">
        <div class="logoBandeau">
            <button><a href="accueil.php"> Accueil </a></button>
        </div>
        <div>

            <button><a href=<?php if (!$_SESSION["id"]) echo 'connexion-inscription.php';
                            else  echo 'creation-annonce.php' ?>> Vendre </a></button>
            <?php if (!$_SESSION["id"]) echo '<button><a href="connexion-inscription.php"> Connexion/Inscription </a></button>' ?>
            <?php if ($_SESSION["id"]) echo '<button><a href="profil.php"> Mon profil </a></button>' ?>
            <?php if ($_SESSION["id"]) echo '<button><a href=""> Mon historique </a></button>' ?>
            <?php if ($_SESSION["id"]) echo '
            <form action="accueil.php" method="POST">
                  <button name="deconnexion" value="true"> Déconnexion </button>
            </form>
            ' ?>


        </div>
    </nav>


<?php
}

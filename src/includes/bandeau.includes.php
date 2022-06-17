<?php

session_start();


/**
 * BANDEAU SUPERIEUR DU SITE
 */

function afficherBandeau()
{
    // COMMENT VERIFIER QUE L'UTILISATEUR EST BIEN CONNECTE  -> ok grâce à session_start()

?>
    <!-- BANDEAU SUPERIEUR DU SITE -->

    <nav id="bandeauSup">
        <div id="logoBandeau">
            <button><a href="accueil.php"> Accueil </a></button>
        </div>
        <div id="bandeauPartieDroite">

            <button><a href=<?php if (!isset($_SESSION["id_utilisateur"])) echo 'connexion-inscription.php';
                            else  echo 'creation-annonce.php' ?>> Vendre </a></button>
            <?php if (!isset($_SESSION["id_utilisateur"])) echo '<button><a href="connexion-inscription.php"> Connexion/Inscription </a></button>' ?>
            <?php if (isset($_SESSION["id_utilisateur"])) echo '<button><a href="profil.php"> Mon profil </a></button>' ?>
            <?php if (isset($_SESSION["id_utilisateur"])) echo '<button><a href=""> Mon historique </a></button>' ?>
            <?php if (isset($_SESSION["id_utilisateur"])) echo '<button><a href="deconnexion.php"> Déconnexion </a></button>' ?>

        </div>
    </nav>


<?php
}

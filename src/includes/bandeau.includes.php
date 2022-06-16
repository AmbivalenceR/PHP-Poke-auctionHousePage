<?php

session_start();

/**
 * BANDEAU SUPERIEUR DU SITE
 */

function afficherBandeau()
{
    // COMMENT VERIFIER QUE L'UTILISATEUR EST BIEN CONNECTE ?

?>
    <nav id="bandeauSup">
        <div class="logoBandeau"></div>
        <div>
            <button><a href=""> Accueil </a></button>
            <button><a href=""> Vendre </a></button>
            <?php if (!$_SESSION["id"]) echo '<button><a href=""> Connexion/Inscription </a></button>' ?>
            <?php if ($_SESSION["id"]) echo '<button><a href=""> Mon profil </a></button>' ?>
            <?php if ($_SESSION["id"]) echo '<button><a href=""> Mon historique </a></button>' ?>
        </div>
    </nav>


<?php
}

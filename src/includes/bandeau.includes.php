<?php

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
            <a href="">Accueil</a>
            <a href="">Vendre</a>
            <?php if (!$estConnecte) echo '<a href="">Connexion/Inscription </a>' ?>
            <?php if ($estConnecte) echo '<a href="">Mon profil </a>' ?>
            <?php if ($estConnecte) echo '<a href="">Mon historique </a>' ?>
        </div>
    </nav>


<?php
}

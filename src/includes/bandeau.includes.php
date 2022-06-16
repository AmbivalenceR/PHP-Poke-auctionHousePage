<?php

session_start();

/**
 * BANDEAU SUPERIEUR DU SITE
 */

function afficherBandeau()
{
    // COMMENT VERIFIER QUE L'UTILISATEUR EST BIEN CONNECTE ?

?>

    <nav>
        <a href="accueil.php">Accueil</a>
        <a href="creation-annonce.php">Création annonce</a>
        <a href="annonce-unique.php">Annonce unique</a>
        <a href="profil.php">Profil</a>
    </nav>
    <section id="devNav">
        <form action="connexion-inscription.php" method="POST">
            <input type="submit" value="Connexion">
        </form>
    </section>



<?php
}

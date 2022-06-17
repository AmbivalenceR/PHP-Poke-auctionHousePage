<?php
require __DIR__ . "/includes/inscription_form.php";
include __DIR__ . "/includes/bandeau.includes.php";


/* Traitement de la requête */


$category_type = null;
if (isset($_GET["category_type"])) {
    $category_type = $_GET["category_type"];
}

?>


<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Inscription / Connexion</title>
</head>

<body>
    <header>
        <?php afficherBandeau(); ?>
    </header>
    <main>
        <h1>Inscription / Connexion</h1>

        <!-- Formulaire de choix de type d'utilisateur -->
        <form action="connexion-inscription.php" method="GET">

            <input type="submit" name="category_type" value="Inscription"></option>
            <input type="submit" name="category_type" value="Connexion"></option>

        </form>

        <!-- Foirmulaire d'inscription -->
        <?php if ($category_type != null) {
            affichage_form_inscription($category_type);
        } ?>






    </main>

</body>

</html>
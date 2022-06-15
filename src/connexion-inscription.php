<?php
require __DIR__ . "/includes/inscription_form.php";

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
    <main>
        <h1>Inscription / Connexion</h1>

        <!-- Formulaire de choix de type d'utilisateur -->
        <p>???</p>
        <form action="index.php" method="GET">
            <select name="category_type">
                <option value="Choisir" <?php if ($category_type == "Choisir") echo "selected"; ?>>Choisir</option>
                <option value="Inscription" <?php if ($category_type == "Inscription") echo "selected"; ?>>Inscription</option>
                <option value="Connexion" <?php if ($category_type == "Connexion") echo "selected"; ?>>Connexion</option>
            </select>

            <input type="submit" value="Choisir" />
        </form>

        <!-- Foirmulaire d'inscription -->
        <?php if ($category_type != null) {
            // show_registration_form($category_type);
        } ?>



    </main>

</body>

</html>
<?php
include __DIR__ . "/includes/bandeau.includes.php";

?>


<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8" />

    <title>Profil</title>
    <!--FONTS-->

    <!--CSS-->
    <link rel="stylesheet" type="text/css" href="css/style.css" />
</head>

<body>
    <header>
        <?php afficherBandeau(); ?>
    </header>
    <main>
        <h2>PAGE DU PROFIL <?= $_SESSION["prenom"] ?></h2>

    </main>
    <footer></footer>
</body>

</html>
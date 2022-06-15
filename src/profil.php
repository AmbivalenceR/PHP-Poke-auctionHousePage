<?php

include __DIR__ . "/accueil.php";
include __DIR__ . "/includes/request.annonce.include.php";

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Mes annonces</title>
    <!--FONTS-->

    <!--CSS-->
    <link rel="stylesheet" type="text/css" href="css/style.css" />
</head>

<body>
    <header></header>
    <main>
        <?= $annonceCree->afficherAnnonce(); ?>
    </main>
    <footer></footer>
</body>

</html>
<?php
include __DIR__ . "/includes/bandeau.includes.php";
$_SESSION["idAnnonce"] = $_GET["annonce"];
var_dump($_SESSION["idAnnonce"]);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">

    <title>Document</title>
</head>

<body>
    <header>
        <?php afficherBandeau(); ?>
    </header>
    <main>

    </main>
</body>

</html>
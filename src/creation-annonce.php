<?php
include __DIR__ . "/includes/request.annonce.include.php";
include __DIR__ . "/includes/bandeau.includes.php";



?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Créer une annonce</title>
    <!--FONTS-->

    <!--CSS-->
    <link rel="stylesheet" type="text/css" href="css/style.css" />
</head>

<body>
    <header>
        <?php afficherBandeau(); ?>
    </header>
    <main>
        <form action="accueil.php" method="post">
            <div>
                <label for="nomPokemon">Nom du Pokémon : </label>
                <input type="text" name="nomPokemon" id="nomPokemon">
            </div>
            <div>
                <label for="typePokemon">type du Pokémon : </label>
                <input type="text" name="typePokemon" id="typePokemon">
            </div>
            <div>
                <label for="pvPokemon">PV du Pokémon : </label>
                <input type="number" name="pvPokemon" id="pvPokemon">
            </div>
            <div>
                <label for="descriptionPokemon">Description du Pokémon : </label>
                <input type="text" name="descriptionPokemon" id="descriptionPokemon">
            </div>
            <div>
                <label for="rareteCarte">Rareté de la carte : </label>
                <select name="rareteCarte" id="rareteCarte">
                    <option value="commune">Commune</option>
                    <option value="peuCommune">Peu commune</option>
                    <option value="rare">Rare</option>
                    <option value="tresRare">Très rare</option>
                </select>
            </div>
            <div>
                <label for="numeroSerieCarte">Numéro de série de la carte : </label>
                <input type="text" name="numeroSerieCarte" id="numeroSerieCarte">
            </div>
            <div>
                <label for="conditionCarte">État de la carte : </label>
                <select name="conditionCarte" id="conditionCarte">
                    <option value="commune">Bon état</option>
                    <option value="peuCommune">Très bon état</option>
                    <option value="rare">Parfait état</option>
                </select>
            </div>
            <div>
                <label for="prixDepart">Prix de départ des enchères : </label>
                <input type="number" name="prixDepart" id="prixDepart">
            </div>
            <div>
                <label for="dateFinEncheres">Date de fin des enchères : </label>
                <input type="text" name="dateFinEncheres" id="dateFinEncheres">
            </div>
            <input type="hidden" name="date" value="<?= date('Y-m-d'); ?>">
            <input type="submit" value="Poster l'annonce">
        </form>

    </main>
    <footer></footer>
</body>

</html>
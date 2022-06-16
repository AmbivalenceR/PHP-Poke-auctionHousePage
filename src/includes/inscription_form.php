<?php

/**
 * Affichage du formulaire d'inscription / Connexion Utilisateur
 */
function  affichage_form_inscription(string $category_type)
{ ?>
    <h2>
        <?php
        switch ($category_type) {
            case "Inscription":
                echo "Inscription";
                break;
            case "Connexion":
                echo "Connexion";
                break;
            default:
                echo "Veulliez sélectionner une catégorie";
        }
        ?>
    </h2>
    <form action="inscription.php" method="post">

        <?php if ($category_type == "Inscription") { ?>

            <div>
                <label>Prénom :</label>
                <input class="" type="text" name="prenom" placeholder="Prenom" />
            </div>

            <div>
                <label>Nom :</label>
                <input class="" type="text" name="nom" placeholder="nom" />
            </div>

            <div>
                <label>Email :</label>
                <input type="email" name="email" placeholder="email">
            </div>

            <div>
                <label>Mot de passe:</label>
                <input type="password" name="mdp" placeholder="mdp">
            </div>

            <div>
                <label>Age:</label>
                <input type="text" name="age" placeholder="age">
            </div>

            <input type="submit" value="S'inscrire" />

        <?php } ?>

        <?php if ($category_type == "Connexion") { ?>

            <div>
                <label>Email :</label>
                <input type="email" name="email" placeholder="email">
            </div>

            <div>
                <label>Mot de passe:</label>
                <input type="password" name="mdp" placeholder="mdp">
            </div>

            <input type="submit" value="Se connecter" />

        <?php } ?>

        <input type="hidden" name="category_type" value="<?= $category_type ?>" />


    </form>
<?php }

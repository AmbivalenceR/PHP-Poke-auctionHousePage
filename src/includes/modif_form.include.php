<?php

/**
 * Affichage du formulaire d'inscription / Connexion Utilisateur
 */
function afficherModifForm(string $modifier_supprimer)
{ ?>


    <h2>
        <?php
        switch ($modifier_supprimer) {
            case "Modifier":
                echo "Modifier";
                break;
            case "Supprimer":
                echo "Supprimer";
                break;
            default:
                echo "Souhaitez vous modifier ou supprimer votre profil de FDP ?";
        }
        ?>
    </h2>
    <!-- Formulaire de modification, récupéré de celui de création -->
    <form action="profil.php" method="POST">

        <?php if ($modifier_supprimer == "Modifier") { ?>

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
                <label>Mot de passe :</label>
                <input type="password" name="mdp" placeholder="mdp">
            </div>

            <div>
                <label>Age :</label>
                <input type="text" name="age" placeholder="age">
            </div>

            <input type="submit" value="Modifier" />

        <?php } ?>

        <!-- Demande de validation de suppression du profil -->
        <?php if ($modifier_supprimer == "Supprimer") { ?>

            <div>
                <label>Souhaitez-vous réellement supprimer votre profil de FDP sur PHP ?</label>
                <select name="validerSuppression" id="validerSuppression">
                    <option value="non">NON, je suis un vrai Fan De Pokémon.</option>
                    <option value="oui">OUI, je suis Fan d'autre chose maintenant.</option>
                </select>
                <input type="submit" value="Supprimer">

            <?php } ?>

            <input type="hidden" name="modifier_supprimer" value="<?= $modifier_supprimer ?>" />


    </form>
<?php }

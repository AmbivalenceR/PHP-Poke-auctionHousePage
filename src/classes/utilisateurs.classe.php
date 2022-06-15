<?php

namespace Utilisateurs;

// Création de la classe utilisateus

class Utilisateurs
{
    // Propriétés
    protected int $id;
    protected string $prenom;
    protected string $nom;
    protected string $email;
    protected string $mdp;
    protected int $age;

    // Constructeur
    public function __construct(int $id, string $prenom, string $nom, string $email, string $mdp, int $age)
    {
        $this->id = $id;
        $this->prenom = $prenom;
        $this->nom = $nom;
        $this->email = $email;
        $this->mdp = $mdp;
        $this->age = $age;
    }

    // Methode pour affichage de l'utilisateur
    public function afficherUtilisateur(): void
    {
?>
        <div class="divUtilisateur">
            <h2 class="nomUtilisateur"><?= $this->prenom . " " . $this->nom ?></h2>
            <p> identifiant : <?= $this->id ?> </p>
            <p> email : <?= $this->email ?> </p>
            <p> age : <?= $this->age ?></p>
        </div>
<?php
    }
}

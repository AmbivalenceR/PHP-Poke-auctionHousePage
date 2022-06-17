<?php

namespace Utilisateurs;



// Création de la classe utilisateus

class Utilisateurs
{
    // Propriétés
    protected string $prenom;
    protected string $nom;
    protected string $email;
    protected string $mdp;
    protected int $age;

    // Constructeur
    public function __construct(string $prenom, string $nom, string $email, string $mdp, int $age)
    {
        $this->prenom = $prenom;
        $this->nom = $nom;
        $this->email = $email;
        $this->mdp = $mdp;
        $this->age = $age;
    }

    // Enregistrement de l'objet utilisateur dans la base de données

    public function inscriptionUtilisateur(): int
    {
        global $dbh;
        $query = $dbh->prepare("INSERT INTO utilisateurs (nom, prenom, email, mdp, age) VALUES (?, ?, ?, ?, ?);");
        return $query->execute([$this->nom, $this->prenom, $this->email, $this->mdp, $this->age]);
    }

    /* Méthode statique de récupération d'un utilisateur dans la base de données
      par son email. Cette méthode retourne une instance la classe User */

    public static function connecterUtilisateur(string $email, string $mdp): bool
    {
        global $dbh;
        $query = $dbh->prepare("SELECT * FROM utilisateurs WHERE email = ?");
        $query->execute([$email]);
        $donneesUtilisateur = $query->fetch(\PDO::FETCH_ASSOC);

        if ($donneesUtilisateur != false && password_verify($mdp, $donneesUtilisateur["mdp"])) {
            // $utilisateur = new Utilisateurs($donneesUtilisateur["nom"], $donneesUtilisateur["prenom"], $donneesUtilisateur["email"], $donneesUtilisateur["mdp"], $donneesUtilisateur["age"]);
            // mise en mémoire des informations de l'utilisateur pour la session
            $_SESSION["id_utilisateur"] = $donneesUtilisateur["id"];
            $_SESSION["prenom"] = $donneesUtilisateur["prenom"];
            // echo "Bienvenue, " . $_SESSION["prenom"];
            return true;
        } else {
            echo "Echec de connexion : email ou mot de passe incorrect.";
            return false;
        }
    }

    // Methode pour affichage de l'utilisateur
    public function afficherUtilisateur(): void
    {
?>
        <div class="divUtilisateur">
            <h2 class="nomUtilisateur"><?= $this->prenom . " " . $this->nom ?></h2>
            <p> identifiant : <?= $_SESSION["id_utilisateur"] ?> </p>
            <p> email : <?= $this->email ?> </p>
            <p> age : <?= $this->age ?> </p>
        </div>
<?php
    }
}

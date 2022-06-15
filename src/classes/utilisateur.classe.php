CREATE TABLE `utilisateurs` (
`id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
`prenom` varchar(255) NOT NULL,
`nom` varchar(255) NOT NULL,
`email` varchar(255) NOT NULL UNIQUE,
`mdp` varchar(255) NOT NULL,
`age` int(3) NOT NULL

<?php

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
        
    }
}

<?php

namespace Enchere;

// Création de la classe utilisateus

class Enchere
{
    // Propriétés

    protected float $prix_offert;
    protected int $id_utilisateur;
    protected int $id_annonce;


    // Constructeur
    public function __construct(float $prix_offert, int $id_utilisateur, int $id_annonce)
    {

        $this->prix_offert = $prix_offert;
        $this->id_utilisateur = $id_utilisateur;
        $this->id_annonce = $id_annonce;
    }


    // Enregistrement de l'objet utilisateur dans la base de données

    // public function requeteEnchere()
    // {
    //     global $dbh;
    //     $query = $dbh->prepare("INSERT INTO encheres (`prix_offert`,`id`, `idAnonnce`) VALUES (?,?,?);");
    //     return $query->execute([$this->prix_offert, $this->id,  $this->idAnonnce]);
    //     // return $query->fetchAll(PDO::FETCH_ASSOC);

    // }




    // Methode pour affichage de l'annonce
    public function afficherEnchere(): void
    {
?>
        <div class="">
            <p> Prix offert : <?= $this->prix_offert ?> €</p>
            <p> De <?= $this->id_utilisateur ?>. </p>


        </div>
<?php

    }
}

<?php

namespace Annonce;

// Création de la classe Annonce

class Annonce
{
    // Propriétés
    protected int $id;
    protected float $prixDepart;
    protected string $date;
    protected string $dateFinEncheres;
    protected string $nomPokemon;
    protected int $pvPokemon;
    protected string $typePokemon;
    protected string $conditionCarte;
    protected string $rareteCarte;
    protected int $numeroSerieCarte;
    protected string $descriptionPokemon;
    protected int $id_utilisateur;


    // Constructeur
    public function __construct(float $prixDepart, string $date, string $dateFinEncheres, string $nomPokemon, int $pvPokemon, string $typePokemon, string $conditionCarte, string $rareteCarte, int $numeroSerieCarte, string $descriptionPokemon, int $id_utilisateur)
    {

        $this->prixDepart = $prixDepart;
        $this->date = $date;
        $this->dateFinEncheres = $dateFinEncheres;
        $this->nomPokemon = $nomPokemon;
        $this->pvPokemon = $pvPokemon;
        $this->typePokemon = $typePokemon;
        $this->conditionCarte = $conditionCarte;
        $this->rareteCarte = $rareteCarte;
        $this->numeroSerieCarte = $numeroSerieCarte;
        $this->descriptionPokemon = $descriptionPokemon;
        $this->id_utilisateur = $id_utilisateur;
    }

    // Methode pour affichage de l'annonce
    public function afficherAnnonce(): void
    {

?>
        <div class="divAnnonce">
            <h2 class="nomPokemon"><?= $this->nomPokemon ?></h2>
            <p> Type : <?= $this->typePokemon ?> </p>
            <p> PV : <?= $this->pvPokemon ?> </p>
            <p> Description du Pokemon : <?= $this->descriptionPokemon ?></p>
            <p> Rareté de la carte : <?= $this->rareteCarte ?></p>
            <p> Numero de série de la carte : <?= $this->numeroSerieCarte ?></p>
            <p> État de la carte : <?= $this->conditionCarte ?></p>
            <p> Prix de départ de enchères : <?= $this->prixDepart ?></p>
            <p> Date : <?= $this->date ?></p>
            <p> Date de fin des enchères : <?= $this->dateFinEncheres ?></p>
            <p> Dernière enchère : X</p>
            <p> ID annonce : <?= $this->id ?></p>
            <p> ID utilisateur : <?= $this->id_utilisateur ?></p>
        </div>
<?php

    }
}

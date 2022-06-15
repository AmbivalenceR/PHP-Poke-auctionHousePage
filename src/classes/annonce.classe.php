<?php

namespace Annonce;

// Création de la classe Annonce

class Annonce
{
    // Propriétés
    protected string $nomPokemon;
    protected string $typePokemon;
    protected int $pvPokemon;
    protected string $descriptionPokemon;
    protected string $rareteCarte;
    protected int $numeroSerieCarte;
    protected string $conditionCarte;
    protected float $prixDepart;
    protected string $dateFinEncheres;

    // Constructeur
    public function __construct(string $nomPokemon, string $typePokemon, int $pvPokemon, string $descriptionPokemon, string $rareteCarte, int $numeroSerieCarte, string $conditionCarte, float $prixDepart, string $dateFinEncheres)
    {
        $this->nomPokemon = $nomPokemon;
        $this->typePokemon = $typePokemon;
        $this->pvPokemon = $pvPokemon;
        $this->descriptionPokemon = $descriptionPokemon;
        $this->rareteCarte = $rareteCarte;
        $this->numeroSerieCarte = $numeroSerieCarte;
        $this->conditionCarte = $conditionCarte;
        $this->prixDepart = $prixDepart;
        $this->dateFinEncheres = $dateFinEncheres;
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
            <p> Date de fin des enchères : <?= $this->dateFinEncheres ?></p>
            <p> Dernière enchère : X</p>
        </div>
<?php

    }
}

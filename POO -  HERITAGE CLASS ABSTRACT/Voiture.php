<?php



namespace ExempleAbstract;

abstract class Voiture {
    protected $couleur = "";
    protected $longeur = "";
    protected $vitesse = "";

    public function __construct($couleur, $longeur, $vitesse) {
        $this -> couleur = $couleur;
        $this -> longeur = $longeur;
        $this -> vitesse = $vitesse;
    }

    public function setCouleur($couleur) {
        $this -> couleur = $couleur;
    }
    public function setLongeur($longeur) {
        $this -> longeur = $longeur;
    }
    public function setVitesse($vitesse) {
        $this -> vitesse = $vitesse;
    }


    public function getCouleur() {
        return $this -> couleur;
    }
    public function getLongeur() {
        return $this -> longeur;
    }
    public function getVitesse() {
        return $this -> vitesse;
    }

    public function rouler() {
        echo "Ce voiture roule avec une vitesse de ".$this -> vitesse;
    }

    abstract public function colorer();

    final public function welcome() {
        echo "Bienvenu à mes exercices!";
    }
}


?>
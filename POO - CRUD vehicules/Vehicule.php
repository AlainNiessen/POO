<?php

class Vehicule {
    private $id;
    private $marque;
    private $modele;
    private $nbPortes;
    private $vitesse;

    public function __construct($id, $marque, $modele, $nbPortes, $vitesse) {
		$this->id = $id;
		$this->marque = $marque;
		$this->modele = $modele;
		$this->nbPortes = $nbPortes;
		$this->vitesse = $vitesse;
	}

    public function setId ($id) {
        $this -> id = $id;
    }
    public function setMarque ($marque) {
        $this -> marque = $marque;
    }
    public function setModele ($modele) {
        $this -> modele = $modele;
    }
    public function setNBPortes ($nbPortes) {
        $this -> nbPortes = $nbPortes;
    }
    public function setVitesse ($vitesse) {
        $this -> vitesse = $vitesse;
    }


    public function getId () {
        return $this -> id;
    }
    public function getMarque () {
        return $this -> marque;
    }
    public function getModele () {
        return $this -> modele;
    }
    public function getNbPortes () {
        return $this -> nbPortes;
    }
    public function getVitesse () {
        return $this -> vitesse;
    }   
}

?>
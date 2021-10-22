<?php

namespace CalculForme;

include_once('forme.php');

use CalculForme\Forme;

class Rectangle extends Forme {

    //ATTRIBUTS
    protected $longueur;
    protected $largeur;

    //CONSTRUCTOR
    public function __construct (Point2D $center, $longueur, $largeur) {
        $this -> setLongueur($longueur);
        $this -> setLargeur($largeur);
        parent::__construct($center);
    }

    //SETTER
    public function setLongueur($longueur) {
        $this -> longueur = $longueur;
    }
    public function setLargeur($largeur) {
        $this -> largeur = $largeur;
    }   
    

    //GETTER
    public function getLongueur() {
        return $this -> longueur;
    }
    public function getLargeur() {
        return $this -> largeur;
    }  
    

    //fUNCTION ABSTRACT FROM PARENT
    public function surface() {
        return $this -> longueur * $this -> largeur;
    }
    public function perimetre() {
        return 2 * ($this -> longueur + $this -> largeur);
    }

    //FUNCTION STRING
    public function __toString() {

        return '<p>Rectangle: '.$this -> id.'</p>
                <p>Centre: '.$this -> center.'</p>
                <p>Largeur: '.$this -> largeur.'</p>
                <p>Longueur: '.$this -> longueur.'</p>
                <p>Surface: '.$this -> surface().'</p>
                <p>Périmétre: '.$this -> perimetre().'</p>';        
    }
}

?>
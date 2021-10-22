<?php

namespace CalculForme;

include_once('forme.php');

use CalculForme\Forme;

class Cercle extends Forme {

    //ATTRIBUTS
    protected $rayon;

    //CONSTRUCTOR
    public function __construct (Point2D $center, $rayon) {
        $this -> setRayon($rayon);
        parent::__construct($center);
    }

    //SETTER
    public function setRayon($rayon) {
        $this -> rayon = $rayon;
    }
    
    //GETTER
    public function getRayon() {
        return $this -> rayon;
    }    

    //fUNCTION ABSTRACT FROM PARENT
    public function surface() {
        return pow($this -> rayon, 2) * M_PI;
    }
    public function perimetre() {
        return 2 * $this -> rayon * M_PI;
    }

    //FUNCTION 
    public function __toString() {      

         return '<p>Cercle: '.$this -> id.'</p>
                 <p>Centre: '.$this -> center.'</p>
                 <p>Rayon: '.$this -> rayon.'</p>
                 <p>Surface: '.$this -> surface().'</p>
                 <p>Périmétre: '.$this -> perimetre().'</p>';
      
    }
}

?>
<?php

namespace CalculForme;

final class Carre extends Rectangle {
    
    //CONSTRUCTOR => PARENT = RECTANGLE, DANS UN CARRE LONGUEUR ET LARGEUR SONT EGALS => 2X COTE COMME PARAMETRES
    public function __construct (Point2D $center, $cote) {
        $this -> cote = $cote;
        parent::__construct($center, $cote, $cote);
    }

    //FUNCTION STRING
    public function __toString() { 

       return  '<p>Carré: '.$this -> id.'</p>
                <p>Centre: '.$this -> center.'</p>
                <p>Longueur: '.$this -> cote.'</p>
                <p>Surface: '.$this -> surface().'</p>
                <p>Périmétre: '.$this -> perimetre().'</p>'; 

    }    
}

?>
<?php

namespace ExempleAbstract;

//include du parent Voiture ici, car Voiture ne sera pas utilisé dans le index, mais les enfants ont besoin !
include_once("Voiture.php");

class Avion extends Voiture {
    
    public function colorer () {
        echo "Ce voiture a la couleur: ".$this -> couleur;
    }
}


?>
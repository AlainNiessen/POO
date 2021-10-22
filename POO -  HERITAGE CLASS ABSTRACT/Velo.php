<?php

namespace ExempleAbstract;

//include du parent Voiture ici, car Voiture ne sera pas utilisé dans le index, mais les enfants ont besoin !
include_once("Voiture.php");

class Velo extends Voiture {

    public function rouler() {
        echo "Ce voiture roule avec une vitesse de ".$this -> vitesse;
    }

    public function colorer () {
        echo "Ce voiture a la couleur: ".$this -> couleur;
    }
}


?>
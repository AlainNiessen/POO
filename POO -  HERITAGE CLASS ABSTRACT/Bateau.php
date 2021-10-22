<?php

namespace ExempleAbstract;

//include du parent Voiture ici, car Voiture ne sera pas utilisé dans le index, mais les enfants ont besoin !
include_once("Voiture.php");

class Bateau extends Voiture {
    
    public function colorer () {
        echo "Ce voiture a la couleur: ".$this -> couleur;
    }

    // DECLARER ICI DANS ENFANT UNE METHODE "FINAL" N'EST PAS POSSIBLE => ELLE EST DEFINIE DANS LE PARENT ET ON NE PEUT PAS FAIRE "OVERRIDE"
    // public function welcome () {
    //     echo "Ce voiture a la couleur: ".$this -> couleur;
    // }
}


?>
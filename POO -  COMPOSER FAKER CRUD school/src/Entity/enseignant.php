<?php

namespace ISL\entity;

class Enseignant extends Personne {

    //ATTRIBUTS
    protected $coursDonnes = [];
    protected $anciennete = 0;
    protected $dateEntree;

    //CONSTRUCTOR
    public function __construct($id, $nom, $prenom, $adresse, $codePostal, $pays, $coursDonnes, $anciennete, $dateEntree) {
        $this -> setCoursDonnes($coursDonnes);
        $this -> setAnciennete($anciennete);
        $this -> setDateEntree($dateEntree);
        parent::__construct($id, $nom, $prenom, $adresse, $codePostal, $pays);
    }

    //SETTER
    public function setCoursDonnes ($coursDonnes) {
        $this -> coursDonnes = $coursDonnes;
    }
    public function setAnciennete ($anciennete) {
        $this -> anciennete = $anciennete;
    }
    public function setDateEntree ($dateEntree) {
        $this -> dateEntree = $dateEntree;
    }

    //GETTER
    public function getCoursDonnes () {
        return $this -> coursDonnes;
    }
    public function getAnciennete () {
        return $this -> anciennete;
    }
    public function getDateEntree () {
        return $this -> dateEntree;
    }

    //METHODES MAGIQUES
    //1) GET AND SET FOR UNDEFINED ATTRIBUTS (CHECK)
    public function __set($name, $value) {
        echo $name.' avec la valeur ('.$value.') n\'existe pas!<br/>';
    }

    public function __get($name) {
        echo $name.' n\'existe pas!<br/>';
    }

    //2) CALL AND CALLSTATIC FOR UNDEFINED METHODES (CHECK)
    public function __call($name, $arguments) {
        echo $name . "(" . implode(', ', $arguments) . ")" . " n'existe pas<br/>";
    }

    public static function __callStatic($name, $arguments) {
        echo $name . "(" . implode(',  ', $arguments) . ")" . " n'existe pas<br/>";
    }
}


?>
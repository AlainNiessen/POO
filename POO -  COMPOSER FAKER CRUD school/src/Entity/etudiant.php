<?php

namespace ISL\Entity;

class Etudiant extends Personne {

    //ATTRIBUTS
    protected $coursSuivis = [];
    protected $niveau;
    protected $dateInscription;

    //CONSTRUCTOR
    public function __construct($id, $nom, $prenom, $adresse, $codePostal, $pays, $coursSuivis, $niveau, $dateInscription) {       
        parent::__construct($id, $nom, $prenom, $adresse, $codePostal, $pays);
        $this -> setCoursSuivis($coursSuivis);
        $this -> setNiveau($niveau);
        $this -> setDateInscription($dateInscription);        
    }

    //SETTER
    public function setCoursSuivis ($coursSuivis) {
        $this -> coursSuivis = $coursSuivis;
    }
    public function setNiveau ($niveau) {
        $this -> niveau = $niveau;
    }
    public function setDateInscription ($dateInscription) {
        $this -> dateInscription = $dateInscription;
    }

    //GETTER
    public function getCoursSuivis () {
        return $this -> coursSuivis;
    }
    public function getNiveau () {
        return $this -> niveau;
    }
    public function getDateInscription () {
        return $this -> dateInscription;
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
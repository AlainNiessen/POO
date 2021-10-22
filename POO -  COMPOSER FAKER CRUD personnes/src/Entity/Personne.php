<?php

namespace ISL\Entity;

class Personne {

    //ATTRIBUTS
    protected $id; 
    protected $nom;
    protected $prenom;
    protected $adresse;
    protected $codePostal;
    protected $pays;
    protected $societe;

    //CONSTRUCTOR
    public function __construct ($id, $nom, $prenom, $adresse, $codePostal, $pays, $societe) {
        $this -> setId($id);
        $this -> setNom($nom);
        $this -> setPrenom($prenom);
        $this -> setAdresse($adresse);
        $this -> setCodePostal($codePostal);
        $this -> setPays($pays);
        $this -> setSociete($societe);
    }
    //METHODES MAGIQUES
    //1) DESTRUCTOR (CHECK)
    // public function __destruct() {
    //     echo 'La personne '.$this -> nom.' '.$this -> prenom.'a été détruit<br/>';
    // }

    //2) GET AND SET FOR UNDEFINED ATTRIBUTS (CHECK)
    // public function __set($name, $value) {
    //     echo $name.' avec la valeur ('.$value.') n\'existe pas!<br/>';
    // }

    // public function __get($name) {
    //     echo $name.' n\'existe pas!<br/>';
    // }

    //3) CALL AND CALLSTATIC FOR UNDEFINED METHODES (CHECK)
    // public function __call($name, $arguments) {
    //     echo $name . "(" . implode(', ', $arguments) . ")" . " n'existe pas<br/>";
    // }

    // public static function __callStatic($name, $arguments) {
    //     echo $name . "(" . implode(',  ', $arguments) . ")" . " n'existe pas<br/>";
    // }

    //4) TO STRING
    // public function __toString() {
    //     return 'Je suis la personne '.$this -> nom.' '.$this -> prenom.'<br/>';
    // }



    //SETTERS
    public function setId($id) {
        $this -> id = $id;
    }
    public function setNom($nom) {
        $this -> nom = $nom;
    }
    public function setPrenom($prenom) {
        $this -> prenom = $prenom;
    }
    public function setAdresse($adresse) {
        $this -> adresse = $adresse;
    }
    public function setCodePostal($codePostal) {
        $this -> codePostal = $codePostal;
    }
    public function setPays($pays) {
        $this -> pays = $pays;
    }
    public function setSociete($societe) {
        $this -> societe = $societe;
    }

    //GETTERS
    public function getId() {
        return $this -> id;
    }
    public function getNom() {
        return $this -> nom;
    }
    public function getPrenom() {
        return $this -> prenom;
    }
    public function getAdresse() {
        return $this -> adresse;
    }
    public function getCodePostal() {
        return $this -> codePostal;
    }
    public function getPays() {
        return $this -> pays;
    }
    public function getSociete() {
        return $this -> societe;
    }
    


}


?>
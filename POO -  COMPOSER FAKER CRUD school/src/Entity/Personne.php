<?php

namespace ISL\Entity;

abstract class Personne {

    //ATTRIBUTS
    protected $id; 
    protected $nom;
    protected $prenom;
    protected $adresse;
    protected $codePostal;
    protected $pays;
   

    //CONSTRUCTOR
    public function __construct ($id, $nom, $prenom, $adresse, $codePostal, $pays) {
        $this -> setId($id);
        $this -> setNom($nom);
        $this -> setPrenom($prenom);
        $this -> setAdresse($adresse);
        $this -> setCodePostal($codePostal);
        $this -> setPays($pays);
    }   

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

    //METHODES MAGIQUES
    //1) GET AND SET FOR UNDEFINED ATTRIBUTS (CHECK)
    public function __set($name, $value) {
        echo $name.' avec la valeur ('.$value.') n\'existe pas!<br/>';
    }

    public function __get($name) {
        echo $name.' n\'existe pas!<br/>';
    }

    //3) CALL AND CALLSTATIC FOR UNDEFINED METHODES (CHECK)
    public function __call($name, $arguments) {
        echo $name . "(" . implode(', ', $arguments) . ")" . " n'existe pas<br/>";
    }

    public static function __callStatic($name, $arguments) {
        echo $name . "(" . implode(',  ', $arguments) . ")" . " n'existe pas<br/>";
    }
}


?>
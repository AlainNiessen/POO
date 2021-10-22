<?php

namespace ISL\Entity;



abstract class EntityManager {

    //ATTRIBUT
    private $connexion;

    //CONSTRUCTOR
    public function __construct ($connexion) {
        $this -> connexion = $connexion;
    }

    //SETTERS
    public function setConnexion($connexion) {
        $this -> connexion = $connexion;
    }

    //GETTERS
    public function getConnexion() {
        return $this -> connexion;
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
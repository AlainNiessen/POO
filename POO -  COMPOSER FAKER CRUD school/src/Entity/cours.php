<?php

namespace ISL\Entity;

class cours {

    //ATTRIBUTS
    protected $id;
    protected $cours;

    //CONSTRUCTOR
    public function __construct($id, $cours) {
        $this -> setId($id);
        $this -> setCours($cours);
    }

    //SETTER
    public function setId($id) {
        $this -> id = $id;
    }
    public function setCours($cours) {
        $this -> cours = strtolower($cours);
    }

    //GETTER
    public function getId() {
        return $this -> id;
    }
    public function getCours() {
        return $this -> cours;
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
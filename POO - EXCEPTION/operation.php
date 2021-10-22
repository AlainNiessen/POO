<?php

namespace CalculOperation;

abstract class Operation {
    //DECLARATION ATTRIBUTS NOMBRE1 + NOMBRE2 EN PRIVATE
    private $nombre1;
    private $nombre2;

    //CONSTRUCTOR
    public function __construct ($nombre1, $nombre2) {
        $this -> nombre1 = $nombre1;
        $this -> nombre2 = $nombre2;
    }

    //SETTER
    public function setNombre1 ($nombre1) {
        $this -> nombre1 = $nombre1;
    }
    public function setNombre2 ($nombre2) {
        $this -> nombre2 = $nombre2;
    }

    //GETTER
    public function getNombre1 () {
        return $this -> nombre1;
    }
    public function getNombre2 () {
        return $this -> nombre2;
    }

    //FUNCTION OPERATE IN ABSTRACT FOR IMPLEMENTATION IN CHILDREN
    abstract public function operate();

}




?>
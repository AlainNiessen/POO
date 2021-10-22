<?php

namespace CalculForme;

include_once('point.php');

use CalculForme\Point2D;

abstract class Forme {

    //ATTRIBUTS
    protected $id;
    protected $center;
    protected static $compteur = 0;

    //CONSTRUCTOR
    public function __construct(Point2D $center) {
        self::$compteur++;
        $this -> setCenter($center);
        $this -> setId(self::$compteur);

    }

    //SETTER
    public function setCenter(Point2D $center) {
        $this -> center = $center;
    }
    public function setId($id) {
        $this -> id = $id;
    }

    //GETTER
    public function getCenter() {
        return $this -> center;
    }
    public function getId() {
        return $this -> id;
    }

    //SURFACE => abstract
    abstract public function surface();

    //PERIMETRE => abstract
    abstract public function perimetre ();

    //BOUGER
    public function bouger ($dx, $dy) {
        return $this -> center -> bouger($dx, $dy);
    }
}

?>
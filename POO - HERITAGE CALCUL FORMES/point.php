<?php

namespace CalculForme;

class Point2D {

    //ATTRIBUTS
    protected $x;
    protected $y;

    //CONSTRUCTOR
    public function __construct($x, $y) {
        $this -> setX($x);
        $this -> setY($y);
    }

    //SETTER
    public function setX ($x) {
        $this -> x = $x;
    }
    public function setY ($y) {
        $this -> y = $y;
    }

    //GETTER
    public function getX () {
        return $this -> x;
    }
    public function getY () {
        return $this -> y;
    }

    //function toString
    public function __toString() {
        return 'Point(x='.$this -> x.', y='.$this -> y.')';
    }

    //function bouger
    public function bouger($dx, $dy) {
        //SETTING X AND Y AFTER 'BOUGER'
        $newX = $this -> x + $dx;
        $newY = $this -> y + $dy;

        $this -> setX($newX);
        $this -> setY($newY);
    }






}



?>
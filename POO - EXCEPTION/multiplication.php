<?php

namespace CalculOperation;

use InvalidArgumentException;

class Multiplication extends Operation {

    public function operate() {

        if(!is_numeric($this -> getNombre1()) || !is_numeric($this -> getNombre2())) {
            throw new InvalidArgumentException('Les deux arguments doivent être numériques');
        } 
        
        return $this -> getNombre1().' * '.$this -> getNombre2().' = '.($this -> getNombre1() * $this -> getNombre2());
    }

}



?>
<?php

namespace CalculOperation;

use Exception;
use InvalidArgumentException;

class Somme extends Operation {

    public function operate() {
        
        if(is_numeric($this -> getNombre1()) && is_numeric($this -> getNombre2())) {
            if($this -> getNombre1() + $this -> getNombre2() < 0) {
                throw new Exception('Malheureusement dans cette exercice le résultat d\'une addition doit rester positif');
            }        
        } else {
            throw new InvalidArgumentException('Les deux paramètres doivent être numériques');
        }

        return $this -> getNombre1().' + '.$this -> getNombre2().' = '.($this -> getNombre1() + $this -> getNombre2());
    }

}



?>
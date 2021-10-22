<?php

namespace CalculOperation;

class Soustraction extends Operation {

    public function operate() {

        if($this -> getNombre1() - $this -> getNombre2() < 0) {
            throw new ErrorHandler('Le résultat est négativ', 2, E_WARNING);
        }

        return $this -> getNombre1().' - '.$this -> getNombre2().' = '.($this -> getNombre1() - $this -> getNombre2());
    }
}




?>
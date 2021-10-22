<?php

namespace CalculOperation;

include_once('exceptDivision.php');

use ExceptDivision;

class Division extends Operation {

    public function operate () {
        if($this -> getNombre2() === 0) {
            throw new ExceptDivision('Vous ne pouvez pas diviser par 0');
        }

        return $this -> getNombre1().' / '.$this -> getNombre2().' = '.$this -> getNombre1() / $this -> getNombre2();
    }
}

?>
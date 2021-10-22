<?php

//THIS CLASS EXTENDS CLASS EXCEPTION AND DISPLAY ERROR MESSAGE VIA __toString METHOD
class ExceptDivision extends Exception {
    
    public function __toString() {
        return 'Display error message via type ExceptDivision (Type of Exception) and __toString method: <br/><br/>
                Code: '.$this -> getCode().'<br/>
                File: '.$this -> getFile().'<br/>
                Line: '.$this -> getLine().'<br/>
                Message: '.$this -> getMessage().'<br/>
                Previous: '.$this -> getPrevious().'<br/>
                Trace: '.$this -> getTraceAsString().'<br/>';
    }

}

?>
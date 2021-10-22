<?php


namespace CalculOperation;

use ErrorException;

class ErrorHandler extends ErrorException {

    public function __toString() {

        switch ($this -> getSeverity()) {

            case E_ERROR:
                $gravity = "Erreur";
                break;

            case E_WARNING:
                $gravity = "Avertissement";
                break;

            case E_NOTICE:
                $gravity = "Information";
                break;

            default:
                $gravity = "Erreur inconnue";
                break;
        }

        return $gravity.'('.$this -> getCode().'): '.$this -> getMessage().' - '.$this -> getFile().' - '.$this -> getLine();
    }
}


?>
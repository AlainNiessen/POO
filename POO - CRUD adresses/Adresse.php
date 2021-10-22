<?php

class Adresse {
    private $id;
    private $rue;
    private $numero;
    private $codePostal;
    private $localite;    
    private $pays;

    public function __construct($id, $rue, $numero, $codePostal, $localite, $pays) {
        $this->id           = $id;
		$this->rue          = $rue;
		$this->numero       = $numero;
        $this->codePostal   = $codePostal;
		$this->localite     = $localite;		
		$this->pays         = $pays;
	}

    public function setId ($id) {
        $this -> id = $id;
    }
    public function setRue ($rue) {
        $this -> rue = $rue;
    }
    public function setNumero ($numero) {
        $this -> numero = $numero;
    }
    public function setLocalite ($localite) {
        $this -> localite = $localite;
    }
    public function setCodePostal ($codePostal) {
        $this -> codePostal = $codePostal;
    }
    public function setPays ($pays) {
        $this -> pays = $pays;
    }


    public function getId () {
        return $this -> id;
    }
    public function getRue () {
        return $this -> rue;
    }
    public function getNumero () {
        return $this -> numero;
    }
    public function getLocalite () {
        return $this -> localite;
    }
    public function getCodePostal () {
        return $this -> codePostal;
    }
    public function getPays () {
        return $this -> pays;
    }  
    
    public function afficherAdresse () {

        $affichage = '<h1>'.$this -> rue.' '.$this -> numero.'</h1>';
        $affichage .= '<h2>'.$this -> codePostal.' '.$this -> localite.'</h2>';
        $affichage .= '<h3>'.$this -> pays.'</h3>';

        echo $affichage;
    }
}

?>
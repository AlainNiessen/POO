<?php

class AdresseManager {

    private $connexion = null;

    //constructor
    public function __construct ($connex) {
         $this -> connexion = $connex;
    }

    //setter
    public function setConnection ($connexion) {
         $this -> connexion = $connexion;
    }

    //getter
    public function getConnection () {
        return $this -> connexion;
    }

    //création d'une adresse
    public function create(Adresse $object) {

        //récupération des données
        $rue        = $object -> getRue();
        $numero     = $object -> getNumero();
        $codePostal = $object -> getCodePostal();
        $localite   = $object -> getLocalite();
        $pays       = $object -> getPays();

        //création sql
        $sql = "INSERT INTO adresses (rue, numero, codePostal, localite, pays) VALUES (?, ?, ?, ?, ?)";

        //Prepare statement
        $stmt = $this -> getConnection() -> prepare($sql);

        // execute et récupération des attributs de l'object Vehicule via les Getters => va remplacer les points d'interrogation pour VALUES
        $stmt -> execute(array($rue, $numero, $codePostal, $localite, $pays));
    }

    //lire une adresse
    public function read($id) {

        //création sql
        $sql = "SELECT * FROM adresses WHERE id = ".$id;

        //Prepare statement
        $stmt = $this -> getConnection() -> prepare($sql);

        //execute
        $stmt -> execute();

        //stockage du resultat dans une variable
        $resultat = $stmt -> Fetch();

        if(!empty($resultat)) {

           $adresse = new Adresse($resultat['id'], $resultat['rue'], $resultat['numero'], $resultat['codePostal'], $resultat['localite'], $resultat['pays']);

           return $adresse;

        } else {
            return "Il n'existe pas une adresse avec cet ID!";
        }        
    }

    public function readAll() {

        //création sql
        $sql = 'SELECT * FROM adresses';

        //Prepare statement
        $stmt = $this -> getConnection() -> prepare($sql);

        //execute
        $stmt -> execute();

        //stockage du resultat dans une variable (fetchAll)
        $resultats = $stmt -> fetchAll(); 
        
        $listeAdresses = [];

        if(array($resultats)) {

            foreach ($resultats as $resultat) {
        
                $adresse = new Adresse($resultat['id'], $resultat['rue'], $resultat['numero'], $resultat['codePostal'], $resultat['localite'], $resultat['pays']);

                $listeAdresses[] = $adresse;                     
            }

            return $listeAdresses;

        } else {
            return "Pas des adresses dans la base de données!";
        }       
    }

    public function update(Adresse $object) {

        //récupération des données
        $id         = $object -> getId();
        $rue        = $object -> getRue();
        $numero     = $object -> getNumero();
        $localite   = $object -> getLocalite();
        $codePostal = $object -> getCodePostal();        
        $pays       = $object -> getPays();

        //création sql
        $sql = 'UPDATE adresses 
                SET rue = "'.$rue.'",
                    numero = "'.$numero.'",                   
                    codePostal = "'.$codePostal.'",  
                    localite = "'.$localite.'",                  
                    pays = "'.$pays.'"
                WHERE id = '.$id;
        
        //Prepare statement
        $stmt = $this -> getConnection() -> prepare($sql);

        //execute
        $stmt -> execute();
    }

    public function delete($id) {

        //création sql
        $sql = 'DELETE FROM adresses WHERE id ='.$id;

        //Prepare statement
        $stmt = $this -> getConnection() -> prepare($sql);

        //execute
        $stmt -> execute();
    }

}



?>
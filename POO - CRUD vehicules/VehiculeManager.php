<?php

class VehiculeManager {

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

    //création d'un vehicule
    public function create(Vehicule $object) {

        //récupération des données
        $marque     = $object -> getMarque();
        $modele     = $object -> getMarque();
        $nbPortes   = $object -> getNbPortes();
        $vitesse    = $object -> getVitesse();

        //création sql
        $sql = "INSERT INTO vehicules (marque, modele, nbPortes, vitesse) VALUES (?, ?, ?, ?)";

        //Prepare statement
        $stmt = $this -> getConnection() -> prepare($sql);

        // execute et récupération des attributs de l'object Vehicule via les Getters => va remplacer les points d'interrogation pour VALUES
        $stmt -> execute(array($marque, $modele, $nbPortes, $vitesse));
    }

    //lire un vehicule
    public function read($id) {

        //création sql
        $sql = "SELECT * FROM vehicules WHERE id = ".$id;

        //Prepare statement
        $stmt = $this -> getConnection() -> prepare($sql);

        //execute
        $stmt -> execute();

        //stockage du resultat dans une variable
        $resultat = $stmt -> Fetch();

        if($resultat != false) {

           $vehicule = new Vehicule($resultat['id'], $resultat['marque'], $resultat['modele'], $resultat['nbPortes'], $resultat['vitesse']);

           return $vehicule;

        } else {
            return "Il n'existe pas un vehicule avec cet ID!";
        }        
    }

    public function readAll() {

        //création sql
        $sql = 'SELECT * FROM vehicules';

        //Prepare statement
        $stmt = $this -> getConnection() -> prepare($sql);

        //execute
        $stmt -> execute();

        //stockage du resultat dans une variable (fetchAll)
        $resultats = $stmt -> fetchAll(); 
        
        $listeVoitures = [];

        if(array($resultats)) {

            foreach ($resultats as $resultat) {
        
                $vehicule = new Vehicule($resultat['id'], $resultat['marque'], $resultat['modele'], $resultat['nbPortes'], $resultat['vitesse']);

                $listeVoitures[] = $vehicule;                     
            }

            return $listeVoitures;

        } else {
            return "Pas des vehicules dans la base de données!";
        }       
    }

    public function update(Vehicule $object) {

        //récupération des données
        $id         = $object -> getId();
        $marque     = $object -> getMarque();
        $modele     = $object -> getModele();
        $nbPortes   = $object -> getNbPortes();
        $vitesse    = $object -> getVitesse();

        //création sql
        $sql = 'UPDATE vehicules 
                SET marque = "'.$marque.'",
                    modele = "'.$modele.'",
                    nbPortes = "'.$nbPortes.'",
                    vitesse = "'.$vitesse.'"
                WHERE id = '.$id;
        
        //Prepare statement
        $stmt = $this -> getConnection() -> prepare($sql);

        //execute
        $stmt -> execute();
    }

    public function delete($id) {

        //création sql
        $sql = 'DELETE FROM vehicules WHERE id ='.$id;

        //Prepare statement
        $stmt = $this -> getConnection() -> prepare($sql);

        //execute
        $stmt -> execute();
    }

}



?>
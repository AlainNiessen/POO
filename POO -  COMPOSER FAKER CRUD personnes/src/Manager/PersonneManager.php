<?php

namespace ISL\Manager;

use ISL\Entity\Personne;

class PersonneManager {

    //ATTRIBUT
    private $connexion;

    //CONSTRUCTOR
    public function __construct ($connexion) {
        $this -> connexion = $connexion;
    }

    //SETTERS
    public function setConnexion($connexion) {
        $this -> connexion = $connexion;
    }

    //GETTERS
    public function getConnexion() {
        return $this -> connexion;
    }

    //CRUD
    //CREATION
    public function createPerson(Personne $personne) {
        //RECUPERATION DATA OBJECT
        $nom        = $personne -> getNom();
        $prenom     = $personne -> getPrenom();
        $adresse    = $personne -> getAdresse();
        $codePostal = $personne -> getCodePostal();
        $pays       = $personne -> getPays();
        $societe    = $personne -> getSociete();

        //SQL
        $sql = "INSERT INTO personnes (nom, prenom, adresse, codePostal, pays, societe) VALUES ('$nom', '$prenom', '$adresse', '$codePostal', '$pays', '$societe')";
       
        //PREPARE STATEMENT
        $stmt = $this -> getConnexion() -> prepare($sql);

        //EXECUTE STATEMENT 
        $stmt -> execute();        
    }
    //READ
    //READ 1 PERSONNE
    public function readOnePerson($id) {

        //SQL
        $sql = "SELECT * FROM personnes WHERE id = ".$id;

        //PREPARE STATEMENT
        $stmt = $this -> getConnexion() -> prepare($sql);

        //EXECUTE STATEMENT 
        $stmt -> execute();  

        //STOCKAGE DU RESULTAT DANS UNE VARIABLE
        $resultat = $stmt -> Fetch();

        if(!empty($resultat)) {

            $singlePerson = new Personne($resultat['id'], $resultat['nom'], $resultat['prenom'], $resultat['adresse'], $resultat['codePostal'], $resultat['pays'], $resultat['societe']);

            return $singlePerson;

        } else {
            
            return 'Il n\'existe pas une personne avec cette ID';
        }
    }

    //READ ALL PERSONNES
    public function readAllPersons() {

        //SQL
        $sql = "SELECT * FROM personnes";

        //PREPARE STATEMENT
        $stmt = $this -> getConnexion() -> prepare($sql);

        //EXECUTE STATEMENT 
        $stmt -> execute();  

        //STOCKAGE DU RESULTAT DANS UNE VARIABLE
        $resultats = $stmt -> fetchAll();
       

        //DECLARATION OF TABLE PERSONNES
        $listePersonnes = [];

        if(!empty($resultats)) {

            foreach ($resultats as $resultat) {

                $personne = new Personne($resultat['id'], $resultat['nom'], $resultat['prenom'], $resultat['adresse'], $resultat['codePostal'], $resultat['pays'], $resultat['societe']);
                array_push($listePersonnes, $personne);
            }
            
            return $listePersonnes;
        } else {

            return 'Pas des personnes dans la base de données!';
        }
    }

    //UPDATE
    public function updatePerson (Personne $personne) {

        //RECUPERATION DATA OBJECT
        $id         = $personne -> getId();
        $nom        = $personne -> getNom();
        $prenom     = $personne -> getPrenom();
        $adresse    = $personne -> getAdresse();
        $codePostal = $personne -> getCodePostal();
        $pays       = $personne -> getPays();
        $societe    = $personne -> getSociete();

        //SQL
        $sql = 'UPDATE personnes 
                SET nom         = "'.$nom.'",
                    prenom      = "'.$prenom.'",                   
                    adresse     = "'.$adresse.'",                   
                    codePostal  = "'.$codePostal.'",  
                    pays        = "'.$pays.'",                  
                    societe     = "'.$societe.'"
                WHERE id = '.$id;
        
        //PREPARE STATEMENT
        $stmt = $this -> getConnexion() -> prepare($sql);

        //EXECUTE STATEMENT 
        $stmt -> execute();
    }

    //DELETE
    public function deletePerson ($id) {

        //SQL
        $sql = 'DELETE FROM personnes WHERE id ='.$id;

        //PREPARE STATEMENT
        $stmt = $this -> getConnexion() -> prepare($sql);

        //EXECUTE STATEMENT 
        $stmt -> execute();
    }










}


?>
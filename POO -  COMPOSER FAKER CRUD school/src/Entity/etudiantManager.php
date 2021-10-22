<?php

namespace ISL\Entity;

use DateTime;
use Faker\Factory;
use ISL\Entity\Etudiant;

class EtudiantManager extends EntityManager {

    //ATTRIBUTS
    private $faker;

    //CONSTRUCTOR
    public function __construct ($connexion) {
        $this -> faker = Factory::create();
        parent::__construct($connexion);        
    }

    //METHODES MAGIQUES
    //1) GET AND SET FOR UNDEFINED ATTRIBUTS (CHECK)
    public function __set($name, $value) {
        echo $name.' avec la valeur ('.$value.') n\'existe pas!<br/>';
    }

    public function __get($name) {
        echo $name.' n\'existe pas!<br/>';
    }

    //2) CALL AND CALLSTATIC FOR UNDEFINED METHODES (CHECK)
    public function __call($name, $arguments) {
        echo $name . "(" . implode(', ', $arguments) . ")" . " n'existe pas<br/>";
    }

    public static function __callStatic($name, $arguments) {
        echo $name . "(" . implode(',  ', $arguments) . ")" . " n'existe pas<br/>";
    }

    //CREATE ETUDIANT FAKE 
    public function createFakeEtudiant ($tabCours, $niveau) {  

        //1) CREATE DATE INSCRIPTION
        $time = new DateTime('NOW'); 
        $timeInscription = $time->format('Y-m-d');

        //2) CREATE NEW ETUDIANT
        if(is_numeric($niveau) && ($niveau >= 1 && $niveau <= 5)) {
            $newEtudiant = new Etudiant (null, $this->faker->lastName, $this->faker->firstName($gender=null), $this->faker->address, $this->faker->postcode, $this->faker->country, $tabCours, $niveau, $timeInscription);
        }  
        return $newEtudiant;
    } 

    //CRUD
    //1) CREATE
    public function createEtudiant (Etudiant $etudiant, $tabCours) {  
        //RECUPERATION DATE OBJECT
        $nom                = $etudiant -> getNom();
        $prenom             = $etudiant -> getPrenom();
        $adresse            = $etudiant -> getAdresse();
        $codePostal         = $etudiant -> getCodePostal();
        $pays               = $etudiant -> getPays();
        $coursSuivis        = $etudiant -> getCoursSuivis();
        $niveau             = $etudiant -> getNiveau();
        $date_inscription   = $etudiant -> getDateInscription();

        //ETAPPE 1 => INSERTION ETUDIANT + RECUPERATION DE SON ID
        //SQL ETUDIANT
        $sqlEtudiant = "INSERT INTO etudiant (nom, prenom, adresse, codePostal, pays, niveau, date_inscription) 
        VALUES ('$nom', '$prenom', '$adresse', '$codePostal', '$pays', '$niveau', '$date_inscription')";
        //PREPARE STATEMENT
        $stmt = $this -> getConnexion() -> prepare($sqlEtudiant);
        //EXECUTE STATEMENT 
        $stmt -> execute();
        //RECUPERATION DU ID POUR INSERT INTO COURS SUIVI
        $idEtudiant = intval($this -> getConnexion() -> lastInsertId());
        
        //ETAPPE 2 => TRAITEMENT DU TABLEAU AVEC LES COURS SUIVIS
        //SQL COURS
        //1) CONTROLE SI COURS SUIVI EXISTE DANS LA BD SINON INSERTION NOUVEAU COURS
        foreach($coursSuivis as $coursEtudiant) {

            $coursEtudiant = strtolower($coursEtudiant);

            //IN CASE OF NEW COURS
            if(!in_array($coursEtudiant, $tabCours)) {
                //SQL FOR NEW COURS
                $sqlCours = "INSERT INTO cours (cours) VALUES ('$coursEtudiant')";
                //PREPARE STATEMENT
                $stmt = $this -> getConnexion() -> prepare($sqlCours);
                //EXECUTE STATEMENT 
                $stmt -> execute();
                //RECUPERATION DU ID POUR INSERT INTO COURS SUIVI
                $idCours = intval($this -> getConnexion() -> lastInsertId());
            } else {
                //2) RECUPERATION ID COURS
                //SQL ID
                $sqlIdCours = "SELECT id FROM cours WHERE cours LIKE '$coursEtudiant'";
                //PREPARE STATEMENT
                $stmt = $this -> getConnexion() -> prepare($sqlIdCours);
                //EXECUTE STATEMENT 
                $stmt -> execute();
                //STOCKAGE DU RESULTAT DANS UNE VARIABLE
                $resultat = $stmt -> Fetch();
                //RECUPERATION DU ID POUR INSERT INTO COURS SUIVI
                $idCours = intval($resultat[0]);
            }            

            //3) INSERTION DU ID ETUDIANT ET ID COURS DANS LA TABLE COURS SUIVI DANS LA BD
            //SQL ID
            $sqlCoursSuivis = "INSERT INTO cours_suivis (id_etudiant, id_cours) VALUES ('$idEtudiant', '$idCours')";
            //PREPARE STATEMENT
            $stmt = $this -> getConnexion() -> prepare($sqlCoursSuivis);
            //EXECUTE STATEMENT 
            $stmt -> execute();
        }
    } 

    //READ ONE STUDENT
    public function readOneEtudiant($id) {
        //CREATE TAB COURS SUIVIS
        $tabCoursSuivis = [];

        //SQL ETUDIANT
        $sql = "SELECT * FROM etudiant WHERE id =".$id;

        //PREPARE STATEMENT
        $stmt = $this -> getConnexion() -> prepare($sql);

        //EXECUTE STATEMENT
        $stmt -> execute();

        //STOCKAGE DU RESULTAT DANS UNE VARIABLE
        $resultEtudiant = $stmt -> Fetch();

        //SQL COURS
        $sqlCours = "SELECT cours FROM
                    cours as A
                    INNER JOIN cours_suivis as B ON A.id = B.id_cours
                    WHERE B.id_etudiant = ".$id;
        //PREPARE STATEMENT
        $stmt = $this -> getConnexion() -> prepare($sqlCours);

        //EXECUTE STATEMENT
        $stmt -> execute();

        //STOCKAGE DU RESULTAT DANS UNE VARIABLE
        $resultCours = $stmt -> fetchAll();
        
        foreach($resultCours as $cours) {
            array_push($tabCoursSuivis, $cours["cours"]);
        }
        
        if(!empty($resultEtudiant)) {

            $singleStudent = new Etudiant ($resultEtudiant['id'], $resultEtudiant['nom'], $resultEtudiant['prenom'], $resultEtudiant['adresse'], $resultEtudiant['codePostal'], $resultEtudiant['pays'], $tabCoursSuivis, $resultEtudiant['niveau'], $resultEtudiant['date_inscription']);

            return $singleStudent;

        } else {

            return 'Il n\'existe aucun étudiant avec cette ID';
        }                
    }

    //READ ALL STUDENTS
    public function readAllEtudiants() {

        //SQL ETUDIANT
        $sql = "SELECT * FROM etudiant";

        //PREPARE STATEMENT
        $stmt = $this -> getConnexion() -> prepare($sql);

        //EXECUTE STATEMENT
        $stmt -> execute();

        //STOCKAGE DU RESULTAT DANS UNE VARIABLE
        $resultsEtudiants = $stmt -> fetchAll();        

        $listEtudiants = [];

        if(!empty($resultsEtudiants)) {

            foreach($resultsEtudiants as $result) {
                //CREATE TAB COURS SUIVIS
                $tabCoursSuivis = [];

                //SQL COURS
                $sqlCours = "SELECT cours FROM
                             cours as A
                             INNER JOIN cours_suivis as B ON A.id = B.id_cours
                             WHERE B.id_etudiant = ".$result['id'];
                //PREPARE STATEMENT
                $stmt = $this -> getConnexion() -> prepare($sqlCours);

                //EXECUTE STATEMENT
                $stmt -> execute();

                //STOCKAGE DU RESULTAT DANS UNE VARIABLE
                $resultCours = $stmt -> fetchAll();
                
                foreach($resultCours as $cours) {
                    array_push($tabCoursSuivis, $cours["cours"]);
                }

                $newEtudiant = new Etudiant ($result['id'], $result['nom'], $result['prenom'], $result['adresse'], $result['codePostal'], $result['pays'], $tabCoursSuivis, $result['niveau'], $result['date_inscription']);
                array_push($listEtudiants, $newEtudiant);                
            }

            return $listEtudiants;

        } else {

            return 'Pas des étudiants dans la base de données!';

        }
    }    

    //UPDATE ETUDIANT
    public function updateEtudiant(Etudiant $etudiant, $tabCours) {
        //RECUPERATION DATA OBJECT
        $id              = $etudiant -> getId();
        $nom             = $etudiant -> getNom();
        $prenom          = $etudiant -> getPrenom();
        $adresse         = $etudiant -> getAdresse();
        $codePostal      = $etudiant -> getCodePostal();
        $pays            = $etudiant -> getPays();
        $coursSuivis     = $etudiant -> getCoursSuivis();
        $niveau          = $etudiant -> getNiveau();
        $dateInscription = $etudiant -> getDateInscription();

        //UPDATE ETUDIANT
        //SQL
        $sqlUpdateEtudiant = 'UPDATE etudiant 
                                SET nom              = "'.$nom.'",
                                    prenom           = "'.$prenom.'",                   
                                    adresse          = "'.$adresse.'",                   
                                    codePostal       = "'.$codePostal.'",  
                                    pays             = "'.$pays.'",                  
                                    niveau           = "'.$niveau.'",
                                    date_inscription = "'.$dateInscription.'"                    
                                WHERE id = '.$id;

        //PREPARE STATEMENT
        $stmt = $this -> getConnexion() -> prepare($sqlUpdateEtudiant);

        //EXECUTE STATEMENT 
        $stmt -> execute();
        
        //UPDATE COURS ET COURS SUIVIS
        //Etappe 1 => DELETING EXISTANT COURS_SUIVIS FROM ETUDIANT IN DB
        $sqlDeleteCoursSuivis = 'DELETE FROM cours_suivis WHERE id_etudiant='.$id;
        //PREPARE STATEMENT
        $stmt = $this -> getConnexion() -> prepare($sqlDeleteCoursSuivis);
        //EXECUTE STATEMENT 
        $stmt -> execute();

        //ETAPPE 2 => INSERTION NEW COURS SUIVIS FROM ETUDIANTS IN DB
        foreach($coursSuivis as $coursEtudiant) {

            $coursEtudiant = strtolower($coursEtudiant);

            //IN CASE OF NEW COURS
            if(!in_array($coursEtudiant, $tabCours)) {
                //SQL FOR NEW COURS
                $sqlCours = "INSERT INTO cours (cours) VALUES ('$coursEtudiant')";
                //PREPARE STATEMENT
                $stmt = $this -> getConnexion() -> prepare($sqlCours);
                //EXECUTE STATEMENT 
                $stmt -> execute();
                //RECUPERATION DU ID POUR INSERT INTO COURS SUIVI
                $idCours = intval($this -> getConnexion() -> lastInsertId());
                
            } else {
                //2) RECUPERATION ID COURS
                //SQL ID
                $sqlIdCours = "SELECT id FROM cours WHERE cours LIKE '$coursEtudiant'";
                //PREPARE STATEMENT
                $stmt = $this -> getConnexion() -> prepare($sqlIdCours);
                //EXECUTE STATEMENT 
                $stmt -> execute();
                //STOCKAGE DU RESULTAT DANS UNE VARIABLE
                $resultat = $stmt -> Fetch();
                //RECUPERATION DU ID POUR INSERT INTO COURS SUIVI
                $idCours = intval($resultat[0]);
            }            

            //3) INSERTION DU ID ETUDIANT ET ID COURS DANS LA TABLE COURS SUIVI DANS LA BD
            //SQL ID
            $sqlCoursSuivis = "INSERT INTO cours_suivis (id_etudiant, id_cours) VALUES ('$id', '$idCours')";
            //PREPARE STATEMENT
            $stmt = $this -> getConnexion() -> prepare($sqlCoursSuivis);
            //EXECUTE STATEMENT 
            $stmt -> execute();
        }
    }

    //DELETE ETUDIANT
    public function deleteEtudiant($id) {
        //SQL Etudiant
        $sqlEtudiant = 'DELETE FROM etudiant WHERE id ='.$id;

        //PREPARE STATEMENT
        $stmt = $this -> getConnexion() -> prepare($sqlEtudiant);

        //EXECUTE STATEMENT 
        $stmt -> execute();

        //SQL COURS SUIVIS
        $sqlCoursSuivis = 'DELETE FROM cours_suivis WHERE id_etudiant ='.$id;

        //PREPARE STATEMENT
        $stmt = $this -> getConnexion() -> prepare($sqlCoursSuivis);

        //EXECUTE STATEMENT 
        $stmt -> execute();

    }
    
    
}



?>
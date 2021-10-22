<?php

namespace ISL\Entity;

use DateTime;
use Faker\Factory;
use ISL\entity\Enseignant;

class EnseignantManager extends EntityManager {

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

    //FUNCTION FOR RANDOM DATE
    public function randomDateinRange(DateTime $start, DateTime $end) {
        $randomTimestamp = mt_rand($start->getTimestamp(), $end->getTimestamp());
        $randomDate = new DateTime();
        $randomDate->setTimestamp($randomTimestamp);
        return $randomDate;
    }

    //FUNCTION CALCUL NUMBER YEARS BETWEEN TWO DATES
    public function calculYears(DateTime $start, DateTime $end) {
        
        $intvl = $start->diff($end);

        $anciennete = $intvl -> y;
        return $anciennete;
    }

    //CREATE ETUDIANT FAKE 
    public function createFakeEnseignant ($tabCours) {  

        //1) CREATE DATE ENTREE
        $dateStart = new DateTime('1980-01-01');
        $dateEnd = new DateTime('NOW'); 
        $date = $this -> randomDateinRange($dateStart, $dateEnd);
        $dateEntree = $date -> format('Y-m-d');

        //2) CACLCUL ANCIENNETE
        $anciennete = $this -> calculYears($date, $dateEnd);

        //3) CREATE NEW ENSEIGNANT        
        $newEnseignant = new Enseignant (null, $this->faker->lastName, $this->faker->firstName($gender=null), $this->faker->address, $this->faker->postcode, $this->faker->country, $tabCours, $anciennete, $dateEntree);
      
        return $newEnseignant;
    } 

    //CRUD
    //1) CREATE
    public function createEnseignant (Enseignant $enseignant, $tabCours) {  
        //RECUPERATION DATE OBJECT
        $nom            = $enseignant -> getNom();
        $prenom         = $enseignant -> getPrenom();
        $adresse        = $enseignant -> getAdresse();
        $codePostal     = $enseignant -> getCodePostal();
        $pays           = $enseignant -> getPays();
        $coursDonnees   = $enseignant -> getCoursDonnes();
        $anciennete     = $enseignant -> getAnciennete();
        $dateEntree     = $enseignant -> getDateEntree();

        //ETAPPE 1 => INSERTION ENSEIGNANT + RECUPERATION DE SON ID
        //SQL ENSEIGNANT
        $sqlEnseignant = "INSERT INTO enseignant (nom, prenom, adresse, codePostal, pays, anciennete, date_entree) 
        VALUES ('$nom', '$prenom', '$adresse', '$codePostal', '$pays', '$anciennete', '$dateEntree')";
        //PREPARE STATEMENT
        $stmt = $this -> getConnexion() -> prepare($sqlEnseignant);
        //EXECUTE STATEMENT 
        $stmt -> execute();
        //RECUPERATION DU ID POUR INSERT INTO COURS DONNEES
        $idEnseignant = intval($this -> getConnexion() -> lastInsertId());
        
        //ETAPPE 2 => TRAITEMENT DU TABLEAU AVEC LES COURS DONNEES
        //SQL COURS
        //1) CONTROLE SI COURS DONNEES EXISTE DANS LA BD SINON INSERTION NOUVEAU COURS
        foreach($coursDonnees as $coursEnseignant) {

            $coursEnseignant = strtolower($coursEnseignant);

            //IN CASE OF NEW COURS
            if(!in_array($coursEnseignant, $tabCours)) {
                //SQL FOR NEW COURS
                $sqlCours = "INSERT INTO cours (cours) VALUES ('$coursEnseignant')";
                //PREPARE STATEMENT
                $stmt = $this -> getConnexion() -> prepare($sqlCours);
                //EXECUTE STATEMENT 
                $stmt -> execute();
                //RECUPERATION DU ID POUR INSERT INTO COURS DONNEES
                $idCours = intval($this -> getConnexion() -> lastInsertId());
            } else {
                //2) RECUPERATION ID COURS
                //SQL ID
                $sqlIdCours = "SELECT id FROM cours WHERE cours LIKE '$coursEnseignant'";
                //PREPARE STATEMENT
                $stmt = $this -> getConnexion() -> prepare($sqlIdCours);
                //EXECUTE STATEMENT 
                $stmt -> execute();
                //STOCKAGE DU RESULTAT DANS UNE VARIABLE
                $resultat = $stmt -> Fetch();
                //RECUPERATION DU ID POUR INSERT INTO COURS DONNEES
                $idCours = intval($resultat[0]);
            }            

            //3) INSERTION DU ID ENSEIGNANT ET ID COURS DANS LA TABLE COURS DONNEES DANS LA BD
            //SQL ID
            $sqlCoursDonnees = "INSERT INTO cours_donnees (id_enseignant, id_cours) VALUES ('$idEnseignant', '$idCours')";
            //PREPARE STATEMENT
            $stmt = $this -> getConnexion() -> prepare($sqlCoursDonnees);
            //EXECUTE STATEMENT 
            $stmt -> execute();
        }
    }

    //READ ONE ENSEIGNANT
    public function readOneEnseignant($id) {
        //CREATE TAB COURS DONNEES
        $tabCoursDonnees = [];

        //SQL ETUDIANT
        $sql = "SELECT * FROM enseignant WHERE id =".$id;

        //PREPARE STATEMENT
        $stmt = $this -> getConnexion() -> prepare($sql);

        //EXECUTE STATEMENT
        $stmt -> execute();

        //STOCKAGE DU RESULTAT DANS UNE VARIABLE
        $resultEnseignant = $stmt -> Fetch();

        //SQL COURS
        $sqlCours = "SELECT cours FROM
                    cours as A
                    INNER JOIN cours_donnees as B ON A.id = B.id_cours
                    WHERE B.id_enseignant = ".$id;
        //PREPARE STATEMENT
        $stmt = $this -> getConnexion() -> prepare($sqlCours);

        //EXECUTE STATEMENT
        $stmt -> execute();

        //STOCKAGE DU RESULTAT DANS UNE VARIABLE
        $resultCours = $stmt -> fetchAll();
        
        foreach($resultCours as $cours) {
            array_push($tabCoursDonnees, $cours["cours"]);
        }
        
        if(!empty($resultEnseignant)) {

            $singleEnseignant = new Enseignant ($resultEnseignant['id'], $resultEnseignant['nom'], $resultEnseignant['prenom'], $resultEnseignant['adresse'], $resultEnseignant['codePostal'], $resultEnseignant['pays'], $tabCoursDonnees, $resultEnseignant['anciennete'], $resultEnseignant['date_entree']);

            return $singleEnseignant;

        } else {

            return 'Il n\'existe aucun enseignant avec cette ID';
        }                
    }
    //READ ALL ENSEIGNANTS
    public function readAllEnseignants() {

        //SQL ENSEIGNANT
        $sql = "SELECT * FROM enseignant";

        //PREPARE STATEMENT
        $stmt = $this -> getConnexion() -> prepare($sql);

        //EXECUTE STATEMENT
        $stmt -> execute();

        //STOCKAGE DU RESULTAT DANS UNE VARIABLE
        $resultsEnseignants = $stmt -> fetchAll();        

        $listEnseignants = [];

        if(!empty($resultsEnseignants)) {

            foreach($resultsEnseignants as $result) {
                //CREATE TAB COURS DONNES
                $tabCoursDonnes = [];

                //SQL COURS
                $sqlCours = "SELECT cours FROM
                             cours as A
                             INNER JOIN cours_donnees as B ON A.id = B.id_cours
                             WHERE B.id_enseignant = ".$result['id'];
                //PREPARE STATEMENT
                $stmt = $this -> getConnexion() -> prepare($sqlCours);

                //EXECUTE STATEMENT
                $stmt -> execute();

                //STOCKAGE DU RESULTAT DANS UNE VARIABLE
                $resultCours = $stmt -> fetchAll();
                
                foreach($resultCours as $cours) {
                    array_push($tabCoursDonnes, $cours["cours"]);
                }

                $newEnseignant = new Enseignant ($result['id'], $result['nom'], $result['prenom'], $result['adresse'], $result['codePostal'], $result['pays'], $tabCoursDonnes, $result['anciennete'], $result['date_entree']);
                array_push($listEnseignants, $newEnseignant);                
            }

            return $listEnseignants;

        } else {

            return 'Pas des enseignants dans la base de données!';

        }
    }

    //UPDATE ENSEIGNANT
    public function updateEnseignant(Enseignant $enseignant, $tabCours) {
        //RECUPERATION DATA OBJECT
        $id              = $enseignant -> getId();
        $nom             = $enseignant -> getNom();
        $prenom          = $enseignant -> getPrenom();
        $adresse         = $enseignant -> getAdresse();
        $codePostal      = $enseignant -> getCodePostal();
        $pays            = $enseignant -> getPays();
        $coursDonnes     = $enseignant -> getCoursDonnes();
        $anciennete      = $enseignant -> getAnciennete();
        $dateEntree      = $enseignant -> getDateEntree();

        //UPDATE ENSEIGNANT
        //SQL
        $sqlUpdateEnseignant = 'UPDATE enseignant
                                SET nom              = "'.$nom.'",
                                    prenom           = "'.$prenom.'",                   
                                    adresse          = "'.$adresse.'",                   
                                    codePostal       = "'.$codePostal.'",  
                                    pays             = "'.$pays.'",                  
                                    anciennete       = "'.$anciennete.'",
                                    date_entree      = "'.$dateEntree.'"                    
                                WHERE id = '.$id;

        //PREPARE STATEMENT
        $stmt = $this -> getConnexion() -> prepare($sqlUpdateEnseignant);

        //EXECUTE STATEMENT 
        $stmt -> execute();
        
        //UPDATE COURS ET COURS DONNES
        //Etappe 1 => DELETING EXISTANT COURS_DONNES FROM ENSEIGNANT IN DB
        $sqlDeleteCoursDonnes = 'DELETE FROM cours_donnees WHERE id_enseignant='.$id;
        //PREPARE STATEMENT
        $stmt = $this -> getConnexion() -> prepare($sqlDeleteCoursDonnes);
        //EXECUTE STATEMENT 
        $stmt -> execute();

        //ETAPPE 2 => INSERTION NEW COURS DONNES FROM ENSEIGNANT IN DB
        foreach($coursDonnes as $coursEnseignant) {

            $coursEnseignant = strtolower($coursEnseignant);

            //IN CASE OF NEW COURS
            if(!in_array($coursEnseignant, $tabCours)) {
                //SQL FOR NEW COURS
                $sqlCours = "INSERT INTO cours (cours) VALUES ('$coursEnseignant')";
                //PREPARE STATEMENT
                $stmt = $this -> getConnexion() -> prepare($sqlCours);
                //EXECUTE STATEMENT 
                $stmt -> execute();
                //RECUPERATION DU ID POUR INSERT INTO COURS SUIVI
                $idCours = intval($this -> getConnexion() -> lastInsertId());
                
            } else {
                //2) RECUPERATION ID COURS
                //SQL ID
                $sqlIdCours = "SELECT id FROM cours WHERE cours LIKE '$coursEnseignant'";
                //PREPARE STATEMENT
                $stmt = $this -> getConnexion() -> prepare($sqlIdCours);
                //EXECUTE STATEMENT 
                $stmt -> execute();
                //STOCKAGE DU RESULTAT DANS UNE VARIABLE
                $resultat = $stmt -> Fetch();
                //RECUPERATION DU ID POUR INSERT INTO COURS DONNES
                $idCours = intval($resultat[0]);
            }            

            //3) INSERTION DU ID ENSEIGNANT ET ID COURS DANS LA TABLE COURS DONNES DANS LA BD
            //SQL ID
            $sqlCoursDonnes = "INSERT INTO cours_donnees (id_enseignant, id_cours) VALUES ('$id', '$idCours')";
            //PREPARE STATEMENT
            $stmt = $this -> getConnexion() -> prepare($sqlCoursDonnes);
            //EXECUTE STATEMENT 
            $stmt -> execute();
        }
    }

    //DELETE ENSEIGNANT
    public function deleteEnseignant($id) {
        //SQL Etudiant
        $sqlEnseignant = 'DELETE FROM enseignant WHERE id ='.$id;

        //PREPARE STATEMENT
        $stmt = $this -> getConnexion() -> prepare($sqlEnseignant);

        //EXECUTE STATEMENT 
        $stmt -> execute();

        //SQL COURS SUIVIS
        $sqlCoursDonnes = 'DELETE FROM cours_donnees WHERE id_enseignant ='.$id;

        //PREPARE STATEMENT
        $stmt = $this -> getConnexion() -> prepare($sqlCoursDonnes);

        //EXECUTE STATEMENT 
        $stmt -> execute();

    }
}




?>
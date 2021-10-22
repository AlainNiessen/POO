<?php

namespace ISL\Entity;

use ISL\Entity\cours;

class CoursManager extends EntityManager {

    //CONSTRUCTOR
    public function __construct ($connexion) {
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

    //CRUD
    //1) CREATE
    public function createCours (Cours $cours) {  
        //RECUPERATION DATE OBJECT
        $newCours = $cours -> getCours();

        //SQL
        $sql = "INSERT INTO cours (cours) VALUES ('$newCours')";

        //PREPARE STATEMENT
        $stmt = $this -> getConnexion() -> prepare($sql);

        //EXECUTE STATEMENT 
        $stmt -> execute();  
    } 

    //2) READ ONE COURS
    public function readOneCours($id) {

        //SQL
        $sql = "SELECT * FROM cours WHERE id = ".$id;

        //PREPARE STATEMENT
        $stmt = $this -> getConnexion() -> prepare($sql);

        //EXECUTE STATEMENT 
        $stmt -> execute();  

        //STOCKAGE DU RESULTAT DANS UNE VARIABLE
        $result = $stmt -> Fetch();

        if(!empty($result)) {

            $singleCours = new Cours($result['id'], $result['cours']);

            return $singleCours;

        } else {
            
            return 'Il n\'existe aucun cours avec cette ID';
        }
    }

    //3) READ ALL COURS
    public function readAllCours() {

        //SQL
        $sql = "SELECT * FROM cours";

        //PREPARE STATEMENT
        $stmt = $this -> getConnexion() -> prepare($sql);

        //EXECUTE STATEMENT 
        $stmt -> execute();  

        //STOCKAGE DU RESULTAT DANS UNE VARIABLE
        $results = $stmt -> fetchAll();       
        
        //DECLARATION OF TABLE PERSONNES
        $listCours = [];

        if(!empty($results)) {

            foreach ($results as $result) {

                $cours = new Cours($result['id'], $result['cours']);
                
                array_push($listCours, $cours);
            }
            
            return $listCours;
        } else {

            return 'Pas des cours dans la base de données!';
        }
    }

    
    //4) UPDATE
    public function updateCours (Cours $cours) {

        //RECUPERATION DATA OBJECT
        $id     = $cours -> getId();
        $cours  = $cours -> getCours();
        

        //SQL
        $sql = 'UPDATE cours 
                SET nom         = "'.$cours.'"                    
                WHERE id = '.$id;
        
        //PREPARE STATEMENT
        $stmt = $this -> getConnexion() -> prepare($sql);

        //EXECUTE STATEMENT 
        $stmt -> execute();
    }

    //5) DELETE
    //DELETE
    public function deleteCours ($id) {

        //SQL
        $sql = 'DELETE FROM cours WHERE id ='.$id;

        //PREPARE STATEMENT
        $stmt = $this -> getConnexion() -> prepare($sql);

        //EXECUTE STATEMENT 
        $stmt -> execute();
    }
}



?>
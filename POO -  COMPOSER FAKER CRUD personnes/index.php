<?php

//AUTOLOADING CLASSES (NO INCLUDE NEEDED)
require 'vendor/autoload.php';

use ISL\Entity\FakerPersonne;
use ISL\Manager\PersonneManager;


//CREATE CONNEXION DATABASE
$personneManager = null;
try {
    $connexion = new PDO('mysql:host=localhost;dbname=poo_composer_faker', 'root', '');
    $personneManager = new PersonneManager($connexion);
} catch (Exception $exc){
    die('Erreur : '.$exc->getMessage());
}

//CREATE 15 NEW PERSONNES
$nombre = 10;
$manager = new FakerPersonne();
$personnes = $manager -> managePerson($nombre);

$all = $personneManager -> readAllPersons();
var_dump($all);

// ----TESTING CRUD-----
//INSERT PERSONNES INTO DATABASE (CHECK)
//LOOPING ALL OBJECTS PERSONS FAKE
foreach($personnes as $person) { 
    $personneManager -> createPerson($person);  
}

//READ ONE PERSON (CHECK)
$identificationRead = 5;
$singlePersonne = $personneManager -> readOnePerson($identificationRead);
$affichageSinlgePersonne = '<p>Nom : '.$singlePersonne -> getNom().'</p>
                            <p>Prénom : '.$singlePersonne -> getPrenom().'</p>
                            <p>Adresse : '.$singlePersonne -> getAdresse().'</p>
                            <p>Code Postal: '.$singlePersonne -> getCodePostal().'</p>
                            <p>Pays : '.$singlePersonne -> getPays().'</p>
                            <p>Société : '.$singlePersonne -> getSociete().'</p>';

//READ ALL PERSONS (CHECK)
$listePersonnes = $personneManager -> readAllPersons();

// UPDATE PERSON (check)
 //a) READ PERSON TO UPDATE
// $identificationUpdate = 1;
// $personneUpdate = $personneManager -> readOnePerson($identificationUpdate);
//  //b) MODIFICATION
// $personneUpdate -> setNom('Niessen');
// $personneUpdate -> setPrenom('Alain');
// $personneUpdate -> setAdresse('Gospert 21');
// $personneUpdate -> setCodePostal('4700');
// $personneUpdate -> setPays('Belgium');
//  //c) UPDATE
// $personneManager -> updatePerson($personneUpdate);

//DELETE PERSON (CHECK)
// $identificationDelete = 2;
// $personneManager -> deletePerson($identificationDelete);

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
        <title>Document</title>
    </head>
    <body>
        <h1>Affichage des <?php echo $nombre ?> personnes de fake</h1>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Prenom</th>
                    <th>Adresse</th>
                    <th>Code Postal</th>
                    <th>Pays</th>
                    <th>Societe</th>
                </tr>
            </thead>
            <tbody>
            <?php
            //boucle sur l'object ISL\Person donc pour récupérer les valeur appel des getter de la class Person
            foreach($personnes as $person) {
                echo "<tr>";
                echo "<td>".$person->getNom()."</td>";
                echo "<td>".$person->getPrenom()."</td>";
                echo "<td>".$person->getAdresse()."</td>";
                echo "<td>".$person->getCodePostal()."</td>";
                echo "<td>".$person->getPays()."</td>";
                echo "<td>".$person->getSociete()."</td>";
                echo "</tr>";
            }
            ?>
            </tbody>            
        </table>  
        <h1>Affiachage de la personne avec l'ID <?php echo $identificationRead ?></h1>
        <?php echo $affichageSinlgePersonne ?>
        <h1>Affichage des personnes dans la base de données</h1> 
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Prenom</th>
                    <th>Adresse</th>
                    <th>Code Postal</th>
                    <th>Pays</th>
                    <th>Societe</th>
                </tr>
            </thead>
            <tbody>
            <?php
            //boucle sur l'object ISL\Person donc pour récupérer les valeur appel des getter de la class Person
            foreach($listePersonnes as $personDB) {
                echo "<tr>";
                echo "<td>".$personDB->getNom()."</td>";
                echo "<td>".$personDB->getPrenom()."</td>";
                echo "<td>".$personDB->getAdresse()."</td>";
                echo "<td>".$personDB->getCodePostal()."</td>";
                echo "<td>".$personDB->getPays()."</td>";
                echo "<td>".$personDB->getSociete()."</td>";
                echo "</tr>";
            }
            ?>
            </tbody>            
        </table>       
    </body>
</html>
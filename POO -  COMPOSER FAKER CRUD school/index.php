<?php

//AUTOLOADING CLASSES (NO INCLUDE NEEDED)
require 'vendor/autoload.php';

use ISL\Entity\Cours;
use ISL\Entity\CoursManager;
use ISL\Entity\EnseignantManager;
use ISL\Entity\Etudiant;
use ISL\Entity\EtudiantManager;
use ISL\Entity\FakerPersonne;

//CREATE CONNEXION DATABASE
$coursManager = null;
$etudiantManager = null;
$enseignantManager = null;
try {
    $connexion = new PDO('mysql:host=localhost;dbname=poo_composer_school', 'root', '');
    $coursManager = new CoursManager($connexion);
    $etudiantManager = new EtudiantManager($connexion);
    $enseignantManager = new EnseignantManager($connexion);
} catch (Exception $exc){
    die('Erreur : '.$exc->getMessage());
}

//CREATE ARRAY WITH EXISTANT COURS IN DB
$coursDB = [];
$db = $coursManager -> readAllCours();
foreach ($db as $cours) {
    $existCoursDB = $cours -> getCours();
    array_push( $coursDB, $existCoursDB);
}

//TEST 1 => CREATING STUDENTS
//STUDENT1
//1) CREATION TABLEAU COURS SUIVIS PAR UN ETUDIANT
$tabCoursSuivis1 = ['css', 'html'];
//2) CREATION ETUDIANT
$etudiant1 = $etudiantManager -> createFakeEtudiant($tabCoursSuivis1, 3);
//3) INSERTION DANS LA BD => ETUDIANT ET COURS SUIVIS
$etudiantManager -> createEtudiant($etudiant1, $coursDB);

//STUDENT2
//1) CREATION TABLEAU COURS SUIVIS PAR UN ETUDIANT
$tabCoursSuivis2 = ['css', 'html', 'framework', 'anglais'];
//2) CREATION ETUDIANT
$etudiant2 = $etudiantManager -> createFakeEtudiant($tabCoursSuivis2, 3);
//3) INSERTION DANS LA BD => ETUDIANT ET COURS SUIVIS
$etudiantManager -> createEtudiant($etudiant2, $coursDB);

//STUDENT3
//1) CREATION TABLEAU COURS SUIVIS PAR UN ETUDIANT
$tabCoursSuivis3 = ['css', 'html', 'php', 'javascript'];
//2) CREATION ETUDIANT
$etudiant3 = $etudiantManager -> createFakeEtudiant($tabCoursSuivis3, 1);
//3) INSERTION DANS LA BD => ETUDIANT ET COURS SUIVIS
$etudiantManager -> createEtudiant($etudiant3, $coursDB);

//STUDENT1
//1) CREATION TABLEAU COURS SUIVIS PAR UN ETUDIANT
$tabCoursSuivis4 = ['php', 'html', 'francais', 'allemand'];
//2) CREATION ETUDIANT
$etudiant4 = $etudiantManager -> createFakeEtudiant($tabCoursSuivis4, 3);
//3) INSERTION DANS LA BD => ETUDIANT ET COURS SUIVIS
$etudiantManager -> createEtudiant($etudiant4, $coursDB);

//STUDENT5
//1) CREATION TABLEAU COURS SUIVIS PAR UN ETUDIANT
$tabCoursSuivis5 = ['css', 'javascript', 'framework', 'php'];
//2) CREATION ETUDIANT
$etudiant5 = $etudiantManager -> createFakeEtudiant($tabCoursSuivis5, 3);
//3) INSERTION DANS LA BD => ETUDIANT ET COURS SUIVIS
$etudiantManager -> createEtudiant($etudiant5, $coursDB);

//DISPLAY ONE STUDENT AND ALL STUDENTS
$singleEtudiant = $etudiantManager -> readOneEtudiant(1);
$etudiants = $etudiantManager -> readAllEtudiants();

//UPDATE ETUDIANT (TEST + WORKS)
 //a) READ ETUDIANT TO UPDATE
// $identificationUpdate = 1;
// $etudiantUpdate = $etudiantManager -> readOneEtudiant($identificationUpdate);
 //b) MODIFICATION
// $etudiantUpdate -> setNom('Niessen');
// $etudiantUpdate -> setPrenom('Alain');
// $etudiantUpdate -> setAdresse('Gospert 21');
// $etudiantUpdate -> setCodePostal('4700');
// $etudiantUpdate -> setPays('Belgium');
// $etudiantUpdate -> setCoursSuivis(['css', 'allemand', 'math', 'html']);
 //c) UPDATE
// $etudiantManager -> updateEtudiant($etudiantUpdate, $coursDB);

//DELETE ETUDIANT (TEST + WORKS)
// $identificationDelete = 2;
// $etudiantManager -> deleteEtudiant($identificationDelete);

//TEST 2 => CREATING ENSEIGNANTS
//ENSEIGNANT1
//1) CREATION TABLEAU COURS DONNEES PAR UN ENSEIGNANT
$tabCoursDonnees1 = ['css', 'html'];
//2) CREATION ENSEIGNANT
$enseignant1 = $enseignantManager -> createFakeEnseignant($tabCoursDonnees1);
//3) INSERTION DANS LA BD => ENSEIGNANT ET COURS DONNEES
$enseignantManager -> createEnseignant($enseignant1, $coursDB);

//ENSEIGNANT2
//1) CREATION TABLEAU COURS DONNEES PAR UN ENSEIGNANT
$tabCoursDonnees2 = ['php', 'framework'];
//2) CREATION ENSEIGNANT
$enseignant2 = $enseignantManager -> createFakeEnseignant($tabCoursDonnees2);
//3) INSERTION DANS LA BD => ENSEIGNANT ET COURS DONNEES
$enseignantManager -> createEnseignant($enseignant2, $coursDB);

//ENSEIGNANT3
//1) CREATION TABLEAU COURS DONNEES PAR UN ENSEIGNANT
$tabCoursDonnees3 = ['francais', 'anglais', 'allemand'];
//2) CREATION ENSEIGNANT
$enseignant3 = $enseignantManager -> createFakeEnseignant($tabCoursDonnees3);
//3) INSERTION DANS LA BD => ENSEIGNANT ET COURS DONNEES
$enseignantManager -> createEnseignant($enseignant3, $coursDB);

//ENSEIGNANT4
//1) CREATION TABLEAU COURS DONNEES PAR UN ENSEIGNANT
$tabCoursDonnees4 = ['javascript'];
//2) CREATION ENSEIGNANT
$enseignant4 = $enseignantManager -> createFakeEnseignant($tabCoursDonnees4);
//3) INSERTION DANS LA BD => ENSEIGNANT ET COURS DONNEES
$enseignantManager -> createEnseignant($enseignant4, $coursDB);

//DISPLAY ONE ENSEIGNANT AND ALL ENSEIGNANTS
$singleEnseignant = $enseignantManager -> readOneEnseignant(2);
$enseignants = $enseignantManager -> readAllEnseignants();

//UPDATE ENSEIGNANT (TEST + WORKS)
 //a) READ ENSEIGNANT TO UPDATE
// $identificationUpdate = 1;
// $enseignantUpdate = $enseignantManager -> readOneEnseignant($identificationUpdate);
 //b) MODIFICATION
// $enseignantUpdate -> setNom('Niessen');
// $enseignantUpdate -> setPrenom('Alain');
// $enseignantUpdate -> setAdresse('Gospert 21');
// $enseignantUpdate -> setCodePostal('4700');
// $enseignantUpdate -> setPays('Belgium');
// $enseignantUpdate -> setCoursDonnes(['css', 'allemand', 'math', 'html']);
 //c) UPDATE
// $enseignantManager -> updateEnseignant($enseignantUpdate, $coursDB);

//DELETE ENSEIGNANT (TEST + WORKS)
// $identificationDelete = 3;
// $enseignantManager -> deleteEnseignant($identificationDelete);

// ?>

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
        <section>
            <h2>Affichage de l'étudiant avec ID <?php echo $singleEtudiant -> getID() ?></h2>
            <h3>Données personnelles</h3>
            <p>Nom: <?php echo $singleEtudiant -> getNom() ?></p>
            <p>Prenom: <?php echo $singleEtudiant -> getPrenom() ?></p>
            <p>Adresse: <?php echo $singleEtudiant -> getAdresse() ?></p>
            <p>Code Postal: <?php echo $singleEtudiant -> getCodePostal() ?></p>
            <p>Pays: <?php echo $singleEtudiant -> getPays() ?></p>
            <h3>Données de formation</h3>
            <p>Niveau: <?php echo $singleEtudiant -> getNiveau() ?></p>
            <p>Cours suivis: <?php echo implode(', ', $singleEtudiant -> getCoursSuivis()) ?></p>
            <p>Date d'inscription: <?php echo $singleEtudiant -> getDateInscription() ?></p>
        </section>
        <section>
            <h2>Affichage étudiants</h2>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Prenom</th>
                        <th>Adresse</th>
                        <th>Code Postal</th>
                        <th>Pays</th>
                        <th>Date Inscription</th>
                        <th>Cours Suivis</th>
                        <th>Niveau</th>                        
                    </tr>
                </thead>
                <tbody>
                    <?php

                        //boucle sur l'object ISL\Person donc pour récupérer les valeur appel des getter de la class Person
                    foreach($etudiants as $etudiant) {
                        echo "<tr>";
                        echo "<td>".$etudiant->getNom()."</td>";
                        echo "<td>".$etudiant->getPrenom()."</td>";
                        echo "<td>".$etudiant->getAdresse()."</td>";
                        echo "<td>".$etudiant->getCodePostal()."</td>";
                        echo "<td>".$etudiant->getPays()."</td>";
                        echo "<td>".$etudiant->getDateInscription()."</td>";
                        echo "<td>".implode(', ', $etudiant->getCoursSuivis())."</td>";
                        echo "<td>".$etudiant->getNiveau()."</td>";                        
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
        </section>
        <section>
            <h2>Affichage de l'enseignant avec ID <?php echo $singleEnseignant -> getID() ?></h2>
            <h3>Données personnelles</h3>
            <p>Nom: <?php echo $singleEnseignant -> getNom() ?></p>
            <p>Prenom: <?php echo $singleEnseignant -> getPrenom() ?></p>
            <p>Adresse: <?php echo $singleEnseignant -> getAdresse() ?></p>
            <p>Code Postal: <?php echo $singleEnseignant -> getCodePostal() ?></p>
            <p>Pays: <?php echo $singleEnseignant -> getPays() ?></p>
            <h3>Données de formation</h3>
            <p>Date d'entrée: <?php echo $singleEnseignant -> getDateEntree() ?></p>
            <p>Anciennete: <?php echo $singleEnseignant -> getAnciennete() ?></p>
            <p>Cours donnés: <?php echo implode(', ', $singleEnseignant -> getCoursDonnes()) ?></p>            
        </section>
        <section>
            <h2>Affichage enseignants</h2>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Prenom</th>
                        <th>Adresse</th>
                        <th>Code Postal</th>
                        <th>Pays</th>
                        <th>Date Entrée</th>
                        <th>Ancienneté</th>
                        <th>Cours Donnés</th>                       
                    </tr>
                </thead>
                <tbody>
                    <?php

                        //boucle sur l'object ISL\Person donc pour récupérer les valeur appel des getter de la class Person
                    foreach($enseignants as $enseignant) {
                        echo "<tr>";
                        echo "<td>".$enseignant->getNom()."</td>";
                        echo "<td>".$enseignant->getPrenom()."</td>";
                        echo "<td>".$enseignant->getAdresse()."</td>";
                        echo "<td>".$enseignant->getCodePostal()."</td>";
                        echo "<td>".$enseignant->getPays()."</td>";
                        echo "<td>".$enseignant->getDateEntree()."</td>";                        
                        echo "<td>".$enseignant->getAnciennete()."</td>";                        
                        echo "<td>".implode(', ', $enseignant->getCoursDonnes())."</td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
        </section>        
    </body>
</html>
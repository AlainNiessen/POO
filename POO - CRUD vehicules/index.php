<?php

 include_once("Vehicule.php");
 include_once("VehiculeManager.php");

//définition et création de la connexion BD
 $connexion = new PDO('mysql:host=localhost;dbname=poo_php', 'root', '');
 $vehiculeManager = new VehiculeManager($connexion);
 

 // 1) création nouvelle voiture TEST
 //a) instanciation d'un object "renault" via new Vehicule
        // $renault = new Vehicule(null, "Renault", "Clio", 5, 200);
 //b) appel de la fonction create dans la classe Vehiculemanager avec l'object renault comme paramètre
        // $vehiculeManager -> create($renault);



 // 2 )lire un vehicule TEST
        //  $voitureDeTest = $vehiculeManager -> read(3);
        //  var_dump($voitureDeTest);



// 3 )lire tous les vehicules TEST
        //  $listeVoitures = $vehiculeManager -> readAll();
        //  var_dump($listeVoitures);



 // 4) update un vehicule TEST
 //a) lire un vehicule qu'on veut modifier
        // $voitureUpdate = $vehiculeManager -> read(2);
 //b) modification
        // $voitureUpdate -> setMarque('Ferrari');
        // $voitureUpdate -> setModele('F16');
 //c) Update
        //$vehiculeManager -> update($voitureUpdate);



// 5) delete un vehicule TEST
        // $vehiculeManager -> delete(10);
        // $vehiculeManager -> delete(9);


 
 






?>
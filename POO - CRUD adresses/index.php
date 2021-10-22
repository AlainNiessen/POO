<?php

 include_once("Adresse.php");
 include_once("AdresseManager.php");

//définition et création de la connexion BD
 $connexion = new PDO('mysql:host=localhost;dbname=poo_adresses', 'root', '');
 $adresseManager = new AdresseManager($connexion);

 $adresse = new Adresse(null, "rue de Blabla", "14", "4700", "Eupen", "Belgique");
 $adresse -> afficherAdresse();
 

 // 1) création nouvelle adresse TEST
 //a) instanciation d'un object 
      // $adresseNew = new Adresse(null, "Rue de Test", "100", "4000", "Liege", "Belgique");
 //b) appel de la fonction create dans la classe Adressemanager avec l'object comme paramètre
      // $adresseManager -> create($adresseNew);



 // 2 )lire une adresse TEST
      // $adresseRead = $adresseManager -> read(1);
      // var_dump($adresseRead);



// 3 )lire tous les adresses TEST
      // $listeAdresses = $adresseManager -> readAll();
      // var_dump($listeAdresses);



 // 4) update une adresse TEST
 //a) lire une adresse qu'on veut modifier
      // $adresseUpdate = $adresseManager -> read(1);
 //b) modification
      // $adresseUpdate -> setRue('Rue de BliBlaBlu');
      // $adresseUpdate -> setNumero('150');
      // $adresseUpdate -> setCodePostal('1500');
 //c) Update
      // $adresseManager -> update($adresseUpdate);



// 5) delete un vehicule TEST
      // $adresseManager -> delete(1);
      // $adresseManager -> delete(2);


 
 






?>
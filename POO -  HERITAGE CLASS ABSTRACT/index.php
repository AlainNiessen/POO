<?php


include_once("Avion.php");
include_once("Velo.php");
include_once("Bateau.php");


use ExempleAbstract\Avion;
use ExempleAbstract\Velo;
use ExempleAbstract\Bateau;

$voiture_bateau = new Bateau("rouge", "12 métres", "120 km/h"); 
$voiture_bateau -> welcome();
$voiture_bateau -> colorer();



echo "</br>";

$voiture_velo = new Velo("bleu", "1.5 métres", "20 km/h");
$voiture_velo -> colorer();
$voiture_velo -> rouler();

echo "</br>";

$voiture_avion = new Avion("blanc", "120 métres", "250 km/h");
$voiture_avion -> colorer();

?>
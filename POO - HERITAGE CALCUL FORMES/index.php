<?php

include_once('point.php');
include_once('rectangle.php');
include_once('cercle.php');
include_once('carre.php');

use CalculForme\Point2D;
use CalculForme\Rectangle;
use CalculForme\Cercle;
use CalculForme\Carre;

//TEST
//Rectangle
echo '<h2>Forme Rectangle</h2>';
$center1 = new Point2D(2,3);
$rectangle = new Rectangle($center1,2,1);
echo $rectangle;

echo '<br/>';
echo '<br/>';

//CERCLE AVEC BOUGER
echo '<h2>Forme Cercle</h2>';
$center2 = new Point2D(1,2);
$cercle = new Cercle($center2,2);
echo $cercle;

echo '<br/>';

echo '<h3>Forme Cercle après mouvement du centre</h3>';
$center2 -> bouger(2,1);
echo $cercle;

echo '<br/>';
echo '<br/>';

//CARRE
echo '<h2>Forme Carré</h2>';
$center3 = new Point2D(3,3);
$carre = new Carre($center3,1);
echo $carre;

?>
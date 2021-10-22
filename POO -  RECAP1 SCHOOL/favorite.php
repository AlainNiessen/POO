<?php
 
 namespace School;

 class Favorite {

    //ATTRIBUTS
    protected $favoriteColor;
    protected $favoriteFood;
    protected $favoriteAnimal;
    
    //CONSTRUCTOR
    public function __construct($favoriteColor, $favoriteFood, $favoriteAnimal) {
        $this -> setFavoriteColor($favoriteColor);
        $this -> setFavoriteFood($favoriteFood);
        $this -> setFavoriteAnimal($favoriteAnimal);
    }

    //SETTERS
    public function setFavoriteColor ($favoriteColor) {
        $this -> favoriteColor = ucfirst($favoriteColor);
    }
    public function setFavoriteFood ($favoriteFood) {
        $this -> favoriteFood = ucfirst($favoriteFood);
    }
    public function setFavoriteAnimal ($favoriteAnimal) {
        $this -> favoriteAnimal = ucfirst($favoriteAnimal);
    }

    //GETTERS
    public function getFavoriteColor () {
        return $this -> favoriteColor;
    }
    public function getFavoriteFood () {
        return $this -> favoriteFood;
    }
    public function getFavoriteAnimal () {
        return $this -> favoriteAnimal;
    }
 }

?>
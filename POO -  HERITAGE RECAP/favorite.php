<?php
 
 namespace School;

 class Favorite {

    //ATTRIBUTS
    protected $favoriteColor;
    protected $favoriteFood;
    protected $favoriteAnimal;
    
    //CONSTRUCTOR
    public function __construct($favoriteColor, $favoriteFood, $favoriteAnimal) {
        $this -> favoriteColor  = $favoriteColor;
        $this -> favoriteFood   = $favoriteFood;
        $this -> favoriteAnimal = $favoriteAnimal;
    }

    //SETTERS
    public function setFavoriteColor ($favoriteColor) {
        $this -> favoriteColor = $favoriteColor;
    }
    public function setFavoriteFood ($favoriteFood) {
        $this -> favoriteFood = $favoriteFood;
    }
    public function setFavoriteAnimal ($favoriteAnimal) {
        $this -> favoriteAnimal = $favoriteAnimal;
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
<?php

namespace ISL\Entity;

use Faker\Factory;
use ISL\Entity\Personne;


class FakerPersonne {

    private $faker;

    public function __construct () {
        $this -> faker = Factory::create();
    }

    public function managePerson ($nombre) {
        
        $tabPersonnes = [];
        
        for ($i = 1; $i <= $nombre; $i++) {            
            
            $newPersonne = new Personne (null, $this->faker->lastName, $this->faker->firstName($gender=null), $this->faker->address, $this->faker->postcode, $this->faker->country, $this->faker->company);
            $newPersonne->hello="hello";
            array_push($tabPersonnes, $newPersonne);
        }

        return $tabPersonnes;
        

    }
    


}



?>
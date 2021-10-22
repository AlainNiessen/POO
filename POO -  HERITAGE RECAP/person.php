<?php

namespace School;

abstract class Person {

    //ATTRIBUTS
    protected $name;
    protected $firstName;
    protected $age;
    protected $gender;
    protected $species;
    private static $profile = "Person";
    

    //CONSTRUCTOR
    public function __construct ($name, $firstName, $age, $gender, $species = "human") {
        $this -> name       = $name;
        $this -> firstName  = $firstName;
        $this -> age        = $age;
        $this -> gender     = $gender;
        $this -> species    = $species;
        
    }

    //SETTERS 
    public function setName ($name) {
        $this -> name = $name;
    }
    public function setFirstName ($firstName) {
        $this -> firstName = $firstName;
    }
    public function setAge ($age) {      
        $this -> age = $age;            
    }
    public function setGender ($gender) {      
        $this -> gender = $gender;            
    }
    public function setSpecies ($species) {
        $this -> species = $species;
    }
    

    //GETTERS 
    public function getName () {
        return strtoUpper($this -> name);
    }
    public function getFirstName () {
        return ucfirst($this -> firstName);
    }
    public function getAge () {
        if($this -> age >= 0 && $this -> age <= 100) {
            return $this -> age;
        } else {
            return "No valid age (must be 0-100)";
        }        
    }
    public function getGender () {
        if($this -> gender === "female" || $this -> gender === "male" || $this -> gender === "other") {
            return $this -> gender;
        } else {
            return "No valid gender (must be male/female/other)";
        }        
    }
    public function getSpecies () {
        return $this -> species;
    }

    //FULL NAME
    public function getFullName () {
        return $this -> getName().' '.$this -> getFirstName();
    }

    //SELF FOR DISPLAY GENERAL PROFILE IN CHILDREN
    public function getParentProfile() {
        return self::$profile;
    }
    //STATIC FOR DISPLAY SPECIFIC PROFILE IN CHILDREN (student, teacher,...)
    public function getChildrenProfile() {
        return static::$profile;
    }

    //SET OF FAVORITES 
    public function setFavorites (Favorite $favorites) {
        $this -> favorites = $favorites;        
    }
    //BUILDING STRING  BASED ON FAVORITE OBJECT AND ITS METHODS
    public function getFavorites () {

        $favorites = $this -> favorites;

        $favoriteInfo = "";
        $favoriteInfo = "   <p>Color: ".$favorites -> getFavoriteColor()."</p>
                            <p>Food: ".$favorites ->  getFavoriteFood()."</p>
                            <p>Animal: ".$favorites ->  getFavoriteAnimal()."</p>
                        ";

        return $favoriteInfo;
    }

    //SET OF LESSON - GRADE
    public function setLessons (Lesson $lessons) {
        $this -> lessons = $lessons;        
    }

    //BUILDING STRING  BASED ON LESSON OBJECT AND ITS METHODS
    public function getLessons () {

        $lessons = $this -> lessons;

        $lessonsInfo = "";
        $lessonsInfo = "    <p>".$lessons -> getLesson1()."</p>
                            <p>".$lessons -> getLesson2()."</p>
                            <p>".$lessons -> getLesson3()."</p>
                        ";
        return $lessonsInfo;
    }

    //DISPLAY COLOR INFORMATIONS
    public static function displayColorInfo () {

        echo "  <h3>Colors</h3>
                <p>BLUE = Gender Male</p>
                <p>PINK = Gender Female</p>
                <p>GREEN = Gender Other</p>
                <p>YELLOW = No valid gender</p>
            ";
    }
    

    //FINAL DISPLAY
    public function displayPerson () {
        //DEFINITION VARIABLES DISPLAY
        $completeInfo = "";
        $genderStyle = "";
        $errorStyleAge = "";
        $errorStyleGender = "";
        $standartBoxStyle = "width:400px;padding:20px;margin:0 auto 10px auto;text-align:center";
        
        //GENDER STYLE + ERROR GENDER STYLE
        if($this -> gender === "male") {
            $genderStyle = 'style="background-color:lightblue;'.$standartBoxStyle.'"';
        } else if($this -> gender === "female") {
            $genderStyle = 'style="background-color:lightpink;'.$standartBoxStyle.'"';
        } else if($this -> gender === "other") {
            $genderStyle = 'style="background-color:lightgreen;'.$standartBoxStyle.'"';
        } else {
            $genderStyle = 'style="background-color:yellow;'.$standartBoxStyle.'"';
            $errorStyleGender = 'style="color:red"';
        }

        //ERROR AGE STYLE
        if($this -> age < 0 || $this -> age > 100) {
            $errorStyleAge = 'style="color:red"';
        }

        // DISPLAY
        if($this -> species === "human") { 
            
            $displayLesson = "";

            if($this -> getChildrenProfile() === "Student") {
                $displayLesson = "<h3>Lessons and Grades</h3>
                                  ".$this -> getLessons();
            }

            $completeInfo = "   <div ".$genderStyle.">
                                    <h2 style='text-align:center'>Name: ".$this -> getFullName()."</h2>
                                    <h3 ".$errorStyleAge.">Age: ".$this -> getAge()."</h3>
                                    <h3 ".$errorStyleGender.">Gender: ".$this -> getGender()."</h3>
                                    <p>General Profile: ".$this -> getParentProfile()."</p>                                
                                    <p>Specific Profile: ".$this -> getChildrenProfile()."</p>                               
                                    <h3>Personal favorites: </h3>
                                    ".$this -> getFavorites()."</br>
                                    ".$displayLesson."                                   
                                </div>
                            ";
        } else {

            $completeInfo = '<h1 style="color:red;margin:0 auto 10px auto;text-align:center">Nice try but it seems that '.$this -> getFullName().' isn\'t human!</h1>';
        }

        echo $completeInfo;
    }
}

?>
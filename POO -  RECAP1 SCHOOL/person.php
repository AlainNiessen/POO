<?php

namespace School;

abstract class Person {
    //ATTRIBUTS
    protected $name;
    protected $firstName;
    protected $age;
    protected $gender;
    private static $profile = "Person";
    

    //CONSTRUCTOR
    public function __construct ($name, $firstName, $age, $gender) {
        $this -> setName($name);
        $this -> setFirstName($firstName);
        $this -> setAge($age);
        $this -> setGender($gender);        
    }

    //SETTERS 
    public function setName ($name) {
        $this -> name = strtoupper($name);
    }
    public function setFirstName ($firstName) {
        $this -> firstName = ucfirst($firstName);
    }
    public function setAge ($age) {
        $display = "";

        if($age >= 0 && $age <= 100) {
            $display .= '<p>AGE: '.$age.'</p>';
        } else {
            $display .= '<p class="error">AGE: NO VALID (0-100)</p>';
        } 
        
        $this -> age = $display;
    }
    public function setGender ($gender) {
        $display = "";
        $tabGender = ['male', 'female', 'other'];

        if(in_array(strtolower($gender), $tabGender)) {
            $display .= '<p>GENDER: '.$gender.'</p>';
        } else {
            $display .=  '<p class="error">GENDER: NO VALID (MALE | FEMALE | OTHER)</p>';
        } 
        
        $this -> gender = $display;
    }        

    //GETTERS 
    public function getName () {
        return $this -> name;
    }
    public function getFirstName () {
        return $this -> firstName;
    }
    public function getAge () {
        return $this -> age;             
    }
    public function getGender () {
        return $this -> gender;    
    }
    
    //FULL NAME
    public function fullName () {
        return '<h2>'.$this -> getName().' '.$this -> getFirstName().'</h2>';
    }

    //SELF FOR DISPLAY GENERAL PROFILE IN CHILDREN
    public function getParentProfile() {
        return '<p>GENERAL PROFILE: '.self::$profile.'</p>';
    }
    //STATIC FOR DISPLAY SPECIFIC PROFILE IN CHILDREN (student, teacher,...)
    public function getChildrenProfile() {
        return '<p>SPECIFIC PROFILE: '.static::$profile.'</p>';
    }

    //FAVORITES
    //SET 
    public function setFavorites (Favorite $favorites) {
        $display = "";

        $display .= "   <p>COLOR: ".$favorites -> getFavoriteColor()."</p>
                        <p>FOOD: ".$favorites ->  getFavoriteFood()."</p>
                        <p>ANIMAL: ".$favorites ->  getFavoriteAnimal()."</p>
                    "; 
        
        $this -> favorites = $display;
    }
    //GET 
    public function getFavorites () {
        return $this -> favorites;
    }

    //LESSONS
    //1) STUDENTS WITH GRADES
    //SET => TABLE WITH LESSON OBJECTS 
    public function setLessonsStudent ($tabLessons) { 
        $display = "";

        if(sizeof($tabLessons) > 0) {
            foreach($tabLessons as $lesson) {
                $display .= $lesson -> grading();
            }
        } else {
            $display .= '<p class="error">NO LESSONS FOR THIS STUDENT</p>';
        }        
        
        $this -> lesson = $display;
    }  
    
    //GET 
    public function getLessonsStudent() {
        return $this -> lesson;
    }

    //2) TEACHERS ONLY LESSON
    //SET => TABLE WITH LESSON OBJECTS
    public function setLessonsTeacher ($tabLessons) {              
        $display = "";  

        if(sizeof($tabLessons) > 0) {
            foreach($tabLessons as $lesson) {
                $display .= $lesson -> displayLessons();            
            }        
        } else {
            $display .= '<p class="error">NO LESSONS FOR THIS TEACHER</p>';
        }
        
        $this -> lesson = $display;
    }  
    
    //GET 
    public function getLessonsTeacher() {        
        return $this -> lesson;
    }

    //DISPLAY COLOR INFORMATIONS
    public static function displayColorInfo () {

        echo "  <p>BLUE = Gender Male</p>
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
        $displayLessons = "";        
        
        //GENDER STYLE => COLOR STYLE
        if($this -> gender === '<p>GENDER: male</p>') {
            $genderStyle = 'class="male"';
        } else if($this -> gender === '<p>GENDER: female</p>') {
            $genderStyle = 'class="female"';
        } else if($this -> gender === '<p>GENDER: other</p>') {
            $genderStyle = 'class="other"';
        } else {
            $genderStyle = 'class="noGender"';
        }        

        //WHEN PROFILE STUDENT => DISPLAY LESSONS AND GRADES --- WHEN PROFILE TEACHER => DISPLAY ONLY LESSONS
        if($this -> getChildrenProfile() === "<p>SPECIFIC PROFILE: Student</p>") {
            $displayLessons .= '<h3>Lessons and Grades</h3>';
            $displayLessons .= $this -> getLessonsStudent();                          
        } else if (($this -> getChildrenProfile() === "<p>SPECIFIC PROFILE: Teacher</p>")) {
            $displayLessons .= '<h3>Lessons</h3>';
            $displayLessons .= $this -> getLessonsTeacher(); 
        }

        // DISPLAY
        $completeInfo = "   <div ".$genderStyle.">"
                                .$this -> fullName()."
                                <h3>Personal Information</h3>"                                
                                .$this -> getAge()
                                .$this -> getGender()
                                .$this -> getParentProfile()                                
                                .$this -> getChildrenProfile()."                              
                                <h3>Personal favorites: </h3>"
                                .$this -> getFavorites()                                
                                .$displayLessons."                                   
                            </div>
                        ";
        

        echo $completeInfo;
    }
}

?>
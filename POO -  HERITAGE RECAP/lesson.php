<?php

namespace School;

class Lesson {
    //ATTRIBUTS
    protected $lesson1;
    protected $lesson2; 
    protected $lesson3;
    protected $grade1;
    protected $grade2;
    protected $grade3;
    

    //CONSTRUCTOR WITH GRADE CONTROL (0-20)
    public function __construct ($grade1, $grade2, $grade3, $lesson1 = "Javascript", $lesson2 = "PHP", $lesson3 = "HTML") {
        
        if($grade1 >= 0 && $grade1 <= 20) {
            $this -> lesson1 = "<p>".$lesson1.": ".$grade1."/20</p>";
        } else {
            $this -> lesson1 = "<p style='color:red'>".$lesson1.": no valid grade (must be 0-20)</p>";
        } 

        if($grade2 >= 0 && $grade2 <= 20) {
            $this -> lesson2 = "<p>".$lesson2.": ".$grade2."/20</p>";
        } else {
            $this -> lesson2 = "<p style='color:red'>".$lesson2.": no valid grade (must be 0-20)</p>";
        }  

        if($grade3 >= 0 && $grade3 <= 20) {
            $this -> lesson3 = "<p>".$lesson3.": ".$grade3."/20</p>";
        } else {
            $this -> lesson3 = "<p style='color:red'>".$lesson3.": no valid grade (must be 0-20)</p>";
        }    
        
        
    }

    //SETTERS WITH GRADE CONTROL (0-20)
    public function setLesson1 ($grade1, $lesson1 = "Javascript") {

        if($grade1 >= 0 && $grade1 <= 20) {
            $this -> lesson1 = "<p>".$lesson1.": ".$grade1."/20</p>";
        } else {
            $this -> lesson1 = "<p style='color:red'>".$lesson1.": no valid grade (must be 0-20)</p>";
        } 
    }
    public function setLesson2 ($grade2, $lesson2 = "PHP") {
        if($grade2 >= 0 && $grade2 <= 20) {
            $this -> lesson2 = "<p>".$lesson2.": ".$grade2."/20</p>";
        } else {
            $this -> lesson2 = "<p style='color:red'>".$lesson2.": no valid grade (must be 0-20)</p>";
        }  
    }
    public function setLesson3 ($grade3, $lesson3 = "HTML") {
        if($grade3 >= 0 && $grade3 <= 20) {
            $this -> lesson3 = "<p>".$lesson3.": ".$grade3."/20</p>";
        } else {
            $this -> lesson3 = "<p style='color:red'>".$lesson3.": no valid grade (must be 0-20)</p>";
        }    
    }

    //GETTERS
    public function getLesson1 () {
        return $this -> lesson1;      
        
    }
    public function getLesson2 () {
        return $this -> lesson2; 
    }
    public function getLesson3 () {
        return $this -> lesson3;
    }
    
    
}



?>
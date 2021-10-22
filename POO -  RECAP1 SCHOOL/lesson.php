<?php

namespace School;

class Lesson {
    //ATTRIBUTS
    protected $lesson;  
    protected $grade; 

    //CONSTRUCTOR 
    public function __construct ($lesson, $grade = false) {
        $this -> setLesson($lesson);
        $this -> setGrade($grade);        
    }

    //SETTERS 
    public function setLesson ($lesson) {
        $tabLessons = ['javascript', 'html', 'php', 'framework', 'css'];
        if(in_array(strtolower($lesson), $tabLessons)) {
            $this -> lesson = strtoupper($lesson);
        } else {
            $this -> lesson = false;
        }
    }     
    public function setGrade ($grade) {
        if ($grade >= 0 && $grade <= 100) {
            $this -> grade = $grade;
        } else {
            $this -> grade = false;
        }
    }

    //GETTERS
    public function getLesson () {
        return $this -> lesson;                
    }
    public function getGrade () {        
        return $this -> grade;        
    }

    //GRADING LESSON STUDENTS
    public function grading() {
        if($this -> getLesson() !== false && $this -> getGrade() !== false) {
            return '<p>'.strtoupper($this -> getLesson()).': '.$this -> getGrade().'</p>';           
        } else if ($this -> getLesson() !== false && $this -> getGrade() === false) {
            return '<p class="error">'.strtoupper($this -> getLesson()).': NO VALID GRADE</p>'; 
        } else {
            return '<p class="error">NO VALID LESSON</p>';
        }              
    }   

    //LESSONS TEACHER
    public function displayLessons() {        
        if($this -> getLesson() !== false && $this -> getGrade() === false) {
            return '<p>'.strtoupper($this -> getLesson()).'</p>';           
        } else {
            return '<p class="error">NO VALID LESSON.</p>';
        }  
    }
}

?>
<?php

include_once("favorite.php");
include_once("student.php");
include_once("teacher.php");
include_once("lesson.php");
include_once("person.php");

use School\Student;
use School\Favorite;
use School\Teacher;
use School\Lesson;
use School\Person;


//1) STUDENTS
//STUDENT1
//INITIATION NEW STUDENT
$student1 = new Student("niessen", "alain", 42, "male");
//INITIATION NEW FAVORITES
$student1Fav = new Favorite("red", "Indian", "Cat");
$student1 -> setFavorites($student1Fav);
//INITIATION LESSONS AND GRADES
$tabLessonsStudent1 = [];
$student1lesson1 = new Lesson('Javascript', 80);
array_push($tabLessonsStudent1, $student1lesson1);
$student1lesson2 = new Lesson('Php', 110);
array_push($tabLessonsStudent1, $student1lesson2);
$student1 -> setLessonsStudent($tabLessonsStudent1);
//STUDENT1 COMPLETE 

//STUDENT2
//INITIATION NEW STUDENT
$student2 = new Student("leclerq", "jean-marie", 39, "male");
//INITIATION NEW FAVORITES
$student2Fav = new Favorite("green", "Italien", "Spider");
$student2 -> setFavorites($student2Fav);
//INITIATION LESSONS AND GRADES
$tabLessonsStudent2 = [];
$student2lesson1 = new Lesson('Javascript', 73);
array_push($tabLessonsStudent2, $student2lesson1);
$student2lesson2 = new Lesson('html', 68);
array_push($tabLessonsStudent2, $student2lesson2);
$student2lesson3 = new Lesson('Php', 64);
array_push($tabLessonsStudent2, $student2lesson3);
$student2 -> setLessonsStudent($tabLessonsStudent2);
//STUDENT2 COMPLETE (TEST: EVERYTHING OK)

//STUDENT3
//INITIATION NEW STUDENT
$student3 = new Student("dubois", "marie", 39, "female");
//INITIATION NEW FAVORITES
$student3Fav = new Favorite("blue", "Spaghetti", "Dog");
$student3 -> setFavorites($student3Fav);
//INITIATION LESSONS AND GRADES
$tabLessonsStudent3 = [];
$student3lesson1 = new Lesson('java', 73);
array_push($tabLessonsStudent3, $student3lesson1);
$student3lesson2 = new Lesson('css', 15);
array_push($tabLessonsStudent3, $student3lesson2);
$student3lesson3 = new Lesson('javascript', 64);
array_push($tabLessonsStudent3, $student3lesson3);
$student3 -> setLessonsStudent($tabLessonsStudent3);
//STUDENT3 COMPLETE (TEST: NO VALID LESSON 'java')

//STUDENT4
//INITIATION NEW STUDENT
$student4 = new Student("Delarue", "joseph", 26, "other");
//INITIATION NEW FAVORITES
$student4Fav = new Favorite("pink", "Steak", "Horse");
$student4 -> setFavorites($student4Fav);
//INITIATION LESSONS AND GRADES
$tabLessonsStudent4 = [];
$student4lesson1 = new Lesson('framework', 69);
array_push($tabLessonsStudent4, $student4lesson1);
$student4lesson2 = new Lesson('css', 35);
array_push($tabLessonsStudent4, $student4lesson2);
$student4lesson3 = new Lesson('javascript', 67);
array_push($tabLessonsStudent4, $student4lesson3);
$student4 -> setLessonsStudent($tabLessonsStudent4);

//STUDENT 4 COMPLETE


//2) TEACHERS
//TEACHER1
//INITIATION NEW TEACHER
$teacher1 = new Teacher("martel", "alain", 120, "male");
//INITIATION NEW FAVORITES
$teacher1Fav = new Favorite("green", "Moules", "Horse");
$teacher1 -> setFavorites($teacher1Fav);
//INITIATION LESSON
$tabLessonsTeacher1 = [];
$teacher1lesson1 = new Lesson('javascript');
array_push($tabLessonsTeacher1, $teacher1lesson1);
$teacher1lesson2 = new Lesson('css');
array_push($tabLessonsTeacher1, $teacher1lesson2);
$teacher1 -> setLessonsTeacher($tabLessonsTeacher1);

//TEACHER1 COMPLETE

//TEACHER2
//INITIATION NEW TEACHER
$teacher2 = new Teacher("dupont", "jean", 120, "male");
//INITIATION NEW FAVORITES
$teacher2Fav = new Favorite("yellow", "Frittes", "Pig");
$teacher2 -> setFavorites($teacher2Fav);
//INITIATION LESSON
$tabLessonsTeacher2 = [];
$teacher2 -> setLessonsTeacher($tabLessonsTeacher2);
//TEACHER2 COMPLETE

//TEACHER3
//INITIATION NEW TEACHER
$teacher3 = new Teacher("cloth", "francine", 73, "female");
//INITIATION NEW FAVORITES
$teacher3Fav = new Favorite("green", "Potatoes", "Horse");
$teacher3 -> setFavorites($teacher3Fav);
//INITIATION LESSON
$tabLessonsTeacher3 = [];
$teacher3lesson1 = new Lesson('javascript');
array_push($tabLessonsTeacher3, $teacher3lesson1);
$teacher3lesson2 = new Lesson('css');
array_push($tabLessonsTeacher3, $teacher3lesson2);
$teacher3lesson3 = new Lesson('sass');
array_push($tabLessonsTeacher3, $teacher3lesson3);
$teacher3 -> setLessonsTeacher($tabLessonsTeacher3);
//TEACHER3 COMPLETE

//TEACHER4
//INITIATION NEW TEACHER
$teacher4 = new Teacher("lechef", "philippe", 35, "other");
//INITIATION NEW FAVORITES
$teacher4Fav = new Favorite("black", "Fish", "Fish");
$teacher4 -> setFavorites($teacher4Fav);
//INITIATION LESSON
$tabLessonsTeacher4 = [];
$teacher4lesson1 = new Lesson('javascript');
array_push($tabLessonsTeacher4, $teacher4lesson1);
$teacher4lesson2 = new Lesson('css');
array_push($tabLessonsTeacher4, $teacher4lesson2);
$teacher4lesson3 = new Lesson('php');
array_push($tabLessonsTeacher4, $teacher4lesson3);
$teacher4 -> setLessonsTeacher($tabLessonsTeacher4);
//TEACHER4 COMPLETE

//TABLE WITH OBJECTS STUDENTS AND TEACHER => LOOP FOR DISPLAY
$tabStudents = [$student1, $student2, $student3, $student4];
$tabTeachers = [$teacher1, $teacher2, $teacher3, $teacher4];


?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link rel="stylesheet" href="screen.css" type="text/css">
    </head>
    <body>
        <?php
        //display color informations => TESTING STATIC FUNCTIONS
        Person::displayColorInfo();
        ?>
        <section class="students">
        <h2 class="sectionTitle">Students</h2>
            <?php
                foreach($tabStudents as $student) {
                    $student -> displayPerson();
                }                
            ?>                       
        </section>
        <section class="teachers">
            <h2 class="sectionTitle">Teachers</h2>
            <?php
                foreach($tabTeachers as $teacher) {
                    $teacher -> displayPerson();
                }
            ?>
        </section>        
    </body>
</html>
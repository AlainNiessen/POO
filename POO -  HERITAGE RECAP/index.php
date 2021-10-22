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

//definition of children classes based on main class Person
//1) students
$student1 = new Student("niessen", "alain", 42, "male");
$student1Fav = new Favorite("red", "Indian", "Cat");
$student1lessons = new Lesson(35, 7, 16);
$student1 -> setLessons($student1lessons);
$student1 -> setFavorites($student1Fav);

$student2 = new Student("gabriel", "pierre", 30, "male");
$student2Fav = new Favorite("blue", "Spaghetti", "Dog");
$student2lessons = new Lesson(3, 17, 11);
$student2 -> setLessons($student2lessons);
$student2 -> setFavorites($student2Fav);

$student3 = new Student("exemple", "Marie", 34, "female");
$student3Fav = new Favorite("pink", "Gulash", "Snake");
$student3lessons = new Lesson(0, 17, 26);
$student3 -> setLessons($student3lessons);
$student3 -> setFavorites($student3Fav);

$student4 = new Student("exemple", "christophe", 30, "other");
$student4Fav = new Favorite("red", "Moules", "Dog");
$student4lessons = new Lesson(7, 7, 13);
$student4 -> setLessons($student4lessons);
$student4 -> setFavorites($student4Fav);


//2) teachers
$teacher1 = new Teacher("martel", "alain", 120, "male");
$teacher1Fav = new Favorite("green", "Steak", "Horse");
$teacher1 -> setFavorites($teacher1Fav);

$teacher2 = new Teacher("dupont", "jean", 60, "male", "animal");
$teacher2Fav = new Favorite("brown", "fish", "Mouse");
$teacher2 -> setFavorites($teacher2Fav);

$teacher3 = new Teacher("blabla", "Marie", 60, "female");
$teacher3Fav = new Favorite("yellow", "fish", "Cat");
$teacher3 -> setFavorites($teacher3Fav);

$teacher4 = new Teacher("lastone", "peter", 1000, "jenesaispas");
$teacher4Fav = new Favorite("brown", "potatoes", "bird");
$teacher4 -> setFavorites($teacher4Fav);


//creation object table
$tabPersons = [$student1, $student2, $student3, $student4, $teacher1, $teacher2, $teacher3, $teacher4];
//display color informations 
Person::displayColorInfo();
//looping all instanced objects for display informations
foreach($tabPersons as $person) {
    $person -> displayPerson();
}





?>
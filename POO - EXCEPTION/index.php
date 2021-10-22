<?php

include_once('operation.php');
include_once('somme.php');
include_once('division.php');
include_once('multiplication.php');
include_once('soustraction.php');
include_once('errorHandler.php');

use CalculOperation\Operation;
use CalculOperation\Somme;
use CalculOperation\Division;
use CalculOperation\Multiplication;
use CalculOperation\Soustraction;
use CalculOperation\ErrorHandler;

//FIRST 3 TESTS IN COMMENT BECAUSE OF TESTING ERRORHANDLER (EXTENDS ERROREXCEPTION)

//TESTING EXCEPTION WITH CLASS 'SOMME' => RESULT HAVE TO BE POSITIV

echo '<h2>TESTING CLASS SOMME WITH 2 ERRORS (INVALIDARGUMENTEXCEPTION AND EXCEPTION)';
echo '<h3>Testing positiv result</h3>';

//TEST 1

// $testSomme1 = new Somme(2, 3); 


// try {
//     echo $testSomme1 -> operate(); // RETURN SOMME
// } catch (InvalidArgumentException $exc) { //CATCHING THIS EXCEPTION ERROR MESSAGE BECAUSE OF NEGATIV RESULT
//     echo 'Code: '.$exc -> getCode().'<br/>';
//     echo 'File: '.$exc -> getFile().'<br/>';
//     echo 'Line: '.$exc -> getLine().'<br/>';
//     echo 'Message: '.$exc -> getMessage().'<br/>';
//     echo 'Previous: '.$exc -> getPrevious().'<br/>';
//     echo 'Trace: '.$exc -> getTraceAsString().'<br/>';
// } catch (Exception $exc) {
//     echo 'Code: '.$exc -> getCode().'<br/>';
//     echo 'File: '.$exc -> getFile().'<br/>';
//     echo 'Line: '.$exc -> getLine().'<br/>';
//     echo 'Message: '.$exc -> getMessage().'<br/>';
//     echo 'Previous: '.$exc -> getPrevious().'<br/>';
//     echo 'Trace: '.$exc -> getTraceAsString().'<br/>';
// }

echo '<br/>';
echo '<h3>Testing negativ result => WILL CATCH EXCEPTION</h3>';

//TEST 2
// $testSomme2 = new Somme(-2, -3);

// try {
//     echo $testSomme2 -> operate(); 
// } catch (InvalidArgumentException $exc) { 
//     echo 'Code: '.$exc -> getCode().'<br/>';
//     echo 'File: '.$exc -> getFile().'<br/>';
//     echo 'Line: '.$exc -> getLine().'<br/>';
//     echo 'Message: '.$exc -> getMessage().'<br/>';
//     echo 'Previous: '.$exc -> getPrevious().'<br/>';
//     echo 'Trace: '.$exc -> getTraceAsString().'<br/>';
// } catch (Exception $exc) { //CATCHING THIS EXCEPTION ERROR MESSAGE BECAUSE OF NEGATIV RESULT
//     echo 'Code: '.$exc -> getCode().'<br/>';
//     echo 'File: '.$exc -> getFile().'<br/>';
//     echo 'Line: '.$exc -> getLine().'<br/>';
//     echo 'Message: '.$exc -> getMessage().'<br/>';
//     echo 'Previous: '.$exc -> getPrevious().'<br/>';
//     echo 'Trace: '.$exc -> getTraceAsString().'<br/>';
// }

echo '<br/>';
echo '<h3>Testing string => WILL CATCH INVALIDARGUMENTEXCEPTION</h3>';

//TEST 2
// $testSomme3 = new Somme("a", -3);

// try {
//     echo $testSomme3 -> operate(); 
// } catch (InvalidArgumentException $exc) { //CATCHING THIS EXCEPTION ERROR MESSAGE BECAUSE OF NEGATIV RESULT
//     echo 'Code: '.$exc -> getCode().'<br/>';
//     echo 'File: '.$exc -> getFile().'<br/>';
//     echo 'Line: '.$exc -> getLine().'<br/>';
//     echo 'Message: '.$exc -> getMessage().'<br/>';
//     echo 'Previous: '.$exc -> getPrevious().'<br/>';
//     echo 'Trace: '.$exc -> getTraceAsString().'<br/>';
// } catch (Exception $exc) {
//     echo 'Code: '.$exc -> getCode().'<br/>';
//     echo 'File: '.$exc -> getFile().'<br/>';
//     echo 'Line: '.$exc -> getLine().'<br/>';
//     echo 'Message: '.$exc -> getMessage().'<br/>';
//     echo 'Previous: '.$exc -> getPrevious().'<br/>';
//     echo 'Trace: '.$exc -> getTraceAsString().'<br/>';
// }


//TESTING TYPE EXCEPTDIVISION OF EXCEPTION WITH CLASS DIVISION (EXCEPTDIVISION EXTENDS EXCEPTION)
echo '<h2>TESTING CLASS DIVISION WITH TYPE EXCEPTDIVISION OF EXCEPTION</h2>';
echo '<h3> Testing second number is not 0</h3>';

//TEST 1
// $testDivision1 = new Division(1, 3);

// try {
//     echo $testDivision1 -> operate(); // RETURN DIVISION
// } catch (ExceptDivision $exc) {
//     echo $exc;
    
// }

echo '<br/>';
echo '<h3>Testing second number is 0</h3>';

//TEST 2
// $testDivision1 = new Division(20, 0);

// try {
//     echo $testDivision1 -> operate(); // CATCHING ERROR MESSAGE BECAUSE SECOND NUMBER IS 0
// } catch (ExceptDivision $exc) {
//     echo $exc;
// }

//TESTING INVALIDARGUMENTEXCEPTION AND MULTIPLE CATCH
echo '<h2>TESTING CLASS MULTIPLICATION WITH INVALIDARGUMENTEXCEPTION</h2>';
echo '<h3> Testing two numbers</h3>';

//TEST 1
// $testMultiplication1 = new Multiplication(1, 3);

// try {
//     echo $testMultiplication1 -> operate(); // TWO NUMBERS
// } catch (InvalidArgumentException $exc) {
//     echo 'Code: '.$exc -> getCode().'<br/>';
//     echo 'File: '.$exc -> getFile().'<br/>';
//     echo 'Line: '.$exc -> getLine().'<br/>';
//     echo 'Message: '.$exc -> getMessage().'<br/>';
//     echo 'Previous: '.$exc -> getPrevious().'<br/>';
//     echo 'Trace: '.$exc -> getTraceAsString().'<br/>';
// } catch (Exception $exc) {
//     echo "Exception générique : " . $exc->getMessage();
// }

echo '<br/>';
echo '<h3>Testing number and string</h3>';

//TEST 2
// $testMultiplication2 = new Multiplication("a", 3);

// try {
//     echo $testMultiplication2 -> operate(); // CATCHING ERROR MESSAGE BECAUSE OF STRING
// } catch (InvalidArgumentException $exc) {
//     echo 'Code: '.$exc -> getCode().'<br/>';
//     echo 'File: '.$exc -> getFile().'<br/>';
//     echo 'Line: '.$exc -> getLine().'<br/>';
//     echo 'Message: '.$exc -> getMessage().'<br/>';
//     echo 'Previous: '.$exc -> getPrevious().'<br/>';
//     echo 'Trace: '.$exc -> getTraceAsString().'<br/>';
// } catch (Exception $exc) {
//     echo "Exception générique : " . $exc->getMessage();
// }

//TESTING ERRORHANDLER (ERROREXCEPTION) AND SET_ERROR_HANDLER
echo '<h2>TESTING CLASS SOUSTRACTION WITH ERRORHANDLER</h2>';
echo '<h3>Testing result positiv</h3>';

//CREATING FUNCTION MANAGE ERROR
function manageError($code, $message, $fichier, $ligne){
    throw new ErrorHandler($message, $code, $code, $fichier, $ligne);
}

//SETTING ERROR HANDLING => WILL CALL MANAGEERROR FUNCTION WHO WILL THROW NEW ERRORHANDLER
set_error_handler('manageError');

//TEST 1
$soustraction1 = new Soustraction(100, 50);

try {
    echo $soustraction1 -> operate();
} catch (ErrorHandler $e) {
    echo $e;
}

echo '<br/>';
echo '<h3>Testing result négativ</h3>';

//TEST 2
$soustraction2 = new Soustraction(50, 60);

try {
    echo $soustraction2 -> operate();
} catch (ErrorHandler $e) {
    echo $e;
}


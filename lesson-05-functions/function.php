<?php

// Defining and calling a function
function WelcomeMsg($name) {
    echo "Hi $name, Welcome to the Faculty of Computer and IT";
}

// Mohamed and Abdi are arguments; $name is a parameter.
WelcomeMsg("Mohamed");
echo "<br>";
WelcomeMsg("Abdi");
echo "<br><br>";

// Function with a parameter
function factorial($n) {
    $result = 1;

    for ($i = 1; $i <= $n; $i++) {
        $result *= $i;
    }

    echo "The Factorial of $n = $result";
}

factorial(5);
echo "<br>";
$a = 6;
factorial($a);

echo "<br><br>";

// Returning a value
function factorialNumber($n) {
    $result = 1;

    for ($i = 1; $i <= $n; $i++) {
        $result *= $i;
    }

    return $result;
}

echo "The Factorial of 4 = " . factorialNumber(4);

echo "<br><br>";

// Passing and returning an array
$array1 = array(9, 3, 4, 7, 8, 5);

function PassArray($arr) {
    echo "The Passed Array: ";

    for ($i = 0; $i < count($arr); $i++) {
        echo "$arr[$i], ";
        $arr[$i]++;
    }

    return $arr;
}

$a = PassArray($array1);

echo "<br>The Returned Array: ";
foreach ($a as $v) {
    echo "$v, ";
}

echo "<br><br>";

// Passing by value
$n = 5;

function byvalue($a) {
    echo "The Passed Value: " . $a . "<br>";
    $a++;
    echo "The Current Value: " . $a . "<br>";
}

byvalue($n);
echo "The Value of N: " . $n . "<br>";

echo "<br>";

// Passing by reference
function byreference(&$a) {
    echo "The Passed Value: " . $a . "<br>";
    $a++;
    echo "The Current Value: " . $a . "<br>";
}

byreference($n);
echo "The Value of N: " . $n . "<br>";

echo "<br>";

// Default argument values
function sum($x = 3, $y = 5) {
    $total = $x + $y;
    echo "The Total Value of two numbers: " . $total . "<br>";
}

sum(4, 6);
sum(7);
sum();

echo "<br>";

// Local and global variables
$name = "Abdi";
$age = 20;

function test() {
    $address = "Hodan";
    global $name;

    echo "The Value of Local Variable(address) = " . $address . "<br>";
    echo "The Value of Global Variable(name) = " . $name . "<br>";
    echo "The Value of Global Variable(age) = " . $GLOBALS["age"] . "<br>";
}

test();

// $address cannot be used outside test() because it is local.
echo "The Value of Global Variable(name) = " . $name . "<br>";
echo "The Value of Global Variable(name) = " . $GLOBALS["name"] . "<br>";

echo "<br>";

// Static variable
function counter() {
    static $counter = 1;
    echo "The Current Value of Counter: " . $counter . "<br>";
    $counter++;
}

counter();
counter();
counter();
counter();

echo "<br>";

// Superglobal variables: $GLOBALS, $_GET, $_SESSION, $_FILES, $_SERVER
echo "Script Name: " . $_SERVER["SCRIPT_NAME"] . "<br>";

echo "<br>";

// Checking if a function exists
if (function_exists("factorial")) {
    echo "The factorial function exists.<br>";
}

echo "<br>";

// Including files in PHP
require_once("library.php");
libraryMessage();

// Other file inclusion statements:
// include "library.php";       // Continues with a warning if the file is missing.
// include_once "library.php";  // Includes the file only once.
// require "library.php";       // Stops if the required file is missing.
// require_once "library.php";  // Requires the file only once (used above).
// ../library.php means a file one folder above the current folder.

?>

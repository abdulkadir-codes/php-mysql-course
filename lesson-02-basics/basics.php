<?php

// Output
echo "This is an echo statement.<br>";
print "This is a print statement.<br>";
echo "Echo can output ", "more than one value.<br>";

// Quotes
$x = 5;
echo "Double quotes show the variable value: $x<br>";
echo 'Single quotes keep the variable name as text: $x';
echo "<br><br>";

// Variables and data types
$studentName = "Omar Ali";
$studentNumber = 200;
$isSingle = true;
$salary = 10.5;

echo "Student Name: $studentName<br>";
echo "Student Number: $studentNumber<br>";
echo "Single: $isSingle<br>";
echo "Salary: $salary<br>";

echo "<br>Data Types:<br>";
var_dump($studentNumber);
echo "<br>";
var_dump($studentName);
echo "<br>";
var_dump($isSingle);
echo "<br>";
var_dump($salary);

// Strings
$message = "Good Morning";
echo "<br><br>String length: " . strlen($message) . "<br>";

$text = "The quick brown fox jumps over the lazy dog";
echo "Word count: " . str_word_count($text) . "<br>";

// Constant
define("PI", 3.14);
$radius = 6;
$area = PI * $radius * $radius;

echo "Area of circle: $area";

?>

<?php

$x = 10;
$y = 4;

// Assignment and arithmetic
$total = $x + $y;
echo "Addition: $total<br>";
echo "Subtraction: " . ($x - $y) . "<br>";
echo "Multiplication: " . ($x * $y) . "<br>";
echo "Division: " . ($x / $y) . "<br>";
echo "Modulus: " . ($x % $y) . "<br>";

// Arithmetic assignment
$x += 2;
echo "After x += 2: $x<br>";

// Comparison
echo "x > y: ";
var_dump($x > $y);

echo "<br>x == y: ";
var_dump($x == $y);

// Logical
echo "<br>(x > y) && (y > 0): ";
var_dump(($x > $y) && ($y > 0));

// Concatenation
$firstName = "Abdi";
$lastName = "Omar";
echo "<br>Full Name: " . $firstName . " " . $lastName;

// Increment and decrement
echo "<br>Increment x: " . (++$x);
echo "<br>Decrement y: " . (--$y);

// Operator precedence
$result = 1 + 5 * 3 - (6 / 2);
echo "<br>Precedence result: $result";

?>

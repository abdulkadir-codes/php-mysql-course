<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>PHP Assignment 1</title>
</head>
<body>

<h1>PHP Assignment 1</h1>

<?php

// Question 1
echo "<h2>1. Greatest and Smallest of Three Numbers</h2>";

$a = 20;
$b = 15;
$c = 30;

$greatest = $a;
$smallest = $a;

if ($b > $greatest) {
    $greatest = $b;
}

if ($c > $greatest) {
    $greatest = $c;
}

if ($b < $smallest) {
    $smallest = $b;
}

if ($c < $smallest) {
    $smallest = $c;
}

echo "Greatest number: $greatest<br>";
echo "Smallest number: $smallest<br>";


// Question 2
echo "<h2>2. Divisible by 3, 5, Both, or None</h2>";

$number = 15;

if ($number % 3 == 0 && $number % 5 == 0) {
    echo "$number is divisible by both 3 and 5";
} elseif ($number % 3 == 0) {
    echo "$number is divisible by 3";
} elseif ($number % 5 == 0) {
    echo "$number is divisible by 5";
} else {
    echo "$number is not divisible by 3 or 5";
}


// Question 3
echo "<h2>3. Odd and Even Numbers</h2>";

echo "Odd numbers from 2 to 20:<br>";

for ($i = 2; $i <= 20; $i++) {
    if ($i % 2 != 0) {
        echo "$i ";
    }
}

echo "<br><br>Even numbers from 35 to 7:<br>";

for ($i = 35; $i >= 7; $i--) {
    if ($i % 2 == 0) {
        echo "$i ";
    }
}


// Question 4
echo "<h2>4. Numbers Divisible by 2 and 5</h2>";

for ($i = 50; $i >= 2; $i--) {
    if ($i % 2 == 0 && $i % 5 == 0) {
        echo "$i ";
    }
}


// Question 5
echo "<h2>5. Reverse of a Number</h2>";

$number = 12345;
$originalNumber = $number;
$reverse = 0;

while ($number > 0) {
    $digit = $number % 10;
    $reverse = ($reverse * 10) + $digit;
    $number = ($number - $digit) / 10;
}

echo "Original number: $originalNumber<br>";
echo "Reverse number: $reverse";


// Question 6
echo "<h2>6. Lowest Common Multiplier (LCM)</h2>";

$a = 8;
$b = 12;

if ($a > $b) {
    $lcm = $a;
} else {
    $lcm = $b;
}

while ($lcm % $a != 0 || $lcm % $b != 0) {
    $lcm++;
}

echo "LCM of $a and $b is $lcm";


// Question 7
echo "<h2>7. Highest Common Factor (HCF)</h2>";

$a = 18;
$b = 24;
$hcf = 1;

if ($a < $b) {
    $smallest = $a;
} else {
    $smallest = $b;
}

for ($i = 1; $i <= $smallest; $i++) {
    if ($a % $i == 0 && $b % $i == 0) {
        $hcf = $i;
    }
}

echo "HCF of $a and $b is $hcf";


// Question 8
echo "<h2>8. Multiplication Table up to 12 x 12</h2>";

echo "<table border='1' cellpadding='8' cellspacing='0'>";

for ($row = 1; $row <= 12; $row++) {
    echo "<tr>";

    for ($column = 1; $column <= 12; $column++) {
        $result = $row * $column;
        echo "<td>$result</td>";
    }

    echo "</tr>";
}

echo "</table>";


// Question 9
echo "<h2>9. Prime or Non-Prime</h2>";

$number = 17;
$isPrime = true;

if ($number <= 1) {
    $isPrime = false;
} else {
    for ($i = 2; $i < $number; $i++) {
        if ($number % $i == 0) {
            $isPrime = false;
            break;
        }
    }
}

if ($isPrime == true) {
    echo "$number is a prime number";
} else {
    echo "$number is a non-prime number";
}


// Question 10
echo "<h2>10. Prime Numbers from 10 to 50</h2>";

for ($number = 10; $number <= 50; $number++) {
    $isPrime = true;

    for ($i = 2; $i < $number; $i++) {
        if ($number % $i == 0) {
            $isPrime = false;
            break;
        }
    }

    if ($isPrime == true) {
        echo "$number ";
    }
}

?>

</body>
</html>

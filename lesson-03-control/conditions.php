<?php

// If
$a = 3;
$b = 4;

if ($a < $b) {
    echo "$a is less than $b<br>";
}

// If / Else
$mark = 55;

if ($mark >= 50) {
    echo "PASS<br>";
} else {
    echo "FAIL<br>";
}

// If / Elseif / Else
$mark = 84;

if ($mark >= 90) {
    $grade = "A";
} elseif ($mark >= 80) {
    $grade = "B";
} elseif ($mark >= 70) {
    $grade = "C";
} elseif ($mark >= 60) {
    $grade = "D";
} elseif ($mark >= 50) {
    $grade = "E";
} else {
    $grade = "F";
}

echo "Your Grade is $grade<br>";

// Switch
$month = "May";

switch ($month) {
    case "January":
    case "February":
    case "March":
        echo "Winter<br>";
        break;

    case "April":
    case "May":
    case "June":
        echo "Spring<br>";
        break;

    case "July":
    case "August":
    case "September":
        echo "Summer<br>";
        break;

    case "October":
    case "November":
    case "December":
        echo "Autumn<br>";
        break;

    default:
        echo "Invalid month<br>";
}

// Ternary operator
$status = ($mark >= 50) ? "Pass" : "Fail";
echo "Status: $status";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>PHP Assignment 2</title>
</head>
<body>

<h1>PHP Assignment 2</h1>

<?php

// Question 1
echo "<h2>1. One Dimensional Array</h2>";

$numbers = array(5, -7, 12, 10, -7, 11, -6, 12, 1, -7, 2, 9);

echo "Array elements: ";

$total = 0;
$evenTotal = 0;
$oddTotal = 0;
$minimum = $numbers[0];
$maximum = $numbers[0];

for ($i = 0; $i < count($numbers); $i++) {
    echo $numbers[$i] . " ";

    $total = $total + $numbers[$i];

    if ($numbers[$i] % 2 == 0) {
        $evenTotal = $evenTotal + $numbers[$i];
    } else {
        $oddTotal = $oddTotal + $numbers[$i];
    }

    if ($numbers[$i] < $minimum) {
        $minimum = $numbers[$i];
    }

    if ($numbers[$i] > $maximum) {
        $maximum = $numbers[$i];
    }
}

echo "<br><br>";

echo "Total of all elements = $total<br>";
echo "Total of even elements = $evenTotal<br>";
echo "Total of odd elements = $oddTotal<br>";

echo "Minimum element = $minimum<br>";
echo "Positions of minimum element: ";

for ($i = 0; $i < count($numbers); $i++) {
    if ($numbers[$i] == $minimum) {
        echo "[$i] ";
    }
}

echo "<br>";

echo "Maximum element = $maximum<br>";
echo "Positions of maximum element: ";

for ($i = 0; $i < count($numbers); $i++) {
    if ($numbers[$i] == $maximum) {
        echo "[$i] ";
    }
}


// Question 2
echo "<h2>2. Two Dimensional Associative Array</h2>";

$colors = array(
    "Light" => array(
        "Red" => "Light Red",
        "Green" => "Light Green",
        "Blue" => "Light Blue"
    ),

    "Normal" => array(
        "Red" => "Normal Red",
        "Green" => "Normal Green",
        "Blue" => "Normal Blue"
    ),

    "Dark" => array(
        "Red" => "Dark Red",
        "Green" => "Dark Green",
        "Blue" => "Dark Blue"
    )
);

echo "<table border='1' cellpadding='8' cellspacing='0'>";

echo "<tr>";
echo "<th></th>";
echo "<th>Red</th>";
echo "<th>Green</th>";
echo "<th>Blue</th>";
echo "</tr>";

foreach ($colors as $row => $columns) {

    echo "<tr>";

    echo "<th>$row</th>";

    foreach ($columns as $value) {
        echo "<td>$value</td>";
    }

    echo "</tr>";
}

echo "</table>";


// Question 3
echo "<h2>3. Two Dimensional Square Array</h2>";

$array = array(
    array(2, -6, 8),
    array(-6, 1, 6),
    array(7, 8, -6)
);

$oddTotal = 0;
$evenTotal = 0;
$total = 0;
$minimum = $array[0][0];
$maximum = $array[0][0];

for ($row = 0; $row < 3; $row++) {

    for ($column = 0; $column < 3; $column++) {

        $value = $array[$row][$column];

        $total = $total + $value;

        if ($value % 2 == 0) {
            $evenTotal = $evenTotal + $value;
        } else {
            $oddTotal = $oddTotal + $value;
        }

        if ($value < $minimum) {
            $minimum = $value;
        }

        if ($value > $maximum) {
            $maximum = $value;
        }
    }
}

$row1Total = $array[0][0] + $array[0][1] + $array[0][2];
$row2Total = $array[1][0] + $array[1][1] + $array[1][2];
$row3Total = $array[2][0] + $array[2][1] + $array[2][2];

$column1Total = $array[0][0] + $array[1][0] + $array[2][0];
$column2Total = $array[0][1] + $array[1][1] + $array[2][1];
$column3Total = $array[0][2] + $array[1][2] + $array[2][2];

$diagonal1 = $array[0][0] + $array[1][1] + $array[2][2];
$diagonal2 = $array[0][2] + $array[1][1] + $array[2][0];

echo "<table border='1' cellpadding='8' cellspacing='0'>";

echo "<tr>";
echo "<td colspan='5'>Total odd elements = $oddTotal</td>";
echo "</tr>";

echo "<tr>";
echo "<td colspan='5'>Total even elements = $evenTotal</td>";
echo "</tr>";

echo "<tr>";

echo "<td>$diagonal1</td>";
echo "<td>$column1Total</td>";
echo "<td>$column2Total</td>";
echo "<td>$column3Total</td>";
echo "<td>$diagonal2</td>";

echo "</tr>";

echo "<tr>";

echo "<td>$row1Total</td>";
echo "<td>{$array[0][0]}</td>";
echo "<td>{$array[0][1]}</td>";
echo "<td>{$array[0][2]}</td>";
echo "<td>$row1Total</td>";

echo "</tr>";

echo "<tr>";

echo "<td>$row2Total</td>";
echo "<td>{$array[1][0]}</td>";
echo "<td>{$array[1][1]}</td>";
echo "<td>{$array[1][2]}</td>";
echo "<td>$row2Total</td>";

echo "</tr>";

echo "<tr>";

echo "<td>$row3Total</td>";
echo "<td>{$array[2][0]}</td>";
echo "<td>{$array[2][1]}</td>";
echo "<td>{$array[2][2]}</td>";
echo "<td>$row3Total</td>";

echo "</tr>";

echo "<tr>";

echo "<td>$diagonal2</td>";
echo "<td>$column1Total</td>";
echo "<td>$column2Total</td>";
echo "<td>$column3Total</td>";
echo "<td>$diagonal1</td>";

echo "</tr>";

echo "<tr>";
echo "<td colspan='5'>Total all elements = $total</td>";
echo "</tr>";

echo "<tr>";
echo "<td colspan='5'>Min element is: $minimum in 3 positions:<br>";

for ($row = 0; $row < 3; $row++) {
    for ($column = 0; $column < 3; $column++) {

        if ($array[$row][$column] == $minimum) {
            echo "[$row,$column] ";
        }

    }
}

echo "</td>";
echo "</tr>";

echo "<tr>";
echo "<td colspan='5'>Maximum element is: $maximum in 2 positions:<br>";

for ($row = 0; $row < 3; $row++) {
    for ($column = 0; $column < 3; $column++) {

        if ($array[$row][$column] == $maximum) {
            echo "[$row,$column] ";
        }

    }
}

echo "</td>";
echo "</tr>";

echo "</table>";


// Question 4
echo "<h2>4. Student Information</h2>";

$students = array(
    "student1" => array(
        "ID" => "CA221",
        "Name" => "Mohamed Ahmed Ali",
        "Phone" => "0648440403",
        "Address" => "Laba Dhagax, Wardhiigley"
    ),

    "student2" => array(
        "ID" => "CA223",
        "Name" => "Ahmed Abdi Jama",
        "Phone" => "0647223201",
        "Address" => "Taleex, Hodan"
    ),

    "student3" => array(
        "ID" => "CA221",
        "Name" => "Amina Nur Adan",
        "Phone" => "0646990276",
        "Address" => "Macmacaanka, Dharkeynley"
    )
);

echo "<table border='1' cellpadding='8' cellspacing='0'>";

echo "<tr>";
echo "<th></th>";
echo "<th>Name</th>";
echo "<th>Phone</th>";
echo "<th>Address</th>";
echo "</tr>";

foreach ($students as $student) {

    echo "<tr>";

    echo "<td>" . $student["ID"] . "</td>";
    echo "<td>" . $student["Name"] . "</td>";
    echo "<td>" . $student["Phone"] . "</td>";
    echo "<td>" . $student["Address"] . "</td>";

    echo "</tr>";
}

echo "</table>";


// Question 5
echo "<h2>5. Student Transcript</h2>";

$transcript = array(
    "Semester 1" => array(
        array("subject1", 9, 26, 10, 40, 85, "Pass"),
        array("subject2", 9, 26, 10, 40, 85, "Pass"),
        array("subject3", 9, 26, 10, 40, 85, "Pass")
    ),

    "Semester 2" => array(
        array("subject1", 9, 26, 10, 0, 45, "Fail"),
        array("subject2", 9, 26, 10, 40, 85, "Pass"),
        array("subject3", 9, 26, 10, 40, 85, "Pass")
    )
);

echo "<table border='1' cellpadding='8' cellspacing='0'>";

echo "<tr>";
echo "<th>Semester</th>";
echo "<th>Course</th>";
echo "<th>CW1</th>";
echo "<th>MidTerm</th>";
echo "<th>CW2</th>";
echo "<th>Final</th>";
echo "<th>Total</th>";
echo "<th>Status</th>";
echo "</tr>";

foreach ($transcript as $semester => $courses) {

    $firstCourse = true;

    foreach ($courses as $course) {

        echo "<tr>";

        if ($firstCourse) {
            echo "<td rowspan='3'>$semester</td>";
            $firstCourse = false;
        }

        echo "<td>$course[0]</td>";
        echo "<td>$course[1]</td>";
        echo "<td>$course[2]</td>";
        echo "<td>$course[3]</td>";
        echo "<td>$course[4]</td>";
        echo "<td>$course[5]</td>";
        echo "<td>$course[6]</td>";

        echo "</tr>";
    }
}

echo "</table>";

?>

</body>
</html>
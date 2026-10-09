<?php

// Associative array
$studentInfo = array(
    "id" => 101,
    "name" => "Mohamed Abdi Ali",
    "age" => 20,
    "address" => "Hodan District",
    "status" => "single",
    "weight" => 61.5
);

print_r($studentInfo);

echo "<br><br>";
echo "Address: " . $studentInfo["address"];

echo "<br><br>";

// Foreach with values
foreach ($studentInfo as $value) {
    echo $value . ", ";
}

echo "<br><br>";

// Foreach with keys and values
foreach ($studentInfo as $key => $value) {
    echo "$key: $value<br>";
}

echo "<br>";

// Sorting associative arrays by value
$marks = array(
    "Ahmed" => 75,
    "Amina" => 92,
    "Farah" => 84
);

asort($marks);
echo "Marks ascending:<br>";

foreach ($marks as $name => $mark) {
    echo "$name: $mark<br>";
}

arsort($marks);
echo "<br>Marks descending:<br>";

foreach ($marks as $name => $mark) {
    echo "$name: $mark<br>";
}

echo "<br>";

// Two-dimensional numeric array
$students = array(
    array(101, "Mohamed", 20, "single"),
    array(102, "Abdi", 30, "single"),
    array(103, "Jamac", 33, "married"),
    array(104, "Amina", 40, "single"),
    array(105, "Farah", 50, "married")
);

echo "Student name: " . $students[2][1] . "<br>";
echo "Student age: " . $students[3][2] . "<br><br>";

foreach ($students as $student) {
    foreach ($student as $value) {
        echo "$value, ";
    }

    echo "<br>";
}

echo "<br>";

// Multidimensional associative array
$students = array(
    array("id" => 101, "name" => "Mohamed", "age" => 20, "status" => "single"),
    array("id" => 102, "name" => "Abdi", "age" => 30, "status" => "single"),
    array("id" => 103, "name" => "Jamac", "age" => 33, "status" => "married"),
    array("id" => 104, "name" => "Amina", "age" => 40, "status" => "single"),
    array("id" => 105, "name" => "Farah", "age" => 50, "status" => "married")
);

echo "Student name: " . $students[2]["name"] . "<br>";
echo "Student age: " . $students[3]["age"] . "<br><br>";

foreach ($students as $student) {
    foreach ($student as $key => $value) {
        echo "$key: $value ";
    }

    echo "<br>";
}

?>

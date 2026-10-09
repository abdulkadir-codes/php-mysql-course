<?php

// Indexed arrays
$fruits = array("Apple", "Orange", "Banana");

print_r($fruits);
echo "<br>";
echo $fruits[0] . " " . $fruits[1] . " " . $fruits[2];

echo "<br><br>";

// Manual indexing
$cities[0] = "Mogadishu";
$cities[1] = "Hargeisa";
$cities[2] = "Kismayo";
$cities[5] = "Bosaso";

print_r($cities);
echo "<br>Index 5: " . $cities[5];

echo "<br><br>";

// Adding items without an explicit index
$cars[] = "Mercedes Benz";
$cars[] = "Hilux";
$cars[] = "BMW";
$cars[] = "Toyota";
$cars[] = "Nissan";

print_r($cars);

echo "<br><br>";

// Arrays can contain different data types
$studentInfo = array(
    101,
    "Mohamed Abdi Ali",
    20,
    "single",
    61.5
);

var_dump($studentInfo);

echo "<br><br>";

// For loop
for ($i = 0; $i < count($fruits); $i++) {
    echo $fruits[$i] . ", ";
}

echo "<br><br>";

// Foreach loop
foreach ($cars as $car) {
    echo $car . ", ";
}

echo "<br><br>";

// Sum array elements
$numbers = array(26, 11, 13, -4, 14, 17, 5, 52, 7, 9, 21, 32, 2, 4, 5);

$total = 0;

foreach ($numbers as $number) {
    $total += $number;
}

echo "Total: $total";

echo "<br><br>";

// Add matching elements from two arrays
$array1 = array(1, 2, 3, 4, 5);
$array2 = array(6, 7, 8, 9, 10);
$array3 = array();

for ($i = 0; $i < count($array1); $i++) {
    $array3[$i] = $array1[$i] + $array2[$i];
}

echo "Combined values: " . implode(", ", $array3);

echo "<br><br>";

// Common array functions
echo "Is array: ";
var_dump(is_array($fruits));

echo "<br>Contains Banana: ";
var_dump(in_array("Banana", $fruits));

echo "<br>Total fruits: " . count($fruits);

sort($fruits);
echo "<br>Ascending: " . implode(", ", $fruits);

rsort($fruits);
echo "<br>Descending: " . implode(", ", $fruits);

echo "<br>Maximum number: " . max($numbers);
echo "<br>Minimum number: " . min($numbers);

$sentence = "The quick brown fox jumps over the lazy dog";
$words = explode(" ", $sentence);

echo "<br>Exploded string: ";
print_r($words);

$merged = array_merge(array(1, 2, 3), array(4, 5, 6));
echo "<br>Merged: " . implode(", ", $merged);

$reversed = array_reverse($merged);
echo "<br>Reversed: " . implode(", ", $reversed);

array_push($merged, 7);
echo "<br>After push: " . implode(", ", $merged);

$removed = array_pop($merged);
echo "<br>Removed by pop: $removed";
echo "<br>Last element: " . end($merged);

// shuffle() changes the order randomly, so it is shown separately.
$shuffled = $fruits;
shuffle($shuffled);
echo "<br>Shuffled: " . implode(", ", $shuffled);

?>

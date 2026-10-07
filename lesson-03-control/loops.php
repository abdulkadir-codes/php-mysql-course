<?php

// While loop
$count = 1;

while ($count <= 5) {
    echo "$count ";
    $count++;
}

echo "<br><br>";

// Do...while loop
$i = 1;

do {
    echo "$i x 5 = " . ($i * 5) . "<br>";
    $i++;
} while ($i <= 5);

echo "<br>";

// For loop
for ($i = 1; $i <= 5; $i++) {
    echo "Square of $i = " . ($i * $i) . "<br>";
}

echo "<br>";

// Break
for ($i = 1; $i <= 10; $i++) {
    if ($i == 6) {
        break;
    }

    echo "$i ";
}

echo "<br><br>";

// Continue
for ($i = 1; $i <= 10; $i++) {
    if ($i % 2 == 0) {
        continue;
    }

    echo "$i ";
}

echo "<br><br>";

// Nested loops
for ($row = 1; $row <= 3; $row++) {
    for ($column = 1; $column <= 3; $column++) {
        echo "($row, $column) ";
    }

    echo "<br>";
}

?>

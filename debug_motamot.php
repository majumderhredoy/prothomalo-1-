<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include "config/db.php";

echo "--- motamot LEFT ---\n";
$q1 = "SELECT * FROM motamot LIMIT 1";
$res1 = mysqli_query($conn, $q1);
if (!$res1) {
    echo "Query Error (motamot): " . mysqli_error($conn) . "\n";
} else {
    $row = mysqli_fetch_assoc($res1);
    if ($row) {
        print_r($row);
    } else {
        echo "Table exists but is EMPTY.\n";
    }
}

echo "\n--- motamot1 RIGHT ---\n";
$q2 = "SELECT * FROM motamot1 LIMIT 4";
$res2 = mysqli_query($conn, $q2);
if (!$res2) {
    echo "Query Error (motamot1): " . mysqli_error($conn) . "\n";
} else {
    $count = 0;
    while ($row = mysqli_fetch_assoc($res2)) {
        $count++;
        echo "Row $count:\n";
        print_r($row);
    }
    if ($count == 0) echo "Table exists but is EMPTY.\n";
}
?>

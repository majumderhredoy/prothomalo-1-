<?php
include "config/db.php";

echo "=== JIBONJAPPON TABLE STRUCTURE ===\n";
$result = mysqli_query($conn, "DESCRIBE jibonjappon");
if ($result) {
    while($row = mysqli_fetch_assoc($result)) {
        echo $row['Field'] . " (" . $row['Type'] . ")\n";
    }
} else {
    echo "Error: " . mysqli_error($conn) . "\n";
}

echo "\n=== SAMPLE DATA ===\n";
$data = mysqli_query($conn, "SELECT * FROM jibonjappon LIMIT 1");
if ($data && mysqli_num_rows($data) > 0) {
    $sample = mysqli_fetch_assoc($data);
    foreach ($sample as $key => $value) {
        echo "$key: " . (strlen($value) > 50 ? substr($value, 0, 50) . "..." : $value) . "\n";
    }
} else {
    echo "No data found or error: " . mysqli_error($conn) . "\n";
}
?>

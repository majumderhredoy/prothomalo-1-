<?php
include "config/db.php";
$res = mysqli_query($conn, "SHOW TABLES");
if ($res) {
    echo "Tables in database:\n";
    while ($row = mysqli_fetch_row($res)) {
        echo "- " . $row[0] . "\n";
    }
} else {
    echo "Error: " . mysqli_error($conn);
}
?>

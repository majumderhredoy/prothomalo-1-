<?php
include "config/db.php";
$result = mysqli_query($conn, "DESCRIBE banijjo2");
if ($result) {
    echo "Table 'banijjo2' exists. Columns:\n";
    while ($row = mysqli_fetch_assoc($result)) {
        echo $row['Field'] . "\n";
    }
} else {
    echo "Table 'banijjo2' DOES NOT EXIST.\n"; 
}
?>

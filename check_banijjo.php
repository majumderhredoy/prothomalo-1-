<?php
include "config/db.php";
$result = mysqli_query($conn, "DESCRIBE banijjo");
if ($result) {
    echo "Table 'banijjo' exists. Columns:\n";
    while ($row = mysqli_fetch_assoc($result)) {
        echo $row['Field'] . "\n";
    }
} else {
    echo "Table 'banijjo' DOES NOT EXIST.\n"; 
}
?>

<?php
include "config/db.php";
$res = mysqli_query($conn, "DESCRIBE motamot");
if ($res) {
    while ($row = mysqli_fetch_assoc($res)) {
        echo $row['Field'] . " (" . $row['Type'] . ")\n";
    }
} else {
    echo "Table 'motamot' not found: " . mysqli_error($conn);
}
?>

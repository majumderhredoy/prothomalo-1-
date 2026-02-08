<?php
include "config/db.php";
foreach(['motamot', 'motamot1', 'motamot2'] as $table) {
    echo "\nSchema for table: $table\n";
    $res = mysqli_query($conn, "DESCRIBE $table");
    if ($res) {
        while ($row = mysqli_fetch_assoc($res)) {
            echo "- " . $row['Field'] . " (" . $row['Type'] . ")\n";
        }
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>

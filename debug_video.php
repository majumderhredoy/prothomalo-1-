<?php
include "config/db.php";

echo "--- TABLES ---\n";
$res = mysqli_query($conn, "SHOW TABLES");
while($row = mysqli_fetch_array($res)) {
    echo $row[0] . "\n";
}

echo "\n--- VIDEO DATA ---\n";
$tables = ['video', 'vedio'];
foreach($tables as $table) {
    echo "Checking $table...\n";
    $res = mysqli_query($conn, "DESCRIBE $table");
    if($res) {
        while($row = mysqli_fetch_assoc($res)) {
            print_r($row);
        }
        $res2 = mysqli_query($conn, "SELECT * FROM $table");
        while($row2 = mysqli_fetch_assoc($res2)) {
            print_r($row2);
        }
    } else {
        echo "Table $table does not exist.\n";
    }
}
?>

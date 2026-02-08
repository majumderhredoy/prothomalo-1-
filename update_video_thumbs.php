<?php
include "config/db.php";

$thumbnails = ["3.avif", "4.avif"];
$ids = [1, 2];

for ($i = 0; $i < count($ids); $i++) {
    $id = $ids[$i];
    $thumb = $thumbnails[$i];
    $sql = "UPDATE video SET thumbnail = ? WHERE id = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "si", $thumb, $id);
    if (mysqli_stmt_execute($stmt)) {
        echo "Updated video $id with thumbnail $thumb\n";
    } else {
        echo "Error updating video $id: " . mysqli_error($conn) . "\n";
    }
}
?>

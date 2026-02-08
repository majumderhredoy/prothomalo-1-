<?php
include "config/db.php";

$correct_filename = "_Hasnat_Abdullah_NCP_Jamuna_TV_144P.mp4";
$sql = "UPDATE video SET video_file = ?";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "s", $correct_filename);

if (mysqli_stmt_execute($stmt)) {
    echo "Database updated successfully: $correct_filename set for all records.\n";
} else {
    echo "Error updating database: " . mysqli_error($conn) . "\n";
}
?>

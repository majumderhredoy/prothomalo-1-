<?php
include "config/db.php";
$query = mysqli_query($conn, "SELECT * FROM categories");
while($row = mysqli_fetch_assoc($query)) {
    echo "Slug: " . $row['slug'] . " - Name: " . $row['name_bn'] . "\n";
}
?>

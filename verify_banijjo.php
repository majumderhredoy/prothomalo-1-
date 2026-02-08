<?php
include "config/db.php";
$slug = 'banijjo';
$name = 'বাণিজ্য';

$check = mysqli_query($conn, "SELECT * FROM categories WHERE slug = '$slug'");
if (mysqli_num_rows($check) == 0) {
    echo "Category '$slug' not found. Inserting... \n";
    $insert = mysqli_query($conn, "INSERT INTO categories (name_bn, slug, status) VALUES ('$name', '$slug', 1)"); // Status 1 to show in menu? Maybe user wants it? User didn't specify. I'll default to 1 as it is a major section.
    if ($insert) echo "Inserted successfully.\n";
    else echo "Insert failed: " . mysqli_error($conn) . "\n";
} else {
    echo "Category '$slug' exists.\n";
}
?>

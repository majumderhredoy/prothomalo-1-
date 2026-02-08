<?php
include "config/db.php";

// Update lifestyle to jibonjappon
$update = mysqli_query($conn, "UPDATE categories SET slug='jibonjappon' WHERE slug='lifestyle'");
if ($update) {
    echo "Updated lifestyle to jibonjappon.\n";
} else {
    echo "Failed to update lifestyle: " . mysqli_error($conn) . "\n";
}

// Insert missing categories
$cats = [
    ['slug' => 'shikkha', 'name_bn' => 'শিক্ষা'],
    ['slug' => 'projukti', 'name_bn' => 'প্রযুক্তি']
];

foreach ($cats as $cat) {
    $slug = $cat['slug'];
    $name = $cat['name_bn'];
    
    $check = mysqli_query($conn, "SELECT * FROM categories WHERE slug = '$slug'");
    if (mysqli_num_rows($check) == 0) {
        $insert = mysqli_query($conn, "INSERT INTO categories (name_bn, slug, status) VALUES ('$name', '$slug', 1)");
        if ($insert) echo "Inserted: $slug\n";
        else echo "Failed to insert $slug: " . mysqli_error($conn) . "\n";
    } else {
        echo "Exists: $slug\n";
    }
}
?>

<?php
include "config/db.php";

$cats = [
    ['slug' => 'shikkha', 'name_bn' => 'শিক্ষা'],
    ['slug' => 'projukti', 'name_bn' => 'প্রযুক্তি'],
    ['slug' => 'jibonjappon', 'name_bn' => 'জীবনযাপন'],
    ['slug' => 'jobs', 'name_bn' => 'চাকরি']
];

foreach ($cats as $cat) {
    $slug = $cat['slug'];
    $name = $cat['name_bn'];
    
    $check = mysqli_query($conn, "SELECT * FROM categories WHERE slug = '$slug'");
    if (mysqli_num_rows($check) == 0) {
        $insert = mysqli_query($conn, "INSERT INTO categories (name_bn, slug, status) VALUES ('$name', '$slug', 1)");
        echo "Inserted: $slug\n";
    } else {
        echo "Exists: $slug\n";
    }
}
?>

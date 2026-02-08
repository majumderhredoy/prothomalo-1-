<?php
include "config/db.php";

$slugs = ['shikkha', 'projukti'];

foreach ($slugs as $slug) {
    $update = mysqli_query($conn, "UPDATE categories SET status = 0 WHERE slug = '$slug'");
    if ($update) {
        echo "Hidden from menu: $slug\n";
    } else {
        echo "Failed to hide: $slug - " . mysqli_error($conn) . "\n";
    }
}
?>

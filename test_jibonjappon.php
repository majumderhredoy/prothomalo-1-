<!DOCTYPE html>
<html lang="bn">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>জীবনযাপন Database Test</title>
    <style>
        body { font-family: Arial, sans-serif; padding: 20px; background: #f5f5f5; }
        .container { max-width: 1200px; margin: 0 auto; background: white; padding: 20px; border-radius: 8px; }
        h1 { color: #333; border-bottom: 3px solid #d71920; padding-bottom: 10px; }
        .status { padding: 10px; margin: 10px 0; border-radius: 4px; }
        .success { background: #d4edda; color: #155724; border: 1px solid #c3e6cb; }
        .error { background: #f8d7da; color: #721c24; border: 1px solid #f5c6cb; }
        .info { background: #d1ecf1; color: #0c5460; border: 1px solid #bee5eb; }
        table { width: 100%; border-collapse: collapse; margin: 20px 0; }
        th, td { padding: 12px; text-align: left; border-bottom: 1px solid #ddd; }
        th { background: #f8f9fa; font-weight: bold; }
        .preview-img { max-width: 100px; height: auto; }
        .card { border: 1px solid #ddd; padding: 15px; margin: 10px 0; border-radius: 4px; }
        .card-row { display: flex; gap: 15px; align-items: flex-start; }
        .card-img { width: 150px; height: 100px; object-fit: cover; }
        .card-content { flex: 1; }
    </style>
</head>
<body>
    <div class="container">
        <h1>জীবনযাপন Database Test</h1>
        
        <?php
        include "config/db.php";
        
        // Check connection
        if (!$conn) {
            echo '<div class="status error">❌ Database connection failed: ' . mysqli_connect_error() . '</div>';
            exit;
        }
        echo '<div class="status success">✅ Database connected successfully</div>';
        
        // Check if table exists
        $table_check = mysqli_query($conn, "SHOW TABLES LIKE 'jibonjappon'");
        if (mysqli_num_rows($table_check) == 0) {
            echo '<div class="status error">❌ Table "jibonjappon" does not exist!</div>';
            exit;
        }
        echo '<div class="status success">✅ Table "jibonjappon" exists</div>';
        
        // Show table structure
        echo '<h2>Table Structure</h2>';
        $structure = mysqli_query($conn, "DESCRIBE jibonjappon");
        if ($structure) {
            echo '<table>';
            echo '<tr><th>Field</th><th>Type</th><th>Null</th><th>Key</th><th>Default</th></tr>';
            while ($row = mysqli_fetch_assoc($structure)) {
                echo '<tr>';
                echo '<td><strong>' . $row['Field'] . '</strong></td>';
                echo '<td>' . $row['Type'] . '</td>';
                echo '<td>' . $row['Null'] . '</td>';
                echo '<td>' . $row['Key'] . '</td>';
                echo '<td>' . ($row['Default'] ?? 'NULL') . '</td>';
                echo '</tr>';
            }
            echo '</table>';
        }
        
        // Count records
        $count_result = mysqli_query($conn, "SELECT COUNT(*) as total FROM jibonjappon");
        $count = mysqli_fetch_assoc($count_result)['total'];
        echo '<div class="status info">📊 Total records: ' . $count . '</div>';
        
        if ($count == 0) {
            echo '<div class="status error">⚠️ No data in jibonjappon table! Please add some records.</div>';
        } else {
            // Show data
            echo '<h2>Data Preview (First 4 records)</h2>';
            $data = mysqli_query($conn, "SELECT * FROM jibonjappon ORDER BY id DESC LIMIT 4");
            
            if ($data && mysqli_num_rows($data) > 0) {
                while ($row = mysqli_fetch_assoc($data)) {
                    echo '<div class="card">';
                    echo '<div class="card-row">';
                    
                    // Image
                    echo '<div>';
                    if (!empty($row['image'])) {
                        echo '<img src="' . htmlspecialchars($row['image']) . '" class="card-img" alt="Image">';
                    } else {
                        echo '<div class="card-img" style="background: #ddd; display: flex; align-items: center; justify-content: center;">No Image</div>';
                    }
                    echo '</div>';
                    
                    // Content
                    echo '<div class="card-content">';
                    echo '<h3 style="margin: 0 0 10px 0;">' . htmlspecialchars($row['title'] ?? 'No title') . '</h3>';
                    
                    // Description (check multiple possible field names)
                    $desc = $row['short_desc'] ?? $row['description'] ?? 'No description';
                    echo '<p style="color: #666; margin: 0 0 10px 0;">' . htmlspecialchars(substr($desc, 0, 150)) . '...</p>';
                    
                    // Date
                    $date = $row['published_date'] ?? $row['created_at'] ?? 'No date';
                    echo '<small style="color: #999;">Date: ' . $date . '</small>';
                    
                    // Show all fields
                    echo '<details style="margin-top: 10px;"><summary>Show all fields</summary>';
                    echo '<pre style="background: #f8f9fa; padding: 10px; border-radius: 4px; overflow-x: auto;">';
                    print_r($row);
                    echo '</pre></details>';
                    echo '</div>';
                    
                    echo '</div>';
                    echo '</div>';
                }
            }
        }
        ?>
        
        <div style="margin-top: 30px; padding: 15px; background: #f8f9fa; border-radius: 4px;">
            <h3>✅ What to check:</h3>
            <ul>
                <li>Database connection is working</li>
                <li>Table "jibonjappon" exists</li>
                <li>Table has data (at least 4 records recommended)</li>
                <li>Required fields: <code>id</code>, <code>title</code>, <code>image</code></li>
                <li>Optional fields: <code>short_desc</code> or <code>description</code>, <code>published_date</code> or <code>created_at</code></li>
            </ul>
        </div>
    </div>
</body>
</html>

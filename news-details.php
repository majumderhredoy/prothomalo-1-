<?php
include "config/db.php";

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
$table = isset($_GET['table']) ? $_GET['table'] : 'news';

// Sanitize table name to prevent SQL injection (simple white-list)
$allowed_tables = ['news', 'heading', 'heading2', 'shongbad1', 'pothito', 'antorjatik', 'shukhobor', 'sports_news', 'sports_news1', 'sports_news2', 'motamot', 'motamot1', 'chakri', 'projukti', 'shikkha', 'jibonjappon', 'banijjo', 'banijjo2'];

if (!in_array($table, $allowed_tables)) {
    die("Invalid news category.");
}

$query = "SELECT * FROM $table WHERE id = $id";
$result = mysqli_query($conn, $query);
$news = mysqli_fetch_assoc($result);

if (!$news) {
    die("News not found.");
}
?>

<!DOCTYPE html>
<html lang="bn">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($news['title']) ?> - Prothom Alo</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .details-container {
            max-width: 800px;
            margin: 40px auto;
            padding: 0 20px;
            background: #fff;
        }
        .details-header h1 {
            font-size: 36px;
            line-height: 1.3;
            margin-bottom: 20px;
            color: #111;
        }
        .details-meta {
            font-size: 14px;
            color: #666;
            margin-bottom: 25px;
            border-bottom: 1px solid #eee;
            padding-bottom: 15px;
        }
        .details-image img {
            width: 100%;
            height: auto;
            border-radius: 4px;
            margin-bottom: 30px;
        }
        .details-content {
            font-size: 18px;
            line-height: 1.8;
            color: #333;
            text-align: justify;
        }
        .back-btn {
            display: inline-block;
            margin-bottom: 20px;
            color: #444; /* Changed from blue to professional dark grey */
            text-decoration: none;
            font-weight: 600;
        }
        .back-btn:hover {
            color: #111;
        }
    </style>
</head>
<body>
    <header class="site-header">
        <div class="top-strip">
            <div class="top-strip-left">
                <a href="index.php">
                    <img src="logo.png" alt="Prothom Alo" class="logo" style="height: 50px;">
                </a>
            </div>
            <div class="top-strip-right" style="display: flex; align-items: center; gap: 20px; margin-left: auto;">
                <?php
                $result_shongbad = mysqli_query($conn, "SELECT * FROM shongbad1 LIMIT 3");
                if ($result_shongbad && mysqli_num_rows($result_shongbad) > 0): 
                    while ($row = mysqli_fetch_assoc($result_shongbad)): ?>
                        <div class="top-news-item" style="display: flex; align-items: center; gap: 10px;">
                            <?php if (!empty($row['image'])): ?>
                                <img src="<?= $row['image'] ?>" alt="" style="width: 40px; height: 40px; object-fit: cover;">
                            <?php endif; ?>
                            <a href="news-details.php?id=<?= $row['id'] ?>&table=shongbad1" style="font-size: 13px; color: #111; text-decoration: none;"><?= $row['title'] ?></a>
                        </div>
                    <?php endwhile;
                endif; ?>
            </div>
        </div>
    </header>

    <main class="details-container">
        <?php
        // Determine fallback URL based on table
        $back_url = "index.php";
        $table_to_cat = [
            'shongbad1' => 'bangladesh',
            'antorjatik' => 'world',
            'sports_news' => 'sports',
            'sports_news1' => 'sports',
            'sports_news2' => 'sports',
            'motamot' => 'opinion',
            'motamot1' => 'opinion',
            'chakri' => 'jobs',
            'shikkha' => 'shikkha',
            'projukti' => 'projukti',
            'jibonjappon' => 'jibonjappon',
            'banijjo' => 'banijjo'
        ];
        
        if (isset($table_to_cat[$table])) {
            $back_url = "category.php?cat=" . $table_to_cat[$table];
        }
        ?>
        <a href="<?= $back_url ?>" onclick="if(document.referrer){history.back(); return false;}" class="back-btn">
            <i class="fas fa-arrow-left"></i> ফিরে যান
        </a>
        
        <article class="details-content-wrapper">
            <header class="details-header">
                <h1><?= htmlspecialchars($news['title']) ?></h1>
                <div class="details-meta">
                    <span><i class="far fa-clock"></i> আপডেট: ১ ঘণ্টা আগে</span>
                    <span style="margin-left: 20px;"><i class="far fa-user"></i> প্রথম আলো ডেস্ক</span>
                </div>
            </header>

            <?php if (!empty($news['image'])): ?>
            <div class="details-image">
                <img src="<?= $news['image'] ?>" alt="<?= htmlspecialchars($news['title']) ?>">
            </div>
            <?php endif; ?>

            <div class="details-content">
                <p><?= nl2br(htmlspecialchars($news['description'])) ?></p>
            </div>
        </article>
    </main>

    <footer class="footer" style="margin-top: 50px; border-top: 1px solid #eee; padding: 40px 0; text-align: center; color: #666;">
        <p>স্বত্ব © ১৯৯৮-২০২৬ প্রথম আলো</p>
    </footer>
</body>
</html>

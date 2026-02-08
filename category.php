<?php
include "config/db.php";

$cat_slug = isset($_GET['cat']) ? $_GET['cat'] : 'latest';

// Fetch category name
$cat_query = mysqli_query($conn, "SELECT * FROM categories WHERE slug = '$cat_slug' LIMIT 1");
$category = mysqli_fetch_assoc($cat_query);

if (!$category) {
    die("Category not found.");
}

// Map slug to tables
$mapping = [
    'latest' => 'news',
    'bangladesh' => 'shongbad1',
    'politics' => 'news',
    'world' => 'antorjatik',
    'business' => 'news',
    'opinion' => 'motamot',
    'sports' => 'sports_news',
    'entertainment' => 'news',
    'jobs' => 'chakri',
    'lifestyle' => 'news',
    'video' => 'video',
    'shikkha' => 'shikkha',
    'projukti' => 'projukti',
    'jibonjappon' => 'jibonjappon',
    'banijjo' => 'banijjo'
];

$table = isset($mapping[$cat_slug]) ? $mapping[$cat_slug] : 'news';

// Fetch news for this category
if ($cat_slug == 'banijjo') {
    $news_query = mysqli_query($conn, "
        (SELECT id, title, description, image, published_date, 'banijjo' as origin_table FROM banijjo)
        UNION
        (SELECT id, title, description, image, published_date, 'banijjo2' as origin_table FROM banijjo2)
        ORDER BY published_date DESC LIMIT 40
    ");
} else {
    // Check if table has published_date or created_at
    $test_q = mysqli_query($conn, "SHOW COLUMNS FROM $table LIKE 'published_date'");
    $order_field = (mysqli_num_rows($test_q) > 0) ? 'published_date' : 'id';
    $news_query = mysqli_query($conn, "SELECT * FROM $table ORDER BY $order_field DESC LIMIT 24");
}

?>

<!DOCTYPE html>
<html lang="bn">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($category['name_bn']) ?> - Prothom Alo</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .category-header {
            max-width: 1320px;
            margin: 40px auto 20px;
            padding: 20px;
            border-top: 6px solid #666; /* Match homepage section border */
            border-bottom: 1px solid #eee;
        }
        .category-header h1 {
            font-size: 32px;
            font-weight: 700;
            color: #000;
            margin: 0;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        .category-header h1::after {
            content: "›";
            color: #d71920;
            font-size: 36px;
            font-weight: bold;
        }
        .category-news-grid {
            max-width: 1320px;
            margin: 0 auto;
            padding: 20px;
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
            gap: 24px;
        }
        .cat-news-card {
            background: #fff;
            padding: 15px;
            border: 1px solid #f0f0f0;
            border-radius: 4px;
            transition: box-shadow 0.2s;
        }
        .cat-news-card:hover {
            box-shadow: 0 4px 12px rgba(0,0,0,0.05);
        }
        .cat-news-card img {
            width: 100%;
            height: 180px;
            object-fit: cover;
            border-radius: 4px;
            margin-bottom: 15px;
        }
        .cat-news-card h3 {
            font-size: 18px;
            line-height: 1.4;
            font-weight: 700;
            color: #000;
            margin-bottom: 10px;
            transition: color 0.2s;
        }
        .cat-news-card:hover h3 {
            color: #d71920;
        }
        .cat-news-card p {
            font-size: 14px;
            color: #333;
            line-height: 1.5;
            margin: 0;
        }
    </style>
</head>
<body>
    <header class="site-header">
        <div class="top-strip">
            <div class="top-strip-left">
                <a href="index.php">
                    <img src="logo.png" alt="Prothom Alo" class="logo">
                </a>
            </div>
            <div class="top-strip-right">
                <?php
                $result_shongbad = mysqli_query($conn, "SELECT * FROM shongbad1 LIMIT 3");
                if ($result_shongbad && mysqli_num_rows($result_shongbad) > 0): 
                    while ($row = mysqli_fetch_assoc($result_shongbad)): ?>
                        <div class="top-news-item">
                            <?php if (!empty($row['image'])): ?>
                                <img src="<?= $row['image'] ?>" alt="">
                            <?php endif; ?>
                            <a href="news-details.php?id=<?= $row['id'] ?>&table=shongbad1"><?= $row['title'] ?></a>
                        </div>
                    <?php endwhile;
                endif; ?>
            </div>
        </div>
        <?php
        $nav_query = mysqli_query($conn, "SELECT * FROM categories WHERE status = 1 ORDER BY position ASC");
        ?>
        <nav class="main-nav">
            <ul class="nav-left">
                <?php while ($nav_row = mysqli_fetch_assoc($nav_query)) { ?>
                    <li>
                        <a href="<?= ($nav_row['slug'] == 'latest') ? 'index.php' : 'category.php?cat=' . $nav_row['slug'] ?>" <?= ($nav_row['slug'] == $cat_slug) ? 'style="color:#d71920;"' : '' ?>>
                            <?= $nav_row['name_bn'] ?>
                        </a>
                    </li>
                <?php } ?>
            </ul>
        </nav>
    </header>

    <div class="category-header">
        <h1><?= htmlspecialchars($category['name_bn']) ?></h1>
    </div>

    <main class="category-news-grid">
        <?php if ($news_query && mysqli_num_rows($news_query) > 0): ?>
            <?php while ($row = mysqli_fetch_assoc($news_query)): ?>
                <article class="cat-news-card">
                    <?php 
                    $title = "";
                    if (isset($row['title'])) $title = $row['title'];
                    elseif (isset($row['name_bn'])) $title = $row['name_bn'];
                    elseif (isset($row['badge_text'])) $title = $row['badge_text'];

                    $desc = isset($row['description']) ? $row['description'] : '';
                    $image = isset($row['image']) ? $row['image'] : (isset($row['thumbnail']) ? $row['thumbnail'] : '');
                    
                    // Use origin_table for links if it exists (for merged categories)
                    $target_table = isset($row['origin_table']) ? $row['origin_table'] : $table;
                    ?>
                    <a href="news-details.php?id=<?= $row['id'] ?>&table=<?= $target_table ?>">
                        <?php if ($image): ?>
                            <img src="<?= $image ?>" alt="">
                        <?php else: ?>
                            <div style="height:180px; background:#f5f5f5; border-radius:4px; margin-bottom:15px; display:flex; align-items:center; justify-content:center; color:#999;">No Image</div>
                        <?php endif; ?>
                        <h3><?= $title ?></h3>
                    </a>
                    <p><?= mb_strimwidth(strip_tags($desc), 0, 150, "...") ?></p>
                </article>
            <?php endwhile; ?>
        <?php else: ?>
            <p style="padding: 20px;">এই ক্যাটাগরিতে বর্তমানে কোনো সংবাদ নেই।</p>
        <?php endif; ?>
    </main>

    <footer class="footer" style="margin-top: 50px; border-top: 1px solid #eee; padding: 40px 0; text-align: center; color: #666;">
        <p>স্বত্ব © ১৯৯৮-২০২৬ প্রথম আলো</p>
    </footer>
</body>
</html>

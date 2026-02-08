<?php
include "config/db.php";

$title = isset($_GET['title']) ? $_GET['title'] : 'প্রথম আলো';
?>

<!DOCTYPE html>
<html lang="bn">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($title) ?> - Prothom Alo</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .placeholder-page {
            max-width: 1320px;
            margin: 60px auto;
            padding: 0 20px;
            text-align: center;
        }
        .placeholder-page h1 {
            font-size: 48px;
            color: #d71920;
            margin-bottom: 20px;
        }
        .placeholder-page p {
            font-size: 20px;
            color: #666;
            line-height: 1.6;
        }
        .placeholder-icon {
            font-size: 80px;
            color: #eee;
            margin-bottom: 30px;
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
                        <a href="<?= ($nav_row['slug'] == 'latest') ? 'index.php' : 'category.php?cat=' . $nav_row['slug'] ?>">
                            <?= $nav_row['name_bn'] ?>
                        </a>
                    </li>
                <?php } ?>
            </ul>
        </nav>
    </header>

    <main class="placeholder-page">
        <div class="placeholder-icon">
            <i class="fas fa-file-alt"></i>
        </div>
        <h1><?= htmlspecialchars($title) ?></h1>
        <p>এই পাতাটির কাজ বর্তমানে চলমান রয়েছে। শীঘ্রই আপনি এখানে বিস্তারিত দেখতে পাবেন।</p>
        <div style="margin-top: 40px;">
            <a href="index.php" style="display:inline-block; padding: 12px 25px; background: #d71920; color: #fff; text-decoration: none; border-radius: 4px; font-weight: bold;">ফিরে যান</a>
        </div>
    </main>

    <footer class="footer" style="margin-top: 80px; border-top: 1px solid #eee; padding: 60px 0; text-align: center; color: #666; background: #fafafa;">
        <div style="max-width: 1320px; margin: 0 auto; padding: 0 20px;">
            <img src="logo.png" alt="Prothom Alo" style="height: 40px; margin-bottom: 20px;">
            <p style="font-size: 14px; line-height: 1.8;">স্বত্ব © ১৯৯৮-২০২৬ প্রথম আলো | সম্পাদক ও প্রকাশক: মতিউর রহমান</p>
        </div>
    </footer>
</body>
</html>

<?php
include "config/db.php";

// echo "Database connected successfully";

$result = mysqli_query($conn, "SELECT * FROM news");
$result1 = mysqli_query($conn, "SELECT * FROM heading");
$result2 = mysqli_query($conn, "SELECT * FROM heading2 LIMIT 1");
$resultq = mysqli_query($conn, "SELECT * FROM video");
$result_shongbad = mysqli_query($conn, "SELECT * FROM shongbad1 LIMIT 3");
$motamot = mysqli_query($conn, "SELECT * FROM motamot LIMIT 1");
$res_motamot_right = mysqli_query($conn, "SELECT * FROM motamot1 LIMIT 4");
$jibonjappon = mysqli_query($conn, "SELECT * FROM jibonjappon ORDER BY id DESC LIMIT 4");

// Sports Tab Data Fetching
$result_pothito = mysqli_query($conn, "SELECT * FROM pothito LIMIT 5");
$result_antorjatik = mysqli_query($conn, "SELECT * FROM antorjatik LIMIT 5");
$result_shukhabar = mysqli_query($conn, "SELECT * FROM shukhobor LIMIT 5");
//     echo $row['title'] . " - " . $row['created_at'] . "<br>";
// }

?>

<!DOCTYPE html>
<html lang="bn">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>prothomalo.com</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="footer.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
    <!-- ================= HEADER START ================= -->
    <header class="site-header">
        <!-- TOP STRIP -->
        <div class="top-strip">
            <div class="top-strip-left">
                <a href="index.php">
                    <img src="logo.png" alt="Prothom Alo Logo" class="logo">
                </a>
            </div>
            <div class="top-strip-right">
                <?php if ($result_shongbad && mysqli_num_rows($result_shongbad) > 0): ?>
                    <?php while ($row = mysqli_fetch_assoc($result_shongbad)): ?>
                        <div class="top-news-item">
                            <?php if (!empty($row['image'])): ?>
                                <img src="<?= $row['image'] ?>" alt="">
                            <?php endif; ?>
                            <a href="news-details.php?id=<?= $row['id'] ?>&table=shongbad1"><?= $row['title'] ?></a>
                        </div>
                    <?php endwhile; ?>
                <?php else: ?>
                    <!-- Fallback static items if database is empty -->
                    <div class="top-news-item"><a href="#">সংবাদ শিরোনাম ১</a></div>
                    <div class="top-news-item"><a href="#">সংবাদ শিরোনাম ২</a></div>
                    <div class="top-news-item"><a href="#">সংবাদ শিরোনাম ৩</a></div>
                <?php endif; ?>
            </div>
        </div>
  <?php
$query = mysqli_query($conn, 
    "SELECT * FROM categories 
     WHERE status = 1 
     ORDER BY position ASC"
);
?>

<nav class="main-nav">
    <ul class="nav-left">
        <?php while ($row = mysqli_fetch_assoc($query)) { ?>
            <li>
                <a href="<?= ($row['slug'] == 'latest') ? 'index.php' : 'category.php?cat=' . $row['slug'] ?>">
                    <?= $row['name_bn'] ?>
                </a>
            </li>
        <?php } ?>
    </ul>
            <ul class="nav-right">
                <li class="search-container">
                    <input type="text" id="searchInput" placeholder="খুঁজুন...">
                   
                </li>
                <li><a href="https://www.prothomalo.com/epaper" target="_blank">📰 ই-পেপার</a></li>
                <li><a href="https://en.prothomalo.com/" target="_blank">🌐 Eng</a></li>
                <li><a href="https://www.prothomalo.com/login" target="_blank">👤 Login</a></li>
                <li><a href="javascript:void(0)" id="mobileMenuBtn">☰</a></li>
            </ul>
        </nav>
    </header>

    <!-- ================= MAIN CONTENT WRAPPER ================= -->
    <main class="main-content-wrapper">
        <!-- LEFT COLUMN -->
        <section class="home-container">
        <section class="col left-col">
            <?php
            while ($row = mysqli_fetch_assoc($result)) {
            ?>
            <article class="list-news-item">
                <div class="news-item-top">
                    <div class="news-item-title">
                        <a href="news-details.php?id=<?= $row['id'] ?>&table=news">
                            <h3><?= $row['title'] ?></h3>
                        </a>
                    </div>
                    <div class="news-item-image">
                        <a href="news-details.php?id=<?= $row['id'] ?>&table=news">
                            <img src="<?= $row['image'] ?>" alt="">
                        </a>
                    </div>
                </div>
                <div class="news-item-bottom">
                    <p><?= $row['description'] ?></p>
                    <span class="time">১ ঘণ্টা আগে</span>
                </div>
            </article>
            <hr class="divider">
            <?php
            }
            ?>
            
        </section>

        <!-- CENTER COLUMN -->
        <section class="col center-col">
            <!-- Lead Story -->
            <?php
            // Fetch Lead
            $lead = mysqli_fetch_assoc($result1);
            if ($lead):
            ?>
            <article class="lead-news">
                <div class="lead-image">
                    <a href="news-details.php?id=<?= $lead['id'] ?>&table=heading">
                        <img src="<?= $lead['image'] ?>" alt="">
                    </a>
                </div>
                <a href="news-details.php?id=<?= $lead['id'] ?>&table=heading">
                    <h2><?= $lead['title'] ?></h2>
                </a>
                <p><?= $lead['description'] ?></p>
                <span class="time">৩০ মিনিট আগে</span>
            </article>
            <?php endif; ?>

            <hr class="divider">

            <!-- Sub Grid -->
            <div class="center-sub-grid">
                <?php
                // Fetch next 2 for sub-grid
                $count = 0;
                while ($count < 2 && $sub = mysqli_fetch_assoc($result1)):
                    $count++;
                ?>
                <article class="sub-news-item">
                    <div class="news-text">
                        <a href="news-details.php?id=<?= $sub['id'] ?>&table=heading">
                            <h4><?= $sub['title'] ?></h4>
                        </a>
                        <p><?= $sub['description'] ?></p>
                        <span class="time">৪ ঘণ্টা আগে</span>
                    </div>
                    <div class="news-thumb">
                        <a href="news-details.php?id=<?= $sub['id'] ?>&table=heading">
                            <img src="<?= $sub['image'] ?>" alt="">
                        </a>
                    </div>
                </article>
                <hr class="divider">
            <?php endwhile; ?>
            </div>
        </section>

        <!-- RIGHT COLUMN -->
        <aside class="col right-col">
            <div class="ad-box">
                <div class="ad-content">
                    <div class="ad-placeholder">
                        <h3>ভাঙলে বিপদ?</h3>
                        <p>HEAT STRENGTHENED</p>
                        <img src="img/ad.jpg" alt="Ad" onerror="this.style.display='none'">
                    </div>
                </div>
            </div>
            <hr class="divider">
            <?php
            // Restore missing result2 fetch
            $result2 = mysqli_query($conn, "SELECT * FROM heading2 LIMIT 1");
            while ($row = mysqli_fetch_assoc($result2)):
            ?>
            <article class="right-large-card">
                <?php if (!empty($row['image'])): ?>
                <div class="news-thumb">
                    <a href="news-details.php?id=<?= $row['id'] ?>&table=heading2">
                        <img src="<?= $row['image'] ?>" alt="">
                    </a>
                </div>
                <?php endif; ?>
                <div class="news-content">
                    <a href="news-details.php?id=<?= $row['id'] ?>&table=heading2">
                        <h4 class="kicker-title"><?= $row['title'] ?></h4>
                    </a>
                    <p><?= $row['description'] ?></p>
                    <span class="time">৬ ঘণ্টা আগে</span>
                </div>
            </article>
            <hr class="divider">
            <?php endwhile; ?>
        </aside>
    </section>

    <!-- ================= SPORTS SECTION ================= -->
    <section class="sports-section">
        <div class="sports-container">
<aside class="sports-left">
    <div class="sports-tabs">
        <button class="tab-btn active" data-tab="pothito">পঠিত</button>
        <button class="tab-btn" data-tab="antorjatik">আন্তর্জাতিক</button>
        <button class="tab-btn" data-tab="shukhabar">সুখবর</button>
    </div>

    <!-- Pothito Content -->
    <div class="tab-content active" id="pothito-content">
        <?php 
        $num = 1;
        while ($row = mysqli_fetch_assoc($result_pothito)): ?>
            <article class="numbered-news-item">
                <div class="news-number"><?= $num++; ?></div>
                <div class="news-text">
                    <a href="news-details.php?id=<?= $row['id'] ?>&table=pothito">
                        <h3><?= htmlspecialchars($row['title']) ?></h3>
                    </a>
                </div>
            </article>
            <hr class="divider">
        <?php endwhile; ?>
    </div>

    <!-- Antorjatik Content -->
    <div class="tab-content" id="antorjatik-content" style="display:none;">
        <?php 
        $num = 1;
        while ($row = mysqli_fetch_assoc($result_antorjatik)): ?>
            <article class="numbered-news-item">
                <div class="news-number"><?= $num++; ?></div>
                <div class="news-text">
                    <a href="news-details.php?id=<?= $row['id'] ?>&table=antorjatik">
                        <h3><?= htmlspecialchars($row['title']) ?></h3>
                    </a>
                </div>
            </article>
            <hr class="divider">
        <?php endwhile; ?>
    </div>

    <!-- Shukhabar Content -->
    <div class="tab-content" id="shukhabar-content" style="display:none;">
        <?php 
        $num = 1;
        while ($row = mysqli_fetch_assoc($result_shukhabar)): ?>
            <article class="numbered-news-item">
                <div class="news-number"><?= $num++; ?></div>
                <div class="news-text">
                    <a href="news-details.php?id=<?= $row['id'] ?>&table=shukhobor">
                        <h3><?= htmlspecialchars($row['title']) ?></h3>
                    </a>
                </div>
            </article>
            <hr class="divider">
        <?php endwhile; ?>
    </div>
</aside>

            <!-- CENTER -->
            <main class="sports-center">
                <?php
                $sports_center_q = mysqli_query($conn, "SELECT * FROM sports_news1 LIMIT 1");
                $sports_row = mysqli_fetch_assoc($sports_center_q);
                if ($sports_row):
                ?>
                <div class="category-badge">
                    <span class="badge-icon">🔵</span>
                    <span class="badge-text">খেলা</span>
                </div>
                <?php if (!empty($sports_row['image'])): ?>
                <div class="featured-image">
                    <a href="news-details.php?id=<?= $sports_row['id'] ?>&table=sports_news1">
                        <img src="<?= $sports_row['image'] ?>" alt="">
                    </a>
                </div>
                <?php endif; ?>
                <a href="news-details.php?id=<?= $sports_row['id'] ?>&table=sports_news1">
                    <h2 class="sports-headline"><?= $sports_row['title'] ?></h2>
                </a>
                <p class="sports-meta">১ ঘণ্টা আগে</p>
                <?php endif; ?>
            </main>

            <!-- RIGHT -->
            <aside class="sports-right">
                <?php
                $sports_right_q = mysqli_query($conn, "SELECT * FROM sports_news2 LIMIT 2");
                while ($s_right = mysqli_fetch_assoc($sports_right_q)):
                ?>
                <article class="related-news-item">
                    <div class="sports-item-row">
                    <div class="sports-item-text">
                        <a href="news-details.php?id=<?= $s_right['id'] ?>&table=sports_news2">
                            <h3><?= $s_right['title'] ?></h3>
                        </a>
                    </div>
                    <?php if (!empty($s_right['image'])): ?>
                    <div class="sports-item-thumb">
                        <a href="news-details.php?id=<?= $s_right['id'] ?>&table=sports_news2">
                            <img src="<?= $s_right['image'] ?>" alt="">
                        </a>
                    </div>
                    <?php endif; ?>
                </div>
                </article>
                <?php endwhile; ?>
            </aside>
        </div>
    </section>



<?php
// Remove the duplicate include 'db.php' if you already have it at the top
// DB connection is already included at top as config/db.php

$video_q = mysqli_query($conn, "SELECT * FROM video WHERE status=1 ORDER BY id DESC LIMIT 10");

// Function to display time ago
function timeAgo($datetime){
    $time = strtotime($datetime);
    $diff = time() - $time;

    if ($diff < 60) return "মাত্র এখন";
    elseif ($diff < 3600) return floor($diff/60)." মিনিট আগে";
    elseif ($diff < 86400) return floor($diff/3600)." ঘণ্টা আগে";
    else return floor($diff/86400)." দিন আগে";
}
?>

<section class="video-section">
    <div class="video-container">
        <div class="video-header">
            <a href="category.php?cat=video" style="text-decoration:none; color:inherit;">
                <h2>ভিডিও <span class="arrow-icon">›</span></h2>
            </a>
        </div>

      <!-- Modal -->
<div id="videoModal" class="video-modal">
    <div class="video-modal-content">
        <span class="close-modal" onclick="closeVideoModal()">×</span>
        <video id="modalVideo" controls autoplay>
            <source id="modalVideoSrc" src="" type="video/mp4">
        </video>
        <p id="modalVideoTitle" style="color:#fff; margin-top:10px;"></p>
    </div>
</div>
        <div class="video-gallery-wrapper">
            <button class="nav-arrow nav-arrow-left" onclick="scrollVideoGallery(-1)"><span>‹</span></button>
            <div class="video-gallery" id="videoGallery">
                <?php while ($video = mysqli_fetch_assoc($video_q)):
                    //echo $video['video_file'];
                    ?>
                <div class="video-card" onclick="openVideoModal('<?= addslashes($video['video_file']) ?>', '<?= addslashes($video['title']) ?>')">
                    <div class="video-thumbnail">
                        <?php if (!empty($video['thumbnail'])): ?>
                            <img src="<?= $video['thumbnail'] ?>" alt="<?= htmlspecialchars($video['title']) ?>">
                        <?php else: ?>
                            <div class="no-thumbnail">No Image</div>
                        <?php endif; ?>
                        <div class="play-button">
                            <svg width="60" height="60" viewBox="0 0 60 60">
                                <circle cx="30" cy="30" r="28" fill="#d71920" opacity="0.9" />
                                <polygon points="24,18 24,42 42,30" fill="white" />
                            </svg>
                        </div>
                    </div>
                    <div class="video-info">
                        <h3><?= htmlspecialchars($video['title']) ?></h3>
                        <span class="time"><?= timeAgo($video['created_at']) ?></span>
                    </div>
                </div>
                <?php endwhile; ?>
            </div>
            <button class="nav-arrow nav-arrow-right" onclick="scrollVideoGallery(1)"><span>›</span></button>
        </div>
    </div>
</section>



<!-- Video Modal -->
<div id="videoModal" class="video-modal">
    <div class="video-modal-content">
        <span class="close-modal" onclick="closeVideoModal()">&times;</span>
        <h2 id="modalVideoTitle" style="margin-bottom: 15px; font-size: 1.2rem;"></h2>
        <video id="modalVideo" controls style="width: 100%; border-radius: 8px;">
            <source id="modalVideoSrc" src="" type="video/mp4">
            Your browser does not support the video tag.
        </video>
    </div>
</div>

<script>
function openVideoModal(file, title) {
    const modal = document.getElementById('videoModal');
    const video = document.getElementById('modalVideo');
    const videoSrc = document.getElementById('modalVideoSrc');
    
    video.pause();
    videoSrc.src = file;
    video.load();
    video.play();
    
    document.getElementById('modalVideoTitle').innerText = title;
    modal.style.display = 'flex';
}

function closeVideoModal() {
    const modal = document.getElementById('videoModal');
    const video = document.getElementById('modalVideo');
    video.pause();
    modal.style.display = 'none';
}

function scrollVideoGallery(direction) {
    const gallery = document.getElementById('videoGallery');
    const scrollAmount = 340;
    gallery.scrollBy({
        left: direction * scrollAmount,
        behavior: 'smooth'
    });
}
</script>

    <section class="opinion-section">
        <div class="opinion-container">
            <div class="opinion-header">
                <a href="category.php?cat=opinion" style="text-decoration:none; color:inherit;">
                    <h2>মতামত <span class="arrow-icon red">›</span></h2>
                </a>
            </div>

            <div class="opinion-content">
                <!-- LEFT FEATURED : motamot -->
                <div class="opinion-featured">
                    <?php if ($motamot && mysqli_num_rows($motamot) > 0): 
                        $m1 = mysqli_fetch_assoc($motamot);
                    ?>
                    <div class="featured-card">
                        <div class="featured-title-box">
                            <a href="news-details.php?id=<?= $m1['id'] ?>&table=motamot" style="color: inherit; text-decoration: none;">
                                <span class="title-main"><?= htmlspecialchars($m1['badge_text'] ?? 'মতামত') ?></span>
                                <span class="dot-separator">•</span>
                                <span class="title-sub"><?= htmlspecialchars($m1['title'] ?? '') ?></span>
                            </a>
                        </div>
                        <div class="featured-content">
                            <p><?= htmlspecialchars($m1['description'] ?? '') ?></p>
                        </div>
                        <div class="featured-author-line">
                            <span class="author-label">লেখা:</span>
                            <span class="author-name"><?= htmlspecialchars($m1['author'] ?? '') ?></span>
                        </div>
                    </div>
                    <?php else: ?>
                    <div class="featured-card">
                        <div class="featured-title-box">
                            <span class="title-main">মতামত</span>
                            <span class="dot-separator">•</span>
                            <span class="title-sub">এখানে প্রতিবেদনের শিরোনাম থাকবে</span>
                        </div>
                        <div class="featured-content">
                            <p>মতামত কলামের বিস্তারিত বিবরণ।</p>
                        </div>
                        <div class="featured-author-line">
                            <span class="author-label">লেখা:</span>
                            <span class="author-name">লেখক নাম</span>
                        </div>
                    </div>
                    <?php endif; ?>
                </div>

                <!-- RIGHT LIST : motamot1 -->
                <div class="opinion-list">
                    <?php if ($res_motamot_right && mysqli_num_rows($res_motamot_right) > 0): 
                        while ($m2 = mysqli_fetch_assoc($res_motamot_right)):
                    ?>
                    <div class="opinion-item">
                        <div class="opinion-avatar">
                            <?php if (!empty($m2['image'])): ?>
                                <img src="<?= htmlspecialchars($m2['image']) ?>" alt="">
                            <?php else: ?>
                                <img src="mota mot.webp" alt="">
                            <?php endif; ?>
                        </div>
                        <div class="opinion-text">
                            <a href="news-details.php?id=<?= $m2['id'] ?>&table=motamot1" style="text-decoration: none; color: inherit;">
                                <h3 class="opinion-title">
                                    <span class="opinion-kicker"><?= htmlspecialchars($m2['badge_text'] ?? 'মতামত') ?></span>
                                    <span class="kicker-dot">•</span>
                                    <?= htmlspecialchars($m2['title'] ?? '') ?>
                                </h3>
                            </a>
                           <p class="opinion-meta">লেখা: <span class="author-accent"><?= htmlspecialchars($m2['author'] ?? '') ?></span></p>
                        </div>
                    </div>
                    <?php endwhile; else: ?>
                    <div class="opinion-item">
                        <div class="opinion-avatar"><img src="mota mot.webp" alt=""></div>
                        <div class="opinion-text">
                            <h3 class="opinion-title"><span class="opinion-kicker">মতামত</span> <span class="kicker-dot">•</span> শিরোনাম</h3>
                            <p class="opinion-meta">লেখা: লেখক</p>
                        </div>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>

    <!-- ================= JIBONJAPPON SECTION ================= -->
    <section class="jibonjappon-section">
        <div class="jibonjappon-container">
            <div class="jibonjappon-header">
                <a href="category.php?cat=jibonjappon" style="text-decoration:none; color:inherit;">
                    <h2>জীবনযাপন <span class="arrow-red">›</span></h2>
                </a>
            </div>
            <div class="jibonjappon-grid">
                <?php
                if (isset($jibonjappon) && $jibonjappon && mysqli_num_rows($jibonjappon) > 0) {
                    while ($row = mysqli_fetch_assoc($jibonjappon)) {
                        // Handle different possible field names
                        $description = isset($row['short_desc']) ? $row['short_desc'] : (isset($row['description']) ? $row['description'] : '');
                        $date = isset($row['published_date']) ? $row['published_date'] : (isset($row['created_at']) ? $row['created_at'] : '');
                ?>
                <div class="jibonjappon-card">
                    <div class="jibonjappon-image">
                        <a href="news-details.php?id=<?= $row['id'] ?>&table=jibonjappon">
                            <?php if(!empty($row['image'])): ?>
                            <img src="<?= htmlspecialchars($row['image']) ?>" alt="<?= htmlspecialchars($row['title']) ?>">
                            <?php else: ?>
                            <img src="https://placehold.co/300x200" alt="Placeholder">
                            <?php endif; ?>
                        </a>
                    </div>
                    <div class="jibonjappon-content">
                        <a href="news-details.php?id=<?= $row['id'] ?>&table=jibonjappon">
                            <h3><?= htmlspecialchars($row['title']) ?></h3>
                        </a>
                        <?php if(!empty($description)): ?>
                        <p><?= htmlspecialchars($description) ?></p>
                        <?php endif; ?>
                        <?php if(!empty($date)): ?>
                        <span class="time"><?= timeAgo($date) ?></span>
                        <?php endif; ?>
                    </div>
                </div>
                <?php
                    }
                } else {
                    // Fallback if no data
                    echo '<p style="padding: 20px; text-align: center; color: #999;">জীবনযাপন বিভাগে কোনো সংবাদ নেই।</p>';
                }
                ?>
            </div>
        </div>
    </section>

    <!-- ================= BANIJJO SECTION ================= -->
    <section class="banijjo-section">
        <div class="banijjo-container">
            <div class="banijjo-header">
                <a href="category.php?cat=banijjo" style="text-decoration:none; color:inherit;">
                    <h2> বাণিজ্য <span class="arrow-icon">›</span></h2>
                </a>
            </div>
            <div class="banijjo-content">
                <div class="banijjo-main-item">
                    <?php 
                    $banijjo_q = mysqli_query($conn, "SELECT * FROM banijjo ORDER BY published_date DESC LIMIT 1");
                    $b_main = mysqli_fetch_assoc($banijjo_q);
                    if ($b_main): 
                    ?>
                        <div class="banijjo-main-image">
                            <a href="news-details.php?id=<?= $b_main['id'] ?>&table=banijjo">
                                <?php if(!empty($b_main['image'])): ?>
                                <img src="<?= $b_main['image'] ?>" alt="">
                                <?php else: ?>
                                <img src="https://placehold.co/600x400" alt="Placeholder">
                                <?php endif; ?>
                            </a>
                        </div>
                        <a href="news-details.php?id=<?= $b_main['id'] ?>&table=banijjo" style="text-decoration:none;">
                            <h3><?= $b_main['title'] ?></h3>
                        </a>
                        <p><?= isset($b_main['description']) ? mb_strimwidth(strip_tags($b_main['description']), 0, 200, "...") : '' ?></p>
                        <span class="time"><?= isset($b_main['published_date']) ? timeAgo($b_main['published_date']) : '' ?></span>
                    <?php else: ?>
                        <div class="banijjo-main-image">
                             <img src="https://placehold.co/600x400" alt="Placeholder">
                        </div>
                        <h3>বাণিজ্য সংবাদ শিরোনাম</h3>
                        <p>এখানে বাণিজ্যের প্রধান সংবাদের বিস্তারিত বিবরণ থাকবে।</p>
                    <?php endif; ?>
                </div>

                <!-- Right Grid (2x2) -->
                <div class="banijjo-sub-grid">
                    <?php 
                    // Fetch items for right grid from banijjo2
                    $banijjo2_q = mysqli_query($conn, "SELECT * FROM banijjo2 ORDER BY published_date DESC LIMIT 4");
                    
                    if ($banijjo2_q) {
                        while($b_sub = mysqli_fetch_assoc($banijjo2_q)): 
                    ?>
                    <div class="banijjo-sub-item">
                        <div class="banijjo-sub-image">
                            <a href="news-details.php?id=<?= $b_sub['id'] ?>&table=banijjo2">
                                <?php if(!empty($b_sub['image'])): ?>
                                <img src="<?= $b_sub['image'] ?>" alt="">
                                <?php else: ?>
                                <img src="https://placehold.co/300x200" alt="Placeholder">
                                <?php endif; ?>
                            </a>
                        </div>
                        <a href="news-details.php?id=<?= $b_sub['id'] ?>&table=banijjo2" style="text-decoration:none;">
                            <h4><?= $b_sub['title'] ?></h4>
                        </a>
                        <span class="time"><?= isset($b_sub['published_date']) ? timeAgo($b_sub['published_date']) : '' ?></span>
                    </div>
                    <?php 
                        endwhile; 
                    }
                    ?>
                </div>
            </div>
        </div>
    </section>

    <!-- ================= TOPIC SECTIONS ================= -->
    <!-- ================= TOPIC SECTIONS - FIXED DATABASE VERSION ================= -->
<section class="topic-sections">
    <div class="sections-container">
        
        <!-- ========== শিক্ষা (EDUCATION) SECTION ========== -->
        <div class="section">
            <div class="section-header">
                <a href="category.php?cat=shikkha" style="text-decoration:none; color:inherit;">
                    <h2>শিক্ষা</h2>
                    <span class="arrow">›</span>
                </a>
            </div>
            <div class="section-content">
                <?php
                // Get main article for শিক্ষা
                $shikkha_main_q = mysqli_query($conn, "SELECT * FROM shikkha WHERE is_main=1 AND status=1 ORDER BY created_at DESC LIMIT 1");
                $shikkha_main = mysqli_fetch_assoc($shikkha_main_q);
                
                // Get sub articles for শিক্ষা
                $shikkha_sub_q = mysqli_query($conn, "SELECT * FROM shikkha WHERE is_main=0 AND status=1 ORDER BY created_at DESC LIMIT 2");
                ?>
                
                <?php if ($shikkha_main): ?>
                <div class="main-article">
                    <a href="news-details.php?id=<?= $shikkha_main['id'] ?>&table=shikkha">
                    <?php if (!empty($shikkha_main['image'])): ?>
                        <img src="<?= $shikkha_main['image'] ?>" alt="<?= htmlspecialchars($shikkha_main['title']) ?>" class="main-img">
                    <?php else: ?>
                        <img src="shikkha.avif" alt="শিক্ষা" class="main-img">
                    <?php endif; ?>
                    <h3 class="main-title"><?= htmlspecialchars($shikkha_main['title']) ?></h3>
                    </a>
                </div>
                <?php else: ?>
                <!-- Fallback if no data in database -->
                <div class="main-article">
                    <img src="shikkha.avif" alt="শিক্ষা" class="main-img">
                    <h3 class="main-title">শিক্ষার প্রধান সংবাদ</h3>
                </div>
                <?php endif; ?>
                
                <div class="sub-articles">
                    <?php 
                    $sub_count = 0;
                    while ($shikkha_sub = mysqli_fetch_assoc($shikkha_sub_q)): 
                        $sub_count++;
                    ?>
                        <a href="news-details.php?id=<?= $shikkha_sub['id'] ?>&table=shikkha">
                            <p class="sub-article"><?= htmlspecialchars($shikkha_sub['title']) ?></p>
                        </a>
                    <?php endwhile; ?>
                    
                    <?php 
                    // Show fallback if no sub articles in database
                    if ($sub_count == 0): 
                    ?>
                        <p class="sub-article">শিক্ষা সংবাদ ১</p>
                        <p class="sub-article">শিক্ষা সংবাদ ২</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        
             <div class="section">
            <div class="section-header">
                <a href="category.php?cat=jobs" style="text-decoration:none; color:inherit;">
                    <h2>চাকরি</h2>
                    <span class="arrow">›</span>
                </a>
            </div>
            <div class="section-content">
                <?php
                // Get main article for চাকরি
                $chakri_main_q = mysqli_query($conn, "SELECT * FROM chakri WHERE is_main=1 AND status=1 ORDER BY created_at DESC LIMIT 1");
                $chakri_main = mysqli_fetch_assoc($chakri_main_q);
                
                // Get sub articles for চাকরি
                $chakri_sub_q = mysqli_query($conn, "SELECT * FROM chakri WHERE is_main=0 AND status=1 ORDER BY created_at DESC LIMIT 2");
                ?>
                
                <?php if ($chakri_main): ?>
                <div class="main-article">
                    <a href="news-details.php?id=<?= $chakri_main['id'] ?>&table=chakri">
                    <?php if (!empty($chakri_main['image'])): ?>
                        <img src="<?= $chakri_main['image'] ?>" alt="<?= htmlspecialchars($chakri_main['title']) ?>" class="main-img">
                    <?php else: ?>
                        <img src="sc/job.png" alt="চাকরি" class="main-img" onerror="this.src='shikkha.avif'">
                    <?php endif; ?>
                    <h3 class="main-title"><?= htmlspecialchars($chakri_main['title']) ?></h3>
                    </a>
                </div>
                <?php else: ?>
                <!-- Fallback if no data -->
                <div class="main-article">
                    <img src="sc/job.png" alt="চাকরি" class="main-img" onerror="this.src='shikkha.avif'">
                    <h3 class="main-title">চাকরির প্রধান সংবাদ</h3>
                </div>
                <?php endif; ?>
                
                <div class="sub-articles">
                    <?php 
                    $chakri_sub_count = 0;
                    while ($chakri_sub = mysqli_fetch_assoc($chakri_sub_q)): 
                        $chakri_sub_count++;
                    ?>
                        <a href="news-details.php?id=<?= $chakri_sub['id'] ?>&table=chakri">
                            <p class="sub-article"><?= htmlspecialchars($chakri_sub['title']) ?></p>
                        </a>
                    <?php endwhile; ?>
                    
                    <?php if ($chakri_sub_count == 0): ?>
                        <p class="sub-article">চাকরি সংবাদ ১</p>
                        <p class="sub-article">চাকরি সংবাদ ২</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
               <!-- ========== SECTION 3: প্রযুক্তি (TECHNOLOGY) ========== -->
        <div class="section">
            <div class="section-header">
                <a href="category.php?cat=projukti" style="text-decoration:none; color:inherit;">
                    <h2>প্রযুক্তি</h2>
                    <span class="arrow">›</span>
                </a>
            </div>
            <div class="section-content">
                <?php
                // Get main article for প্রযুক্তি
                $projukti_main_q = mysqli_query($conn, "SELECT * FROM projukti WHERE is_main=1 AND status=1 ORDER BY created_at DESC LIMIT 1");
                $projukti_main = mysqli_fetch_assoc($projukti_main_q);
                
                $projukti_sub_q = mysqli_query($conn, "SELECT * FROM projukti WHERE is_main=0 AND status=1 ORDER BY created_at DESC LIMIT 2");
                ?>
                
                <?php if ($projukti_main): ?>
                <div class="main-article">
                    <a href="news-details.php?id=<?= $projukti_main['id'] ?>&table=projukti">
                    <?php if (!empty($projukti_main['image'])): ?>
                        <img src="<?= $projukti_main['image'] ?>" alt="<?= htmlspecialchars($projukti_main['title']) ?>" class="main-img">
                    <?php else: ?>
                        <img src="mobile.avif" alt="প্রযুক্তি" class="main-img">
                    <?php endif; ?>
                    <h3 class="main-title"><?= htmlspecialchars($projukti_main['title']) ?></h3>
                    </a>
                </div>
                <?php endif; ?>
                
                <div class="sub-articles">
                    <?php while ($projukti_sub = mysqli_fetch_assoc($projukti_sub_q)): ?>
                        <a href="news-details.php?id=<?= $projukti_sub['id'] ?>&table=projukti">
                            <p class="sub-article"><?= htmlspecialchars($projukti_sub['title']) ?></p>
                        </a>
                    <?php endwhile; ?>
                </div>
            </div>
        </div>
    </main>
    <footer class="footer">
        <div class="footer-container">
            <!-- Row 1: Logo & Brand -->
            <div class="footer-logo-row">
                <div class="footer-logo">
                    <img src="logo.png" alt="Prothom Alo" class="footer-logo-img">
                    <span class="logo-dot"></span>
                </div>
            </div>

            <!-- Row 2: 6-Column Navigation -->
            <div class="footer-nav-grid">
                <div class="nav-column">
                    <a href="page.php?title=নাগরিক+সংবাদ">নাগরিক সংবাদ</a>
                    <a href="page.php?title=ইপেপার">ইপেপার</a>
                </div>
                <div class="nav-column">
                    <a href="page.php?title=কিশোর+আলো">কিশোর আলো</a>
                    <a href="page.php?title=প্রথমা">প্রথমা</a>
                </div>
                <div class="nav-column">
                    <a href="page.php?title=বিজ্ঞানচিন্তা">বিজ্ঞানচিন্তা</a>
                    <a href="page.php?title=মোবাইল+ভ্যাস">মোবাইল ভ্যাস</a>
                </div>
                <div class="nav-column">
                    <a href="page.php?title=প্রথম+আলো+ট্রাস্ট">প্রথম আলো ট্রাস্ট</a>
                </div>
                <div class="nav-column">
                    <a href="page.php?title=বন্ধুসভা">বন্ধুসভা</a>
                </div>
                <div class="nav-column">
                    <a href="page.php?title=চিরন্তন+১৯৭১">চিরন্তন ১৯৭১</a>
                </div>
            </div>

            <hr class="footer-divider">

            <!-- Row 3: Action Bar (Social & App) -->
            <div class="footer-action-row">
                <div class="footer-follow-us">
                    <span class="footer-label">অনুসরণ করুন</span>
                    <div class="footer-social-icons">
                        <a href="https://www.facebook.com/DailyProthomAlo" class="social-btn facebook" target="_blank"><i class="fab fa-facebook-f"></i></a>
                        <a href="https://twitter.com/ProthomAlo" class="social-btn twitter" target="_blank"><i class="fab fa-x-twitter"></i></a>
                        <a href="https://www.instagram.com/prothomalo" class="social-btn instagram" target="_blank"><i class="fab fa-instagram"></i></a>
                        <a href="https://www.youtube.com/c/ProthomAlo" class="social-btn youtube" target="_blank"><i class="fab fa-youtube"></i></a>
                        <a href="https://news.google.com/publications/CAAqBwgKMJv-7wow_6_ZAg" class="social-btn google-news" target="_blank"><i class="fas fa-rss"></i></a>
                    </div>
                </div>
                <div class="footer-apps">
                    <span class="footer-label">মোবাইল অ্যাপস ডাউনলোড করুন</span>
                    <div class="footer-app-btns">
                        <a href="https://play.google.com/store/apps/details?id=com.mcc.prothomalo" target="_blank"><img src="https://upload.wikimedia.org/wikipedia/commons/7/78/Google_Play_Store_badge_EN.svg" alt="Google Play"></a>
                        <a href="https://apps.apple.com/us/app/prothom-alo/id1114006275" target="_blank"><img src="https://upload.wikimedia.org/wikipedia/commons/3/3c/Download_on_the_App_Store_Badge_US-UK_RGB_blk_092917.svg" alt="App Store"></a>
                    </div>
                </div>
            </div>

            <hr class="footer-divider">

            <!-- Row 4: Bottom Links -->
            <div class="footer-bottom-links">
                <a href="https://www.prothomalo.com/about" target="_blank">আমাদের সম্পর্কে</a>
                <span class="dot"></span>
                <a href="https://www.prothomalo.com/ads" target="_blank">বিজ্ঞাপন</a>
                <span class="dot"></span>
                <a href="https://www.prothomalo.com/circulation" target="_blank">সার্কুলেশন</a>
                <span class="dot"></span>
                <a href="https://www.prothomalo.com/privacy-policy" target="_blank">নীতি ও শর্ত</a>
                <span class="dot"></span>
                <a href="https://www.prothomalo.com/contact" target="_blank">যোগাযোগ</a>
                <span class="dot"></span>
                <a href="https://www.prothomalo.com/newsletter" target="_blank">নিউজলেটার</a>
            </div>

            <!-- Row 5: Copyright -->
            <div class="footer-copyright-row">
                <p>স্বত্ব © ১৯৯৮-২০২৬ প্রথম আলো | সম্পাদক ও প্রকাশক: মতিউর রহমান</p>
            </div>
        </div>
    </footer>
    <script src="script.js"></script>
</body>
</html>
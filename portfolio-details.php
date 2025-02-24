<?php
$pageTitle = "Portfolio Details"; // Set the title dynamically
include 'header.php';
include 'db.php';

// Ensure an ID is provided in the URL, e.g., portfolio-details.php?id=3
if (!isset($_GET['id'])) {
    header("Location: portfolio.php"); // Redirect to a list page if no ID
    exit();
}

$id = $_GET['id'];

// Fetch the portfolio details from the database
$stmt = $pdo->prepare("SELECT * FROM portfolios WHERE id = ?");
$stmt->execute([$id]);
$portfolio = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$portfolio) {
    echo "<p>Portfolio not found.</p>";
    include 'footer.php';
    exit();
}

// Combine image fields into an array
$images = [];
if (!empty($portfolio['image'])) {
    $images[] = $portfolio['image'];
}
if (!empty($portfolio['image2'])) {
    $images[] = $portfolio['image2'];
}
if (!empty($portfolio['image3'])) {
    $images[] = $portfolio['image3'];
}
?>

<main class="main">

    <!-- Page Title -->
    <div class="page-title" data-aos="fade">
        <div class="heading">
            <div class="container">
                <div class="row d-flex justify-content-center text-center">
                    <div class="col-lg-8">
                        <h1><?= htmlspecialchars($portfolio['title']); ?></h1>
                        <p class="mb-0"><?= htmlspecialchars($portfolio['text']); ?></p>
                    </div>
                </div>
            </div>
        </div>
        <nav class="breadcrumbs">
            <div class="container">
                <ol>
                    <li><a href="index.php">Home</a></li>
                    <li class="current">Portfolio Details</li>
                </ol>
            </div>
        </nav>
    </div><!-- End Page Title -->

    <!-- Portfolio Details Section -->
    <section id="portfolio-details" class="portfolio-details section">
        <div class="container" data-aos="fade-up" data-aos-delay="100">
            <div class="row gy-4">
                <div class="col-lg-8">
                    <div class="portfolio-details-slider swiper init-swiper">
                        <script type="application/json" class="swiper-config">
                            {
                                "loop": true,
                                "speed": 600,
                                "autoplay": {
                                    "delay": 5000
                                },
                                "slidesPerView": "auto",
                                "pagination": {
                                    "el": ".swiper-pagination",
                                    "type": "bullets",
                                    "clickable": true
                                }
                            }
                        </script>
                        <div class="swiper-wrapper align-items-center">
                            <?php foreach ($images as $img): ?>
                                <div class="swiper-slide">
                                    <img src="<?= htmlspecialchars($img); ?>" alt="<?= htmlspecialchars($portfolio['title']); ?>">
                                </div>
                            <?php endforeach; ?>
                        </div>
                        <div class="swiper-pagination"></div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="portfolio-info" data-aos="fade-up" data-aos-delay="200">
                        <h3>Project Information</h3>
                        <ul>
                            <li><strong>Category</strong>: <?= htmlspecialchars($portfolio['category']); ?></li>
                            <li><strong>Client</strong>: <?= htmlspecialchars($portfolio['client']); ?></li>
                            <li><strong>Project Date</strong>: <?= date("d M, Y", strtotime($portfolio['date'])); ?></li>
                            <li><strong>Project URL</strong>: <a href="<?= htmlspecialchars($portfolio['link']); ?>" target="_blank">Link for the project</a></li>
                        </ul>
                    </div>
                    <div class="portfolio-description" data-aos="fade-up" data-aos-delay="300">
                        <h2><?= htmlspecialchars($portfolio['title']); ?></h2>
                        <p><?= nl2br(htmlspecialchars($portfolio['text'])); ?></p>
                    </div>
                </div>

            </div>
        </div>
    </section><!-- /Portfolio Details Section -->

</main>

<?php include 'footer.php'; ?>

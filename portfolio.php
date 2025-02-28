<?php
$pageTitle = "Portfolio"; // Set the page title dynamically
include 'header.php';      // Include the header
include 'db.php';          // Include the database connection

// Fetch portfolio data from the database
$stmt = $pdo->prepare("SELECT * FROM portfolios ORDER BY date DESC");
$stmt->execute();
$portfolios = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<main class="main">

    <!-- Page Title -->
    <div class="page-title" data-aos="fade">
        <div class="heading">
            <div class="container">
                <div class="row d-flex justify-content-center text-center">
                    <div class="col-lg-8">
                        <h1>Portfolio</h1>
                        <p class="mb-0">See some of my works!</p>
                    </div>
                </div>
            </div>
        </div>
        <nav class="breadcrumbs">
            <div class="container">
                <ol>
                    <li><a href="index.php">Home</a></li>
                    <li class="current">Portfolio</li>
                </ol>
            </div>
        </nav>
    </div><!-- End Page Title -->

    <!-- Portfolio Section -->
    <section id="portfolio" class="portfolio section">
        <div class="container">
            <div class="isotope-layout" data-default-filter="*" data-layout="masonry" data-sort="original-order">

                <!-- Portfolio Filters (Static for now; adjust if needed) -->
                <ul class="portfolio-filters isotope-filters" data-aos="fade-up" data-aos-delay="100">
                    <li data-filter="*" class="filter-active">All</li>
                    <li data-filter=".filter-app">App</li>
                    <li data-filter=".filter-product">Product</li>
                    <li data-filter=".filter-branding">Branding</li>
                    <li data-filter=".filter-books">Books</li>
                </ul><!-- End Portfolio Filters -->

                <!-- Portfolio Items -->
                <div class="row gy-4 isotope-container" data-aos="fade-up" data-aos-delay="200">
                    <?php foreach ($portfolios as $portfolio):
                        // Generate a CSS class for filtering based on category.
                        // Replace spaces with dashes and force lower-case.
                        $category_class = 'filter-' . str_replace(' ', '-', strtolower($portfolio['category']));
                        ?>
                        <div class="col-lg-4 col-md-6 portfolio-item isotope-item <?= htmlspecialchars($category_class); ?>">
                            <div class="portfolio-content h-100">
                                <img src="<?= htmlspecialchars($portfolio['image']); ?>" class="img-fluid" alt="<?= htmlspecialchars($portfolio['title']); ?>">
                                <div class="portfolio-info">
                                    <h4><?= htmlspecialchars($portfolio['title']); ?></h4>
                                    <p><?= htmlspecialchars($portfolio['client']); ?></p>
                                    <a href="<?= htmlspecialchars($portfolio['image']); ?>" title="<?= htmlspecialchars($portfolio['title']); ?>" data-gallery="portfolio-gallery-<?= htmlspecialchars(strtolower($portfolio['category'])); ?>" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                                    <a href="portfolio-details.php?id=<?= $portfolio['id']; ?>" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a>
                                </div>
                            </div>
                        </div><!-- End Portfolio Item -->
                    <?php endforeach; ?>
                </div><!-- End Portfolio Container -->

            </div>
        </div>
    </section><!-- /Portfolio Section -->

</main>

<footer id="footer" class="footer dark-background">
    <div class="container">
        <h3 class="sitename">Noel</h3>
        <p><?= htmlspecialchars($user['l_title']); ?></p>
        <div class="social-links d-flex justify-content-center">
            <a href="https://t.me/Nbekele" target="_blank"><i class="bi bi-telegram"></i></a>
            <a href="https://www.linkedin.com/in/noel-bekele-0a0193205/" target="_blank"><i class="bi bi-linkedin"></i></a>
        </div>
        <div class="container">
            <div class="copyright">
                <span>Copyright</span> <strong class="px-1 sitename">Noel</strong> <span>All Rights Reserved</span>
            </div>
            <div class="credits">
                <!-- All the links in the footer should remain intact. -->
                <!-- You can delete the links only if you've purchased the pro version. -->
                <!-- Licensing information: https://bootstrapmade.com/license/ -->
                <!-- Purchase the pro version with working PHP/AJAX contact form: [buy-url] -->
                Designed by
            </div>
        </div>
    </div>
</footer>

<!-- Scroll Top -->
<a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<!-- Preloader -->
<div id="preloader"></div>

<!-- Vendor JS Files -->
<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/vendor/php-email-form/validate.js"></script>
<script src="assets/vendor/aos/aos.js"></script>
<script src="assets/vendor/typed.js/typed.umd.js"></script>
<script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
<script src="assets/vendor/waypoints/noframework.waypoints.js"></script>
<script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
<script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
<script src="assets/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
<script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>

<!-- Main JS File -->
<script src="assets/js/main.js"></script>

</body>

</html>

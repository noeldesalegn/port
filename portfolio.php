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

<?php include 'footer.php'; ?>

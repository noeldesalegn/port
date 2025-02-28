<?php
$pageTitle = "Home"; // Set the title dynamically
include 'header.php'; // Include the header
include 'db.php';
$userId = 1; // Replace with the specific user ID you want to display
$query = $pdo->prepare("SELECT * FROM users WHERE id = ?");
$query->execute([$userId]);
$user = $query->fetch(PDO::FETCH_ASSOC);

if (!$user) {
    die("User not found.");
}
?>

<main class="main">

    <!-- Page Title -->
    <div class="page-title" data-aos="fade">
        <div class="heading">
            <div class="container">
                <div class="row d-flex justify-content-center text-center">
                    <div class="col-lg-8">
                        <h1>Resume</h1>
                        <p class="mb-0"><?= htmlspecialchars($user['about']); ?></p>
                    </div>
                </div>
            </div>
        </div>
        <nav class="breadcrumbs">
            <div class="container">
                <ol>
                    <li><a href="index.php">Home</a></li>
                    <li class="current">Resume</li>
                </ol>
            </div>
        </nav>
    </div><!-- End Page Title -->

    <!-- Resume Section -->
    <section id="resume" class="resume section">
        <div class="container">
            <div class="row">
                <!-- Left Column -->
                <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
                    <h3 class="resume-title">Summary</h3>
                    <div class="resume-item pb-0">
                        <h4><?= htmlspecialchars($user['name']); ?></h4>
                        <p><em><?= htmlspecialchars($user['s_title']); ?></em></p>
                        <ul>
                            <li><?= htmlspecialchars($user['city']); ?></li>
                            <li><?= htmlspecialchars($user['phone']); ?></li>
                            <li><?= htmlspecialchars($user['email']); ?></li>
                        </ul>
                    </div>

                    <h3 class="resume-title">Education</h3>
                    <div class="resume-item">
                        <h4><?= htmlspecialchars($user['degree']); ?></h4>
                        <h5><?= htmlspecialchars($user['b_day']); ?> - Present</h5>
                        <p><em><?= htmlspecialchars($user['city']); ?></em></p>
                        <p><?= htmlspecialchars($user['s_title']); ?></p>
                    </div>
                </div>

                <!-- Right Column -->
                <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
                    <h3 class="resume-title">Professional Experience</h3>
                    <div class="resume-item">
                        <h4><?= htmlspecialchars($user['title_name']); ?></h4>
                        <h5><?= date("Y") - 5; ?> - Present</h5>
                        <p><em><?= htmlspecialchars($user['city']); ?></em></p>
                        <ul>
                            <li><?= htmlspecialchars($user['l_title']); ?></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- /Resume Section -->

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
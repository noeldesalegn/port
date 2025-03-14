<?php
// Include database connection
include 'db.php';

// Fetch user data from the database
$userQuery = $pdo->prepare("SELECT * FROM users WHERE id = :id"); // Replace `:id` with the specific user ID or condition
$userQuery->execute(['id' => 1]); // Replace `1` with the ID of the user you want to display
$user = $userQuery->fetch(PDO::FETCH_ASSOC);

$pageTitle = $user ? $user['name'] . " - Home" : "Home"; // Set title dynamically // Set the title dynamically
//include 'header.php'; // Include the header
//
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Noel Portfolio</title>
    <meta name="description" content="">
    <meta name="keywords" content="">

    <!-- Favicons -->
    <link href="assets/img/noel%20logo.png" rel="icon">
    <link href="assets/img/noel%20logo.png" rel="apple-touch-icon">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">

    <!-- Main CSS File -->
    <link href="assets/css/main.css" rel="stylesheet">

    <!-- =======================================================
    * Template Name: Personal
    * Template URL: https://bootstrapmade.com/personal-free-resume-bootstrap-template/
    * Updated: Nov 04 2024 with Bootstrap v5.3.3
    * Author: BootstrapMade.com
    * License: https://bootstrapmade.com/license/
    ======================================================== -->
</head>

<body class="index-page">

<header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center justify-content-between">

        <a href="index.php" class="logo d-flex align-items-center">
            <!-- Uncomment the line below if you also wish to use an image logo -->
            <!-- <img src="assets/img/logo.png" alt=""> -->
            <h1 class="sitename">Noel</h1>
        </a>

        <nav id="navmenu" class="navmenu">
            <ul>

                <li><a href="index.php" class="active">Home</a></li>
                <li><a href="about.php" >About</a></li>
                <li><a href="resume.php">Resume</a></li>
                <li><a href="services.php">Services</a></li>
                <li><a href="portfolio.php" >Portfolio</a></li>
                <li><a href="contact.php" >contact</a></li>


            </ul>
            <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
        </nav>

    </div>
</header>
  <main class="main">

    <!-- Hero Section -->
    <section id="hero" class="hero section dark-background">

    <img src="assets/img/hero-bg.jpg" alt="" data-aos="fade-in">

    <div class="container" data-aos="zoom-out" data-aos-delay="100">
      <h2><?= htmlspecialchars($user['name'] ?? 'Default Name') ?></h2>
        <p>I'm <span class="typed" data-typed-items="Designer, Freelancer">Full Stack Developer</span><span class="typed-cursor typed-cursor--blink"></span></p>
      <div class="social-links">
      <a href="https://t.me/Nbekele" target="_blank"><i class="bi bi-telegram"></i></a>
      <a href="https://www.linkedin.com/in/noel-bekele-0a0193205/" target="_blank"><i class="bi bi-linkedin"></i></a>
      </div>
    </div>

  </section><!-- /Hero Section -->
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
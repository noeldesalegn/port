<?php
// Include database connection
include 'db.php';

// Fetch user data from the database
$userQuery = $pdo->prepare("SELECT * FROM users WHERE id = :id"); // Replace `:id` with the specific user ID or condition
$userQuery->execute(['id' => 1]); // Replace `1` with the ID of the user you want to display
$user = $userQuery->fetch(PDO::FETCH_ASSOC);

$pageTitle = $user ? $user['name'] . " - Home" : "Home"; // Set title dynamically // Set the title dynamically
include 'header.php'; // Include the header
?>

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

  <?php include 'footer.php'; ?>
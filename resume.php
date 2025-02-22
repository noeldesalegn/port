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

<?php include 'footer.php'; ?>
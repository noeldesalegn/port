<<?php
include 'db.php';
$pageTitle = "about"; // Set the title dynamically
include 'header.php'; // Include the header

// Fetch user data from the database
$userQuery = $pdo->prepare("SELECT * FROM users WHERE id = :id LIMIT 1"); // Replace `:id` with the specific user ID or condition
$userQuery->execute(['id' => 1]); // Replace `1` with the ID of the user you want to display
$user = $userQuery->fetch(PDO::FETCH_ASSOC);
?>

  <main class="main">

    <!-- Page Title -->
    <div class="page-title" data-aos="fade">
      <div class="heading">
        <div class="container">
          <div class="row d-flex justify-content-center text-center">
            <div class="col-lg-8">
              <h1>About</h1>
              <p class="mb-0"><?= htmlspecialchars($user['l_title']); ?></p>
            </div>
          </div>
        </div>
      </div>
      <nav class="breadcrumbs">
        <div class="container">
          <ol>
            <li><a href="index.php">Home</a></li>
            <li class="current">About</li>
          </ol>
        </div>
      </nav>
    </div><!-- End Page Title -->

    <!-- About Section -->
    <section id="about" class="about section">

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row gy-4 justify-content-center">
          <div class="col-lg-4">
            <img src="assets/img/profile-img.jpg" class="img-fluid" alt="">
          </div>
          
          <!-- <div class="col-lg-8 content">
            <h2>UI/UX Designer &amp; Web Developer.</h2>
            <p class="fst-italic py-3">
              Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore
              magna aliqua.
            </p>
            <div class="row">
              <div class="col-lg-6">
                <ul>
                  <li><i class="bi bi-chevron-right"></i> <strong>Birthday:</strong> <span>1 May 1995</span></li>
                  <li><i class="bi bi-chevron-right"></i> <strong>Website:</strong> <span>www.example.com</span></li>
                  <li><i class="bi bi-chevron-right"></i> <strong>Phone:</strong> <span>+123 456 7890</span></li>
                  <li><i class="bi bi-chevron-right"></i> <strong>City:</strong> <span>New York, USA</span></li>
                </ul>
              </div>
              <div class="col-lg-6">
                <ul>
                  <li><i class="bi bi-chevron-right"></i> <strong>Age:</strong> <span>30</span></li>
                  <li><i class="bi bi-chevron-right"></i> <strong>Degree:</strong> <span>Master</span></li>
                  <li><i class="bi bi-chevron-right"></i> <strong>Email:</strong> <span>email@example.com</span></li>
                  <li><i class="bi bi-chevron-right"></i> <strong>Freelance:</strong> <span>Available</span></li>
                </ul>
              </div>
            </div>
            <p class="py-3">
              Officiis eligendi itaque labore et dolorum mollitia officiis optio vero. Quisquam sunt adipisci omnis et ut. Nulla accusantium dolor incidunt officia tempore. Et eius omnis.
              Cupiditate ut dicta maxime officiis quidem quia. Sed et consectetur qui quia repellendus itaque neque.
            </p>
          </div> -->
          <div class="col-lg-8 content">
    <h2><?= htmlspecialchars($user['title_name']); ?></h2>
    <p class="fst-italic py-3">
        <?= htmlspecialchars($user['s_title']); ?>
    </p>
    <div class="row">
        <div class="col-lg-6">
            <ul>
                <li><i class="bi bi-chevron-right"></i> <strong>Birthday:</strong> <span><?= htmlspecialchars($user['b_day']); ?></span></li>
                <li><i class="bi bi-chevron-right"></i> <strong>Website:</strong> <span><?= htmlspecialchars($user['website']); ?></span></li>
                <li><i class="bi bi-chevron-right"></i> <strong>Phone:</strong> <span><?= htmlspecialchars($user['phone']); ?></span></li>
                <li><i class="bi bi-chevron-right"></i> <strong>City:</strong> <span><?= htmlspecialchars($user['city']); ?></span></li>
            </ul>
        </div>
        <div class="col-lg-6">
            <ul>
                <li><i class="bi bi-chevron-right"></i> <strong>Age:</strong> <span><?= htmlspecialchars($user['age']); ?></span></li>
                <li><i class="bi bi-chevron-right"></i> <strong>Degree:</strong> <span><?= htmlspecialchars($user['degree']); ?></span></li>
                <li><i class="bi bi-chevron-right"></i> <strong>Email:</strong> <span><?= htmlspecialchars($user['email']); ?></span></li>
                <li><i class="bi bi-chevron-right"></i> <strong>Freelance:</strong> <span><?= $user['freelance'] ? 'Available' : 'Not Available'; ?></span></li>
            </ul>
        </div>
    </div>
    <p class="py-3">
        <?= htmlspecialchars($user['about']); ?>
    </p>
</div>
        </div>

      </div>

    </section><!-- /About Section -->

    <!-- Stats Section -->
    <section id="stats" class="stats section">

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row gy-4">

          <!-- <div class="col-lg-3 col-md-6 d-flex flex-column align-items-center">
            <i class="bi bi-emoji-smile"></i>
            <div class="stats-item">
              <span data-purecounter-start="0" data-purecounter-end="232" data-purecounter-duration="1" class="purecounter"></span>
              <p>Happy Clients</p>
            </div>
          </div>End Stats Item -->

          <div class="col-lg-3 col-md-6 d-flex flex-column align-items-center">
            <i class="bi bi-journal-richtext"></i>
            <div class="stats-item">
              <span data-purecounter-start="0" data-purecounter-end="20" data-purecounter-duration="1" class="purecounter"></span>
              <p>Projects</p>
            </div>
          </div><!-- End Stats Item -->

          <!-- <div class="col-lg-3 col-md-6 d-flex flex-column align-items-center">
            <i class="bi bi-headset"></i>
            <div class="stats-item">
              <span data-purecounter-start="0" data-purecounter-end="1463" data-purecounter-duration="1" class="purecounter"></span>
              <p>Hours Of Support</p>
            </div>
          </div>End Stats Item -->

          <!-- <div class="col-lg-3 col-md-6 d-flex flex-column align-items-center">
            <i class="bi bi-people"></i>
            <div class="stats-item">
              <span data-purecounter-start="0" data-purecounter-end="15" data-purecounter-duration="1" class="purecounter"></span>
              <p>Hard Workers</p>
            </div>
          </div>End Stats Item -->

        </div>

      </div>

    </section><!-- /Stats Section -->

    <!-- Skills Section -->
     


    <!-- Interests Section -->
    <section id="interests" class="interests section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Features</h2>
        <div><span>I'm</span> <span class="description-title">interested in</span></div>
      </div><!-- End Section Title -->

      <div class="container">

        <div class="row gy-4">
        <!-- HTML5 -->
         <div class="col-lg-3 col-md-4" data-aos="fade-up" data-aos-delay="100">
          <div class="features-item">
            <img src="assets/img/html.png" alt="HTML5" class="img-fluid mx-3" style="width: 25%; height: auto; border-radius: 8px;">
            <h3><a href="" class="stretched-link">HTML</a></h3>
          </div>
        </div>
        <!-- CSS3 -->
        <div class="col-lg-3 col-md-4" data-aos="fade-up" data-aos-delay="150">
          <div class="features-item">
            <img src="assets/img/css-3.png" alt="CSS3" class="img-fluid mx-3" style="width: 25%; height: auto; border-radius: 8px;">
            <h3><a href="" class="stretched-link">CSS</a></h3>
          </div>
        </div>
        <!-- JavaScript -->
        <div class="col-lg-3 col-md-4" data-aos="fade-up" data-aos-delay="200">
          <div class="features-item">
            <img src="assets/img/js.png" alt="JavaScript" class="img-fluid mx-3" style="width: 25%; height: auto; border-radius: 8px;">
            <h3><a href="" class="stretched-link">JavaScript</a></h3>
          </div>
        </div>
        <!-- Bootstrap -->
        <div class="col-lg-3 col-md-4" data-aos="fade-up" data-aos-delay="250">
          <div class="features-item">
            <img src="assets/img/bootstrap.png" alt="Bootstrap" class="img-fluid mx-3" style="width: 25%; height: auto; border-radius: 8px;">
            <h3><a href="" class="stretched-link">Bootstrap</a></h3>
          </div>
        </div>
        <!-- SQL -->
        <div class="col-lg-3 col-md-4" data-aos="fade-up" data-aos-delay="300">
          <div class="features-item">
            <img src="assets/img/sql-server.png" alt="SQL" class="img-fluid mx-3" style="width: 25%; height: auto; border-radius: 8px;">
            <h3><a href="" class="stretched-link">SQL</a></h3>
          </div>
        </div>
        <!-- CodeIgniter 4 -->
        <div class="col-lg-3 col-md-4" data-aos="fade-up" data-aos-delay="350">
          <div class="features-item">
            <img src="assets/img/social-media.png" alt="CodeIgniter 4" class="img-fluid mx-3" style="width: 25%; height: auto; border-radius: 8px;">
            <h3><a href="" class="stretched-link">CodeIgniter 4</a></h3>
          </div>
        </div>
        <!-- Laravel -->
        <div class="col-lg-3 col-md-4" data-aos="fade-up" data-aos-delay="400">
          <div class="features-item">
            <img src="assets/img/laravel.png" alt="Laravel" class="img-fluid mx-3" style="width: 25%; height: auto; border-radius: 8px;">
            <h3><a href="" class="stretched-link">Laravel</a></h3>
          </div>
        </div>
        <!-- Python -->
        <div class="col-lg-3 col-md-4" data-aos="fade-up" data-aos-delay="450">
          <div class="features-item">
            <img src="assets/img/python.png" alt="Python" class="img-fluid mx-3" style="width: 25%; height: auto; border-radius: 8px;">
            <h3><a href="" class="stretched-link">Python</a></h3>
          </div>
        </div>
        <!-- Java -->
        <div class="col-lg-3 col-md-4" data-aos="fade-up" data-aos-delay="500">
          <div class="features-item">
            <img src="assets/img/java.png" alt="Java" class="img-fluid mx-3" style="width: 25%; height: auto; border-radius: 8px;">
            <h3><a href="" class="stretched-link">Java</a></h3>
          </div>
        </div>
        <!-- C++ -->
        <div class="col-lg-3 col-md-4" data-aos="fade-up" data-aos-delay="550">
          <div class="features-item">
            <img src="assets/img/c-.png" alt="C++" class="img-fluid mx-3" style="width: 25%; height: auto; border-radius: 8px;">
            <h3><a href="" class="stretched-link">C++</a></h3>
          </div>
        </div>
        <!-- Flutter -->
        <div class="col-lg-3 col-md-4" data-aos="fade-up" data-aos-delay="600">
          <div class="features-item">
            <img src="assets/img/flutter.png" alt="Flutter" class="img-fluid mx-3" style="width: 25%; height: auto; border-radius: 8px;">
            <h3><a href="" class="stretched-link">Flutter</a></h3>
          </div>
        </div>
        <!-- Dart -->
        <div class="col-lg-3 col-md-4" data-aos="fade-up" data-aos-delay="650">
          <div class="features-item">
            <img src="assets/img/dart.png" alt="Dart" class="img-fluid mx-3" style="width: 25%; height: auto; border-radius: 8px;">
            <h3><a href="" class="stretched-link">Dart</a></h3>
          </div>
        </div>
        <!-- Git -->
        <div class="col-lg-3 col-md-4" data-aos="fade-up" data-aos-delay="700">
          <div class="features-item">
            <img src="assets/img/icons8-git-50.png" alt="Git" class="img-fluid mx-3" style="width: 25%; height: auto; border-radius: 8px;">
            <h3><a href="" class="stretched-link">Git</a></h3>
          </div>
        </div>
        <!-- Docker -->
        <div class="col-lg-3 col-md-4" data-aos="fade-up" data-aos-delay="750">
          <div class="features-item">
            <img src="assets/img/icons8-docker-48.png" alt="Docker" class="img-fluid mx-3" style="width: 25%; height: auto; border-radius: 8px;">
            <h3><a href="" class="stretched-link">Docker</a></h3>
          </div>
        </div>
        <!-- Linux -->
        <div class="col-lg-3 col-md-4" data-aos="fade-up" data-aos-delay="800">
          <div class="features-item">
            <img src="assets/img/linux--v1.png" alt="Linux" class="img-fluid mx-3" style="width: 25%; height: auto; border-radius: 8px;">
            <h3><a href="" class="stretched-link">Linux</a></h3>
          </div>
        </div>

      </div>

    </section><!-- /Interests Section -->

    
  </main>

  <?php include 'footer.php'; ?>
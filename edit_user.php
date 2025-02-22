<?php
session_start();
include 'db.php';

// Redirect if not logged in
if (!isset($_SESSION['admin_id'])) {
    header("Location: admin_login.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Update user profile
    $name = $_POST['name'];
    $email = $_POST['email'];
    $city = $_POST['city'];
    $about = $_POST['about'];
    $title_name = $_POST['title_name'];
    $b_day = $_POST['b_day'];
    $s_title = $_POST['s_title'];
    $l_title = $_POST['l_title'];
    $website = $_POST['website'];
    $phone = $_POST['phone'];
    $age = $_POST['age'];

    $stmt = $pdo->prepare("UPDATE users SET 
        name = ?, 
        email = ?, 
        city = ?, 
        about = ?, 
        title_name = ?, 
        b_day = ?, 
        s_title = ?, 
        l_title = ?, 
        website = ?, 
        phone = ?, 
        age = ? 
        WHERE id = 1");
    $stmt->execute([
        $name, 
        $email, 
        $city, 
        $about, 
        $title_name, 
        $b_day, 
        $s_title, 
        $l_title, 
        $website, 
        $phone, 
        $age
    ]);

    header("Location: dashboard.php");
    exit();
}

// Fetch the current user's profile
$stmt = $pdo->prepare("SELECT * FROM users WHERE id = 1");
$stmt->execute();
$user = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<div class="container my-5">
    <div class="card shadow-lg border-0">
        <div class="card-header bg-primary text-white text-center">
            <h1 class="fw-bold">Edit Profile</h1>
        </div>
        <div class="card-body">
            <form method="POST" action="">
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" id="name" name="name" class="form-control" value="<?= htmlspecialchars($user['name']); ?>" required>
                    </div>
                    <div class="col-md-6">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" id="email" name="email" class="form-control" value="<?= htmlspecialchars($user['email']); ?>" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="city" class="form-label">City</label>
                        <input type="text" id="city" name="city" class="form-control" value="<?= htmlspecialchars($user['city']); ?>" required>
                    </div>
                    <div class="col-md-6">
                        <label for="b_day" class="form-label">Birthday</label>
                        <input type="date" id="b_day" name="b_day" class="form-control" value="<?= htmlspecialchars($user['b_day']); ?>" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="title_name" class="form-label">Title</label>
                        <input type="text" id="title_name" name="title_name" class="form-control" value="<?= htmlspecialchars($user['title_name']); ?>" required>
                    </div>
                    <div class="col-md-6">
                        <label for="age" class="form-label">Age</label>
                        <input type="number" id="age" name="age" class="form-control" value="<?= htmlspecialchars($user['age']); ?>" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="s_title" class="form-label">Short Title</label>
                        <input type="text" id="s_title" name="s_title" class="form-control" value="<?= htmlspecialchars($user['s_title']); ?>" required>
                    </div>
                    <div class="col-md-6">
                        <label for="l_title" class="form-label">Long Title</label>
                        <textarea id="l_title" name="l_title" class="form-control" rows="3" required><?= htmlspecialchars($user['l_title']); ?></textarea>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="website" class="form-label">Website</label>
                        <input type="url" id="website" name="website" class="form-control" value="<?= htmlspecialchars($user['website']); ?>" required>
                    </div>
                    <div class="col-md-6">
                        <label for="phone" class="form-label">Phone</label>
                        <input type="text" id="phone" name="phone" class="form-control" value="<?= htmlspecialchars($user['phone']); ?>" required>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="about" class="form-label">About</label>
                    <textarea id="about" name="about" class="form-control" rows="4" required><?= htmlspecialchars($user['about']); ?></textarea>
                </div>

                <button type="submit" class="btn btn-primary w-100">Save Changes</button>
            </form>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>

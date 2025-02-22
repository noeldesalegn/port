<?php
session_start();
include 'db.php';

if (!isset($_SESSION['admin_id'])) {
    header("Location: admin_login.php");
    exit();
}

// Fetch user data
$stmt = $pdo->prepare("SELECT * FROM users WHERE id = ?");
$stmt->execute([1]); // Fetching user with id = 1, adjust as needed
$user = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<div class="container my-5">
    <div class="card shadow-lg border-0">
        <div class="card-header bg-dark text-white text-center">
            <h1 class="fw-bold">Welcome to the Admin Panel</h1>
            <a href="logout.php" class="btn btn-danger mt-3 float-end">Logout</a>
            <p class="mb-0">Hello, Admin! Manage your content here:</p>
        </div>
        <div class="card-body">
            <h3 class="mb-3">User Profile</h3>
            <ul class="list-group list-group-flush">
                <li class="list-group-item"><strong>Name:</strong> <?= htmlspecialchars($user['name']); ?></li>
                <li class="list-group-item"><strong>Email:</strong> <?= htmlspecialchars($user['email']); ?></li>
                <li class="list-group-item"><strong>City:</strong> <?= htmlspecialchars($user['city']); ?></li>
            </ul>
            <a href="edit_user.php?id=1" class="btn btn-primary mt-3">Edit Profile</a>
        </div>
    </div>

    
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>

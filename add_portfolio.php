<?php
session_start();
include 'db.php';

// Redirect if not logged in
if (!isset($_SESSION['admin_id'])) {
    header("Location: admin_login.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // add user's portfolio
    $title = $_POST['title'];
    $sText = $_POST['sText'];
    $text = $_POST['text'];
    $category = $_POST['category'];
    $client = $_POST['client'];
    $date = $_POST['date'];
    $link = $_POST['link'];

    // Handle file upload for the image
    if (isset($_FILES['image']) && $_FILES['image']['error'] === 0) {
        // Define allowed file extensions
        $allowed_ext = ['jpg', 'jpeg', 'png', 'gif'];
        $file_name   = $_FILES['image']['name'];
        $file_size   = $_FILES['image']['size'];
        $file_tmp    = $_FILES['image']['tmp_name'];

        // Get the file extension
        $ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
        if (!in_array($ext, $allowed_ext)) {
            die("Error: Invalid file type. Only JPG, JPEG, PNG, and GIF files are allowed.");
        }

        // Check file size limit (example: 2MB)
        if ($file_size > 2097152) {
            die("Error: File size exceeds the limit of 2MB.");
        }

        // Create a unique file name for the image
        $new_file_name = uniqid("portfolio_", true) . '.' . $ext;

        // Set the upload directory (ensure this directory exists and is writable)
        $upload_dir = 'uploads/';
        if (!is_dir($upload_dir)) {
            mkdir($upload_dir, 0777, true);
        }

        $upload_path = $upload_dir . $new_file_name;
        if (move_uploaded_file($file_tmp, $upload_path)) {
            // Set the image path to be stored in the database
            $image = $upload_path;
        } else {
            die("Error: Failed to upload the file.");
        }
    } else {
        die("Error: No file uploaded or file upload error occurred.");
    }
    // Handle file upload for the image
    if (isset($_FILES['image2']) && $_FILES['image2']['error'] === 0) {
        // Define allowed file extensions
        $allowed_ext = ['jpg', 'jpeg', 'png', 'gif'];
        $file_name   = $_FILES['image2']['name'];
        $file_size   = $_FILES['image2']['size'];
        $file_tmp    = $_FILES['image2']['tmp_name'];

        // Get the file extension
        $ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
        if (!in_array($ext, $allowed_ext)) {
            die("Error: Invalid file type. Only JPG, JPEG, PNG, and GIF files are allowed.");
        }

        // Check file size limit (example: 2MB)
        if ($file_size > 2097152) {
            die("Error: File size exceeds the limit of 2MB.");
        }

        // Create a unique file name for the image
        $new_file_name = uniqid("portfolio_", true) . '.' . $ext;

        // Set the upload directory (ensure this directory exists and is writable)
        $upload_dir = 'uploads/';
        if (!is_dir($upload_dir)) {
            mkdir($upload_dir, 0777, true);
        }

        $upload_path = $upload_dir . $new_file_name;
        if (move_uploaded_file($file_tmp, $upload_path)) {
            // Set the image path to be stored in the database
            $image2 = $upload_path;
        } else {
            die("Error: Failed to upload the file.");
        }
    } else {
        die("Error: No file uploaded or file upload error occurred.");
    }
    // Handle file upload for the image
    if (isset($_FILES['image3']) && $_FILES['image3']['error'] === 0) {
        // Define allowed file extensions
        $allowed_ext = ['jpg', 'jpeg', 'png', 'gif'];
        $file_name   = $_FILES['image3']['name'];
        $file_size   = $_FILES['image3']['size'];
        $file_tmp    = $_FILES['image3']['tmp_name'];

        // Get the file extension
        $ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
        if (!in_array($ext, $allowed_ext)) {
            die("Error: Invalid file type. Only JPG, JPEG, PNG, and GIF files are allowed.");
        }

        // Check file size limit (example: 2MB)
        if ($file_size > 2097152) {
            die("Error: File size exceeds the limit of 2MB.");
        }

        // Create a unique file name for the image
        $new_file_name = uniqid("portfolio_", true) . '.' . $ext;

        // Set the upload directory (ensure this directory exists and is writable)
        $upload_dir = 'uploads/';
        if (!is_dir($upload_dir)) {
            mkdir($upload_dir, 0777, true);
        }

        $upload_path = $upload_dir . $new_file_name;
        if (move_uploaded_file($file_tmp, $upload_path)) {
            // Set the image path to be stored in the database
            $image3 = $upload_path;
        } else {
            die("Error: Failed to upload the file.");
        }
    } else {
        die("Error: No file uploaded or file upload error occurred.");
    }
    // Insert the new portfolio into the database
    $stmt = $pdo->prepare("INSERT INTO portfolios 
        (title, text, sText, category, client, date, link, image , image2 , image3) 
        VALUES (?, ?, ?, ?, ?, ? ,? , ? ,? , ?)");

    $stmt->execute([
        $title,
        $sText,
        $text,
        $category,
        $client,
        $date,
        $link,
        $image,
        $image2,
        $image3
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
    <title>add Profolio</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<div class="container my-5">
    <div class="card shadow-lg border-0">
        <div class="card-header bg-primary text-white text-center">
            <h1 class="fw-bold">Add Profile</h1>
        </div>
        <div class="card-body">
            <form method="POST" action="" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="title" class="form-label">Portfolio Title</label>
                    <input type="text" id="title" name="title" class="form-control" placeholder="Enter portfolio title" required>
                </div>
                <div class="mb-3">
                    <label for="sText" class="form-label">short Text</label>
                    <textarea id="sText" name="sText" class="form-control" placeholder="Enter portfolio short text" required></textarea>
                </div>
                <div class="mb-3">
                    <label for="text" class="form-label">Text</label>
                    <textarea id="text" name="text" class="form-control" placeholder="Enter portfolio text" required></textarea>
                </div>
                <div class="mb-3">
                    <label for="category" class="form-label">Category</label>
                    <input type="text" id="category" name="category" class="form-control" placeholder="Enter category" required>
                </div>
                <div class="mb-3">
                    <label for="client" class="form-label">Client</label>
                    <input type="text" id="client" name="client" class="form-control" placeholder="Enter client name" required>
                </div>
                <div class="mb-3">
                    <label for="date" class="form-label">Date</label>
                    <input type="date" id="date" name="date" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="link" class="form-label">Link</label>
                    <input type="url" id="link" name="link" class="form-control" placeholder="Enter portfolio link" required>
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label">Upload Image</label>
                    <input type="file" id="image" name="image" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="image2" class="form-label">Upload Image</label>
                    <input type="file" id="image2" name="image2" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="image3" class="form-label">Upload Image</label>
                    <input type="file" id="image3" name="image3" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary w-100">Add Portfolio</button>            </form>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>

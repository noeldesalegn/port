<?php
session_start();
include 'db.php';

// Redirect if not logged in
if (!isset($_SESSION['admin_id'])) {
    header("Location: admin_login.php");
    exit();
}

// Check if portfolio id is provided
if (!isset($_GET['id'])) {
    die("No portfolio ID provided.");
}

$id = $_GET['id'];

// Fetch the existing portfolio record
$stmt = $pdo->prepare("SELECT * FROM portfolios WHERE id = ?");
$stmt->execute([$id]);
$portfolio = $stmt->fetch(PDO::FETCH_ASSOC);
if (!$portfolio) {
    die("Portfolio not found.");
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve posted data
    $title    = $_POST['title'];
    $sText    = $_POST['sText'];
    $text     = $_POST['text'];
    $category = $_POST['category'];
    $client   = $_POST['client'];
    $date     = $_POST['date'];
    $link     = $_POST['link'];

    // Define allowed file extensions and max file size (2MB)
    $allowed_ext = ['jpg', 'jpeg', 'png', 'gif'];
    $max_size    = 2097152; // 2MB
    $upload_dir  = 'uploads/';

    // Ensure the uploads directory exists
    if (!is_dir($upload_dir)) {
        mkdir($upload_dir, 0777, true);
    }

    // Process image 1 upload
    if (isset($_FILES['image'])) {
        if ($_FILES['image']['error'] === UPLOAD_ERR_OK) {
            $file_name = $_FILES['image']['name'];
            $file_size = $_FILES['image']['size'];
            $file_tmp  = $_FILES['image']['tmp_name'];
            $ext       = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));

            if (!in_array($ext, $allowed_ext)) {
                die("Error: Invalid file type for Image 1. Only JPG, JPEG, PNG, and GIF files are allowed.");
            }
            if ($file_size > $max_size) {
                die("Error: File size for Image 1 exceeds the limit of 2MB.");
            }
            $new_file_name = uniqid("portfolio_", true) . '.' . $ext;
            $upload_path   = $upload_dir . $new_file_name;
            if (move_uploaded_file($file_tmp, $upload_path)) {
                $image = $upload_path;
            } else {
                die("Error: Failed to upload Image 1.");
            }
        } elseif ($_FILES['image']['error'] === UPLOAD_ERR_NO_FILE) {
            // No new file was uploaded – keep the existing image
            $image = $portfolio['image'];
        } else {
            die("Error: Unexpected error uploading Image 1.");
        }
    } else {
        $image = $portfolio['image'];
    }

    // Process image 2 upload
    if (isset($_FILES['image2'])) {
        if ($_FILES['image2']['error'] === UPLOAD_ERR_OK) {
            $file_name = $_FILES['image2']['name'];
            $file_size = $_FILES['image2']['size'];
            $file_tmp  = $_FILES['image2']['tmp_name'];
            $ext       = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));

            if (!in_array($ext, $allowed_ext)) {
                die("Error: Invalid file type for Image 2. Only JPG, JPEG, PNG, and GIF files are allowed.");
            }
            if ($file_size > $max_size) {
                die("Error: File size for Image 2 exceeds the limit of 2MB.");
            }
            $new_file_name = uniqid("portfolio_", true) . '.' . $ext;
            $upload_path   = $upload_dir . $new_file_name;
            if (move_uploaded_file($file_tmp, $upload_path)) {
                $image2 = $upload_path;
            } else {
                die("Error: Failed to upload Image 2.");
            }
        } elseif ($_FILES['image2']['error'] === UPLOAD_ERR_NO_FILE) {
            $image2 = $portfolio['image2'];
        } else {
            die("Error: Unexpected error uploading Image 2.");
        }
    } else {
        $image2 = $portfolio['image2'];
    }

    // Process image 3 upload
    if (isset($_FILES['image3'])) {
        if ($_FILES['image3']['error'] === UPLOAD_ERR_OK) {
            $file_name = $_FILES['image3']['name'];
            $file_size = $_FILES['image3']['size'];
            $file_tmp  = $_FILES['image3']['tmp_name'];
            $ext       = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));

            if (!in_array($ext, $allowed_ext)) {
                die("Error: Invalid file type for Image 3. Only JPG, JPEG, PNG, and GIF files are allowed.");
            }
            if ($file_size > $max_size) {
                die("Error: File size for Image 3 exceeds the limit of 2MB.");
            }
            $new_file_name = uniqid("portfolio_", true) . '.' . $ext;
            $upload_path   = $upload_dir . $new_file_name;
            if (move_uploaded_file($file_tmp, $upload_path)) {
                $image3 = $upload_path;
            } else {
                die("Error: Failed to upload Image 3.");
            }
        } elseif ($_FILES['image3']['error'] === UPLOAD_ERR_NO_FILE) {
            $image3 = $portfolio['image3'];
        } else {
            die("Error: Unexpected error uploading Image 3.");
        }
    } else {
        $image3 = $portfolio['image3'];
    }

    // Update the portfolio record in the database
    $stmt = $pdo->prepare("UPDATE portfolios 
        SET title = ?, sText = ?, text = ?, category = ?, client = ?, date = ?, link = ?, image = ?, image2 = ?, image3 = ? 
        WHERE id = ?");
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
        $image3,
        $id
    ]);

    header("Location: dashboard.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Edit Portfolio</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<div class="container my-5">
    <div class="card shadow-lg border-0">
        <div class="card-header bg-primary text-white text-center">
            <h1 class="fw-bold">Edit Portfolio</h1>
        </div>
        <div class="card-body">
            <form method="POST" action="" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="title" class="form-label">Portfolio Title</label>
                    <input type="text" id="title" name="title" class="form-control"
                           placeholder="Enter portfolio title" value="<?php echo htmlspecialchars($portfolio['title']); ?>" required>
                </div>
                <div class="mb-3">
                    <label for="sText" class="form-label">Short Text</label>
                    <textarea id="sText" name="sText" class="form-control"
                              placeholder="Enter portfolio short text" required><?php echo htmlspecialchars($portfolio['sText']); ?></textarea>
                </div>
                <div class="mb-3">
                    <label for="text" class="form-label">Text</label>
                    <textarea id="text" name="text" class="form-control"
                              placeholder="Enter portfolio text" required><?php echo htmlspecialchars($portfolio['text']); ?></textarea>
                </div>
                <div class="mb-3">
                    <label for="category" class="form-label">Category</label>
                    <input type="text" id="category" name="category" class="form-control"
                           placeholder="Enter category" value="<?php echo htmlspecialchars($portfolio['category']); ?>" required>
                </div>
                <div class="mb-3">
                    <label for="client" class="form-label">Client</label>
                    <input type="text" id="client" name="client" class="form-control"
                           placeholder="Enter client name" value="<?php echo htmlspecialchars($portfolio['client']); ?>" required>
                </div>
                <div class="mb-3">
                    <label for="date" class="form-label">Date</label>
                    <input type="date" id="date" name="date" class="form-control"
                           value="<?php echo htmlspecialchars($portfolio['date']); ?>" required>
                </div>
                <div class="mb-3">
                    <label for="link" class="form-label">Link</label>
                    <input type="url" id="link" name="link" class="form-control"
                           placeholder="Enter portfolio link" value="<?php echo htmlspecialchars($portfolio['link']); ?>" required>
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label">Upload Image 1</label>
                    <input type="file" id="image" name="image" class="form-control">
                    <?php if (!empty($portfolio['image'])): ?>
                        <div class="mt-2">
                            <small>Current Image:</small><br>
                            <img src="<?php echo htmlspecialchars($portfolio['image']); ?>" alt="Image 1" width="150">
                        </div>
                    <?php endif; ?>
                </div>
                <div class="mb-3">
                    <label for="image2" class="form-label">Upload Image 2</label>
                    <input type="file" id="image2" name="image2" class="form-control">
                    <?php if (!empty($portfolio['image2'])): ?>
                        <div class="mt-2">
                            <small>Current Image:</small><br>
                            <img src="<?php echo htmlspecialchars($portfolio['image2']); ?>" alt="Image 2" width="150">
                        </div>
                    <?php endif; ?>
                </div>
                <div class="mb-3">
                    <label for="image3" class="form-label">Upload Image 3</label>
                    <input type="file" id="image3" name="image3" class="form-control">
                    <?php if (!empty($portfolio['image3'])): ?>
                        <div class="mt-2">
                            <small>Current Image:</small><br>
                            <img src="<?php echo htmlspecialchars($portfolio['image3']); ?>" alt="Image 3" width="150">
                        </div>
                    <?php endif; ?>
                </div>
                <button type="submit" class="btn btn-primary w-100">Update Portfolio</button>
            </form>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>

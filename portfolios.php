<?php
session_start();
include 'db.php';

// Ensure the user is logged in
if (!isset($_SESSION['admin_id'])) {
    header("Location: admin_login.php");
    exit();
}

// Fetch all portfolios from the database
$stmt = $pdo->prepare("SELECT * FROM portfolios ORDER BY id DESC");
$stmt->execute();
$portfolios = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Portfolio List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<div class="container my-5">
    <h1 class="mb-4">Portfolio List</h1>
    <a href="add_portfolio.php" class="btn btn-success mt-3 mb-3 float-end">Add Portfolio</a>
    <table class="table table-striped table-bordered">
        <thead class="table-dark">
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Short Text</th>
            <th>Category</th>
            <th>Client</th>
            <th>Date</th>
            <th>Link</th>
            <th>Image 1</th>
            <th>Image 2</th>
            <th>Image 3</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        <?php if (!empty($portfolios)): ?>
            <?php foreach ($portfolios as $portfolio): ?>
                <tr>
                    <td><?php echo htmlspecialchars($portfolio['id']); ?></td>
                    <td><?php echo htmlspecialchars($portfolio['title']); ?></td>
                    <td><?php echo htmlspecialchars($portfolio['sText']); ?></td>
                    <td><?php echo htmlspecialchars($portfolio['category']); ?></td>
                    <td><?php echo htmlspecialchars($portfolio['client']); ?></td>
                    <td><?php echo htmlspecialchars($portfolio['date']); ?></td>
                    <td>
                        <a href="<?php echo htmlspecialchars($portfolio['link']); ?>" target="_blank">
                            Visit
                        </a>
                    </td>
                    <td>
                        <?php if (!empty($portfolio['image'])): ?>
                            <img src="<?php echo htmlspecialchars($portfolio['image']); ?>" alt="Image 1" style="width:80px; height:auto;">
                        <?php endif; ?>
                    </td>
                    <td>
                        <?php if (!empty($portfolio['image2'])): ?>
                            <img src="<?php echo htmlspecialchars($portfolio['image2']); ?>" alt="Image 2" style="width:80px; height:auto;">
                        <?php endif; ?>
                    </td>
                    <td>
                        <?php if (!empty($portfolio['image3'])): ?>
                            <img src="<?php echo htmlspecialchars($portfolio['image3']); ?>" alt="Image 3" style="width:80px; height:auto;">
                        <?php endif; ?>
                    </td>
                    <td>
                        <a href="edit_portfolio.php?id=<?php echo $portfolio['id']; ?>" class="btn btn-sm btn-warning">Edit</a>
                        <a href="delete_portfolio.php?id=<?php echo $portfolio['id']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this portfolio?');">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="11" class="text-center">No portfolios found.</td>
            </tr>
        <?php endif; ?>
        </tbody>
    </table>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>

<?php
session_start();
include 'db.php';

if (!isset($_SESSION['admin_id'])) {
    header("Location: admin_login.php");
    exit();
}

// Fetch all portfolios
$stmt = $pdo->prepare("SELECT * FROM portfolios");
$stmt->execute();
$portfolios = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<h1>Manage Portfolios</h1>

<table>
    <tr>
        <th>Title</th>
        <th>Category</th>
        <th>Actions</th>
    </tr>
    <?php foreach ($portfolios as $portfolio): ?>
    <tr>
        <td><?= htmlspecialchars($portfolio['title']); ?></td>
        <td><?= htmlspecialchars($portfolio['category']); ?></td>
        <td>
            <a href="edit_portfolio.php?id=<?= $portfolio['id']; ?>">Edit</a>
            <a href="delete_portfolio.php?id=<?= $portfolio['id']; ?>">Delete</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>

<a href="add_portfolio.php">Add Portfolio</a>

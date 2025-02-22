<?php
session_start();
include 'db.php';

if (!isset($_SESSION['admin_id'])) {
    header("Location: admin_login.php");
    exit();
}

$portfolioId = $_GET['id'];
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Update portfolio
    $title = $_POST['title'];
    $category = $_POST['category'];
    $text = $_POST['text'];
    $client = $_POST['client'];
    $date = $_POST['date'];
    $image = $_POST['image'];
    $link = $_POST['link'];

    $stmt = $pdo->prepare("UPDATE portfolios SET title = ?, category = ?, text = ?, client = ?, date = ?, image = ?, link = ? WHERE id = ?");
    $stmt->execute([$title, $category, $text, $client, $date, $image, $link, $portfolioId]);

    header("Location: manage_portfolios.php");
}

// Fetch portfolio data for editing
$stmt = $pdo->prepare("SELECT * FROM portfolios WHERE id = ?");
$stmt->execute([$portfolioId]);
$portfolio = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<h1>Edit Portfolio</h1>

<form method="POST" action="">
    <label>Title</label><br>
    <input type="text" name="title" value="<?= htmlspecialchars($portfolio['title']); ?>" required><br><br>

    <label>Category</label><br>
    <input type="text" name="category" value="<?= htmlspecialchars($portfolio['category']); ?>" required><br><br>

    <label>Text</label><br>
    <textarea name="text" required><?= htmlspecialchars($portfolio['text']); ?></textarea><br><br>

    <label>Client</label><br>
    <input type="text" name="client" value="<?= htmlspecialchars($portfolio['client']); ?>"><br><br>

    <label>Date</label><br>
    <input type="text" name="date" value="<?= htmlspecialchars($portfolio['date']); ?>"><br><br>

    <label>Image</label><br>
    <input type="text" name="image" value="<?= htmlspecialchars($portfolio['image']); ?>"><br><br>

    <label>Link</label><br>
    <input type="text" name="link" value="<?= htmlspecialchars($portfolio['link']); ?>"><br><br>

    <button type="submit">Save Changes</button>
</form>

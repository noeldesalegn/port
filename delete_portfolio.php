<?php
session_start();
include 'db.php';

// Ensure the admin is logged in
if (!isset($_SESSION['admin_id'])) {
    header("Location: admin_login.php");
    exit();
}

// Check if a portfolio id was provided in the URL
if (!isset($_GET['id']) || empty($_GET['id'])) {
    header("Location: portfolios.php"); // or dashboard.php
    exit();
}

$id = $_GET['id'];

// Retrieve the portfolio record to get image paths
$stmt = $pdo->prepare("SELECT * FROM portfolios WHERE id = ?");
$stmt->execute([$id]);
$portfolio = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$portfolio) {
    die("Portfolio not found.");
}

// Delete associated image files if they exist
if (!empty($portfolio['image']) && file_exists($portfolio['image'])) {
    unlink($portfolio['image']);
}
if (!empty($portfolio['image2']) && file_exists($portfolio['image2'])) {
    unlink($portfolio['image2']);
}
if (!empty($portfolio['image3']) && file_exists($portfolio['image3'])) {
    unlink($portfolio['image3']);
}

// Delete the portfolio record from the database
$stmt = $pdo->prepare("DELETE FROM portfolios WHERE id = ?");
$stmt->execute([$id]);

// Redirect back to the portfolio list or dashboard page
header("Location: portfolios.php"); // Adjust as necessary
exit();
?>

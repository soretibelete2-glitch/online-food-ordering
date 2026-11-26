<?php
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    die("Access denied.");
}

include 'includes/db.php';

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    die("Invalid ID");
}
$id = (int)$_GET['id'];
/* Get image name */
$stmt = $conn->prepare("SELECT photo FROM foods WHERE id=?");
$stmt->execute([$id]);
$food = $stmt->fetch(PDO::FETCH_ASSOC);
if ($food) {
    $imagePath = "uploads/" . $food['photo'];
    if (file_exists($imagePath)) {
        unlink($imagePath);
    }
    $stmt = $conn->prepare("DELETE FROM foods WHERE id=?");
    $stmt->execute([$id]);
}
header("Location: manage_foods.php?deleted=1");
exit;
?>
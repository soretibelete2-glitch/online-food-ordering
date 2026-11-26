<?php
session_start();

if (!isset($_SESSION['role']) || $_SESSION['role'] != 'admin') {
    die("Access denied. Admin only.");
}
include 'includes/db.php'; // MUST define $conn
if (isset($_POST['add'])) {

    if (!isset($_FILES['photo'])) {
        die("No image uploaded");
    }
    $uploadDir = __DIR__ . "/uploads/";
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }
    $fileName = time() . "_" . basename($_FILES['photo']['name']);
    $photoPath = $fileName;
    if (move_uploaded_file($_FILES['photo']['tmp_name'], $uploadDir . $fileName)) {
        $stmt = $conn->prepare(
            "INSERT INTO foods (food_name, price, category, photo)
             VALUES (?, ?, ?, ?)"
        );
        $stmt->execute([
            $_POST['food_name'],
            $_POST['price'],
            $_POST['category'],
            $photoPath
        ]);
        echo "<script>alert('Food added successfully');</script>";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Add Food</title>
    <link rel="stylesheet" href="css/addFood.css">
</head>
<body>
<div class="container">
    <h3>Add Food (Admin)</h3>
    <form method="post" enctype="multipart/form-data">
        <label>Food Name</label>
        <input type="text" name="food_name" required>
        <label>Price</label>
        <input type="number" name="price" required>
        <label>Category</label>
        <input type="text" name="category" required>
        <label>Photo of food</label>
        <input type="file" name="photo" required >
        <button type="submit" name="add">Add Food</button>
    </form>
    <a href="index.php" class="back">← Back</a>
</div>
</body>
</html>

<?php
session_start();

if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    die("Access denied.");
}

include 'includes/db.php';

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    die("Invalid ID");
}
$id = (int) $_GET['id'];
$stmt = $conn->prepare("SELECT * FROM foods WHERE id=?");
$stmt->execute([$id]);
$food = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$food) {
    die("Food not found");
}
if (isset($_POST['update'])) {
    $stmt = $conn->prepare(
        "UPDATE foods SET food_name=?, price=?, category=? WHERE id=?"
    );
    $stmt->execute([
        $_POST['food_name'],
        $_POST['price'],
        $_POST['category'],
        $id
    ]);
    header("Location: index.php?updated=1");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Update Food</title>
  <link rel="stylesheet" href="css/update.css">
</head>
<body>
<div class="update-container">
  <h3>Update Food (Admin)</h3>
  <form method="post">
    <label>Food Name</label>
    <input type="text" name="food_name"
      value="<?php echo $food['food_name']; ?>">
    <label>Price</label>
    <input type="number" name="price"
      value="<?php echo $food['price']; ?>">
    <label>Category</label>
    <input type="text" name="category"
      value="<?php echo $food['category']; ?>">
    <button name="update">Update Food</button>
  </form>
  <a href="index.php" class="back-link">← Back</a>
</div>
</body>
</html>
   

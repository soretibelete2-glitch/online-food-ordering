<?php
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    die("Access denied.");
}
include 'includes/db.php';
/* Fetch all foods */
$stmt = $conn->query("SELECT * FROM foods ORDER BY id DESC");
$foods = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Manage Foods</title>
    <style>
        table {
            width: 90%;
            margin: 30px auto;
            border-collapse: collapse;
            background: #fff;
        }
        th, td {
            padding: 10px;
            border: 1px solid #ccc;
            text-align: center;
        }
        th {
            background: #333;
            color: #fff;
        }
        img {
            width: 60px;
            height: 60px;
            object-fit: cover;
            border-radius: 4px;
        }
        .btn {
            padding: 6px 10px;
            text-decoration: none;
            border-radius: 4px;
            color: #fff;
        }
        .edit { background: #007bff; }
        .delete { background: #dc3545; }
    </style>
</head>
<body>
<h2 style="text-align:center;">Manage Foods (Admin)</h2>
<table>
    <tr>
        <th>ID</th>
        <th>Image</th>
        <th>Food Name</th>
        <th>Price</th>
        <th>Category</th>
        <th>Actions</th>
    </tr>
    <?php if ($foods): ?>
        <?php foreach ($foods as $food): ?>
        <tr>
            <td><?= $food['id'];?></td>
            <td>
                <img src="uploads/<?= htmlspecialchars($food['photo']); ?>">
            </td>
            <td><?= htmlspecialchars($food['food_name']); ?></td> <!-- converted to htmlspecialchars for security -->
            <td><?= htmlspecialchars($food['price']); ?></td>
            <td><?= htmlspecialchars($food['category']); ?></td>
            <td>
                <a class="btn edit" href="update_food.php?id=<?= $food['id'];?>">Update</a>
                <a class="btn delete"
                   href="delete_food.php?id=<?= $food['id']; ?>"
                   onclick="return confirm('Are you sure?')">
                   Delete
                </a>
            </td>
        </tr>
        <?php endforeach; ?>
    <?php else: ?>
        <tr><td colspan="6">No foods found</td></tr>
    <?php endif; ?>
</table>
<a href="index.php" style="display:block;text-align:center;">← Back</a>
</body>
</html>

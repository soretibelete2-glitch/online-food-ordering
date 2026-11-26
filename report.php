<?php
session_start();

/* ADMIN SECURITY CHECK */
if(!isset($_SESSION['role']) || $_SESSION['role'] != 'admin') {
    die("Access denied. Admin only.");
}

include 'includes/db.php';

$count = $conn->query(
    "SELECT COUNT(*) FROM foods"
)->fetchColumn();
?>

<!DOCTYPE html>
<html>
    <head>
        <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background-color: #f4f6f8;
        }
        .report-container {
            width: 400px;
            margin: 100px auto;
            background-color: #ffffff;
            padding: 30px;
            border-radius: 10px;
            text-align: center;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
        }
        h3 {
            margin-bottom: 20px;
            color: #e74c3c;
            font-size: 24px;
        }
        .count {
            font-size: 18px;
            margin-bottom: 30px;
            color: #333;
            font-weight: bold;
        }

        .back-link {
            display: inline-block;
            text-decoration: none;
            background-color: #3498db;
            color: white;
            padding: 10px 20px;
            border-radius: 6px;
            transition: 0.3s;
        }
        .back-link:hover {
            background-color: #217dbb;
        }
    </style>
    </head>
<body>
<h3>Food Report</h3>
Total Food Items: <?php echo $count; ?><br>
<a href="index.php" class="back-link">Back</a>
</body>
</html>

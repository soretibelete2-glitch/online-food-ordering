<?php
session_start();
include 'includes/db.php';

if (isset($_POST['login'])) {
    $stmt = $conn->prepare(
        "SELECT * FROM users WHERE username=?"
    );
    $stmt->execute([$_POST['username']]);
    $user = $stmt->fetch();
    if ($user && password_verify($_POST['password'], $user['password'])) {
        $_SESSION['user'] = $user['username'];
        $_SESSION['role'] = $user['role'];
        header("Location:index.php");
    } else {
        echo "<script>alert('Invalid username or password');</script>";
    }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="css/style.css">
    </head>
<body>
    <h3>User Login</h3>
    <div class="form-container">
        <div class="conatiner-part">
            <form method="post">
                <label for="username">Enter Username</label>
                <input type="text" name="username">
                <label for="password">Enter your password</label>
                <input type="password" name="password"><br><br>
                <button name="login">Login</button>
            </form>
        </div>
        <div class="conatiner-part">
            <img src="image/R.jpg" alt="">
        </div>
    </div>
    <div style="text-align: center;">
        <a href="index.php" style="padding: 10px 25px; background-color: red;border-radius: 5px;">Back to Home</a>
    </div>
</body>
</html>
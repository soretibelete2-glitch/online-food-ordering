<?php
include 'includes/db.php';
if (isset($_POST['register'])) {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $role = $_POST['role'];
    $sql = "INSERT INTO users (username, password, role)
            VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    
    if($stmt->execute(params: [$username, $password, $role])){
          echo "<script>alert('Registration successful');</script>";
          header("Location: login.php");
          exit(); // always exit after redirect
    } else {
          echo "Registration failed";
     }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="css/style.css">
    </head>
<body style="padding-top:30px;">
    <h3>User Registration</h3>
    <div class="form-container">   
        <div class="conatiner-part">
            <form method="post">
                <label for="username">Enter Username</label>
                <input type="text" name="username" required>
                <label for="password">Enter your password</label>
                <input type="password" name="password" required>
                <label for="role">select your role</label>
                <select name="role">
                    <option value="admin">Admin</option>
                    <option value="customer">Customer</option>
                </select><br><br>
                <div style="display: flex; margin: auto;">
                    <button name="register">Register</button>
                    <a href="login.php" style=" border-radius: 5px;  font-size: 16px; cursor: pointer; 
                    text-decoration: none; color :white;background-color: #ff4d4d; width: 80px; text-align: center; padding-top: 10px; margin-left:10px;">login</a>
                </div>
            </form>
        </div>
        <div class="conatiner-part">
            <img src="image/pizza.jpg" alt="">
        </div>
    </div>
    <a href="index.php" id="aa">Back</a>
</body>
</html>
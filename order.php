<?php
include 'includes/db.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
  try {
    $sql = "INSERT INTO food_orders(username, userAddress, homeNumber, phoneNumber) VALUES(?, ?, ?, ?)";  
    $stmt = $conn->prepare($sql);
    $stmt->execute([
      $_POST['name'],
      $_POST['home'],
      $_POST['address'],
      $_POST['phoneNumber']
    ]);
    echo "<script>alert('Order placed successfully');</script>";
  } catch (PDOException $e) {
    echo "<p style='color:red;'>Error: " . $e->getMessage() . "</p>";
  }
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <link rel="stylesheet" href="css/style.css">
  </head>
<head>
  <meta charset="UTF-8">
  <title>Food Ordering</title>
</head>
<body style="background-color: rgb(240, 240, 240);padding-top: 50px">
 <div class="food-ordering">
      <p>Insert the form below to oreder</p>
  <form action="order.php" method="POST">
    <label for="name">Enter your Name</label> <br>
    <input type="text" name="name" required><br>
    
    <label for="address"> Enter Your Address</label><br>
    <input type="text" name="address" required><br>
    
    <label for="home">Enter your Home Number</label><br>
    <input type="text" name="home" required><br>
    
    <label for="phoneNumber"> Enter Your Phone Number</label><br>
    <input type="number" name="phoneNumber" required><br>

    <button type="submit" name="submit">Order Now</button>
  </form>
  <div  style="text-align: center;">
    <a href="index.php">Back to Home</a>
  </div>
 </div>
</body>
</html>
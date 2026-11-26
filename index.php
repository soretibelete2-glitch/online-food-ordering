<?php session_start();?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="css/style.css">
    </head>
<body>
     <div class="container">
        <div class="php-code">
        <?php if (isset($_SESSION['user'])) { ?>
        <?php if ($_SESSION['role'] == 'admin') { ?>
            <!-- ADMIN ONLY LINKS -->
            <a href="add_food.php">Add Food</a> 
            <a href="manage_foods.php">manage Food</a> 
            <a href="report.php">Report</a> 
        <?php } ?>
        <a href="search.php">Search Food</a> 
        <a href="logout.php">Logout</a>
    <?php } else { ?>
        <a  href="register.php" id="headerLink">Register</a>
        <a href="login.php" id="headerLink">Login</a>
    <?php }
    ?>
    </div>
    </div>
      <section class="hero">
        <p class="p1">Online Food Ordering System</p> 
        <p class="p2">Delicious Food Delivered Fast</p>
       <a href="register.php" class="link">Order Now</a>
    </section>
    <!-- Menu Section -->
    <section class="menu">
        <h2>Our Menu</h2>
        <div class="menu-items">
            <div class="card">
                <img src="image/beyayent.jpg" alt="Pizza">
                <p>beyayent</p>
                <p>$10</p>
                <a href="register.php" class="link add">order</a>
            </div>
            <div class="card">
                <img src="image/OIP.jpg" alt="Burger">
                <p>Burger</p>
                <p>$7</p>
                <a href="register.php" class="link add">order</a>
            </div>
            <div class="card">
                <img src="image/egge.jpg" alt="Biryani">
                <p>egge</p>
                <p>$12</p>
                <a href="register.php" class="link add">order</a>
            </div>
        </div>
    </section>
    <!-- Footer -->
    <footer class="footer">
        <p>© 2025 Foodie Hub | All Rights Reserved</p>
     </footer>
     </section>
</body>
</html>
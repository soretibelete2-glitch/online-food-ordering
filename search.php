<?php
include 'includes/db.php';
if (isset($_POST['search'])) {
  $stmt = $conn->prepare(
    "SELECT * FROM foods WHERE food_name LIKE ?"
  );
  $stmt->execute(["%" . $_POST['keyword'] . "%"]);
  $foods = $stmt->fetchAll(PDO::FETCH_ASSOC);
}
?>
<!DOCTYPE html>
<html>

<head>
  <link rel="stylesheet" href="css/style.css">
  <style>
    .food-card {
      display: flex;
      align-items: center;
      gap: 15px;
      width: 50%;
      margin: auto;
      padding: 12px 30px;
      margin-bottom: 15px;
      border: 1px solid #ddd;
      border-radius: 8px;
      background-color: #fff;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.08);
      transition: transform 0.2s ease, box-shadow 0.2s ease;
    }

    .food-card:hover {
      transform: translateY(-3px);
      box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
    }

    .food-img {
      width: 100px;
      height: 100px;
      object-fit: cover;
      border-radius: 6px;
    }

    .food-info {
      display: flex;
      flex-direction: column;
    }

    .food-name {
      font-size: 18px;
      color: #333;
      margin-bottom: 6px;
    }

    .food-price {
      font-size: 16px;
      font-weight: bold;
      color: #28a745;
    }

    .our-products {
      padding: 40px 20px;
      background-color: #f9f9f9;
      text-align: center;
    }
  </style>
</head>

<body>
  <div class="search-food">
    <form method="post">
      <input type="text" name="keyword" placeholder="Search Food" required id="text">
      <button type="submit" name="search">Search</button>
    </form>
  </div>
  <!-- Search Results -->
  <?php
  if (!empty($foods)) {
    foreach ($foods as $f) {
  ?>
      <div class="food-card">
        <img src="uploads/<?= $f['photo']; ?>" alt="Food Image" class="food-img">
        <div class="food-info">
          <strong class="food-name"><?= $f['food_name']; ?></strong>
          <span class="food-price">$<?= $f['price']; ?></span>
          <a href="order.php">Order</a>
        </div>
      </div>
  <?php
    }
  } else {
    if (isset($_POST['search'])) {
      echo "<p style='text-align:center;'>No foods found matching your search.</p>";
    }
  }
  ?>
  <section class="our-products">
    <h1 class="title">search and order</h1>
    <div class="products">
      <div class="card">
        <img src="image/beyayent.jpg" alt="beyayent">
        <p class="name">beyayent</p>
        <p class="price">$300</p>
        <a href="./order.php" class="btn">Order</a>
      </div>
      <div class="card">
        <img src="image/doro.jpg" alt="Burger">
        <p class="name">doro</p>
        <p class="price">$300</p>
        <a href="./order.php" class="btn">Order</a>
      </div>

      <div class="card">
        <img src="image/download.jpg" alt="Burger">
        <p class="name">Burger</p>
        <p class="price">$300</p>
        <a href="./order.php" class="btn">Order</a>
      </div>
      <div class="card">
        <img src="image/egge.jpg" alt="Burger">
        <p class="name">egg</p>
        <p class="price">$300</p>
        <a href="./order.php" class="btn">Order</a>
      </div>
      <div class="card">
        <img src="image/egge.jpg" alt="egg">
        <p class="name">egg</p>
        <p class="price">$300</p>
        <a href="./order.php" class="btn">Order</a>
      </div>
      <div class="card">
        <img src="image/R.jpg" alt="Burger">
        <p class="name">Burger</p>
        <p class="price">$300</p>
        <a href="./order.php" class="btn">Order</a>
      </div>
      <div class="card">
        <img src="image/download.jpg" alt="Burger">
        <p class="name">Burger</p>
        <p class="price">$300</p>
        <a href="./order.php" class="btn">Order</a>
      </div>
      <div class="card">
        <img src="image/egge.jpg" alt="Burger">
        <p class="name">egg</p>
        <p class="price">$300</p>
        <a href="./order.php" class="btn">Order</a>
      </div>
      <div class="card">
        <img src="image/egge.jpg" alt="egg">
        <p class="name">egg</p>
        <p class="price">$300</p>
        <a href="./order.php" class="btn">Order</a>
      </div>
    </div>
    <a href="index.php">Back</a>
  </section>
</body>

</html>
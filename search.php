<link rel="stylesheet" href="css/style1.css">

<?php
session_start();
include('connection.php');

$keyword = trim($_GET['keyword'] ?? '');

if ($keyword == '') {
    header("Location: menu.php");
    exit();
}

$search = mysqli_real_escape_string($conn, $keyword);

$sql = "SELECT * FROM products
        WHERE product_name LIKE '%$search%'
        ORDER BY id DESC";

$result = mysqli_query($conn, $sql);

if (!$result) {
    die("Search Error: " . mysqli_error($conn));
}
?>

<h2>Search Results: <?php echo htmlspecialchars($keyword); ?></h2>

<div class="product-grid">

                <?php

                while ($row = mysqli_fetch_assoc($result)) {

                ?>

                    <div class="product-card">
                        <img src="images/<?php echo $row['image']; ?>"
                            alt="<?php echo $row['product_name']; ?>">

                        <div class="product-info">
                            <h3><?php echo $row['product_name']; ?></h3>

                            <div class="price">
                                <strong><?php echo number_format($row['price']); ?></strong>
                                <a href="add_to_cart.php?id=<?php echo $row['id']; ?>">+</a>
                            </div>
                        </div>
                    </div>
                <?php  } ?>



            </div>

</div>
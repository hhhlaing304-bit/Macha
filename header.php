<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$isLogin = isset($_SESSION['id']);
?>

<link rel="stylesheet" href="css/style1.css">
<input type="checkbox" id="sidebar-toggle">

<header class="header">

    <div class="header-container">

        <div class="logo">
            <span>🍃</span>
            Macha .
        </div>

        <nav class="navbar">

            <a href="index.php">Home</a>
            <a href="menu.php">Menu</a>
            <a href="about.php">About</a>
            <a href="orders.php">Order</a>
            <a href="contact.php">Contact</a>

        </nav>

        <div class="header-right">

            <?php if ($isLogin) { ?>

                <a href="orders.php" class="user-btn" title="My Orders">
                    <i class="fa-regular fa-user"></i>
                </a>

                <a href="cart.php" class="cart-btn">
                    <i class="fa-solid fa-cart-shopping"></i>
                </a>

                <a href="logout.php" class="signup-btn">
                    Logout
                </a>

            <?php } else { ?>

                <a href="login.php" class="user-btn">
                    <i class="fa-regular fa-user"></i>
                </a>

                <a href="register.php" class="signup-btn">
                    Sign Up
                </a>

            <?php } ?>

        </div>

        <label for="sidebar-toggle" class="mobile-menu">
            ☰
        </label>



    </div>

</header>

<label for="sidebar-toggle" class="overlay"></label>


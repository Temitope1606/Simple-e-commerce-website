<?php
include('auth.php');
// $cartCount = isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0;
// Get the cart count from the function
$cartCount = $ecw->getCartCount();

// To remove items....
if (isset($_POST['remove_item'])) {
    $itemId = mysqli_escape_string($ecw->link, $_POST['sn']);

    // Remove the item from the database
    $query = "DELETE FROM shopping_cart_info_table WHERE sn = $itemId";
    mysqli_query($ecw->link, $query);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping cart</title>
    <link rel="stylesheet" href="assests/fontawesome/css/all.css">

    <!-- linking bootstap folder -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- for my custom font to load -->
    <link rel="stylesheet" href="assests/css/style.css">
    <link rel="stylesheet" href="products/shopping-cart.css">
</head>

<body>

    <header>
        <nav id="navbar">
            <input type="checkbox" id="open-sidebar">
            <div>
                <img src="assests/images/logo.png" alt="logo" id="logo">
            </div>
            <!-- FOR THE SEARCH BAR -->
            <form action="" method="GET" id="search-form">
                <input type="text" name="search" placeholder="Search for products....." id="search-bar">
                <button type="submit"><i class="fa fa-search"></i></button>
            </form>
            <!-- END OF THE SEARCH BAR -->

            <ul id="menu">

                <!-- "X" button -->
                <button class="close-btn" id="closeBtn">&times;</button>

                <li><a href="index.php" id="active"> Home </a> </li>
                <li> <a href="new-arrival.php"> New Arrivals </a> </li>
                <li> <a href="sign-up.php"> Register </a> </li>
                <li> <a href="sign-in.php"> Log In </a> </li>
                <!-- <li id="dropdown">
                    <a href="#">Account</a>
                    <ul id="dropdown-content">
                        <li><a href="sign-up.html"> Sign Up </a></li>
                        <li> <a href="sign-in.html"> Sign In </a> </li>
                    </ul>
                </li> -->

                <li>

                    <!-- Shopping Cart icon -->
                    <div id="shopping-cart-icon">
                        <span id="cart-count"><?php echo $cartCount; ?></span>
                        <a href="shopping-cart.php"><i class="fa fa-shopping-cart" id="cart"></i> </a>
                        <div class="alert alert-primary" id="popup">Your shopping cart is empty !! </div>
                    </div>
                </li>


            </ul>

            <!-- Shopping Cart icon for phones,tablets -->

            <div id="shopping-cart-icon-ph">
                <span id="cart-count-ph"><?php echo $cartCount; ?></span>
                <a href="shopping-cart.php"> <i class="fa fa-shopping-cart" id="cart-Ph"></i> </a>
                <div id="popup-Ph">Your shopping cart is empty !! </div>
            </div>

            <!--For responsiveness-->

            <label for="open-sidebar" id="menu-btn">
                <i class="fa fa-bars" id="bars"></i>
            </label>

        </nav>
    </header>


    <main>
        <h2>Shopping Cart</h2>
        <!-- Cart items will be displayed here -->
        <section id="shopping-cart">
            <table class="table">
                <thead class="table-light">
                    <!-- <th>S/N</th> -->
                    <th>Item Image</th>
                    <th>Item Name</th>
                    <th>Item Price</th>
                    <th>Item Quantity</th>
                </thead>

                <!-- for displaying the items in the shopping cart -->
                <?php $ecw->shoppingCartItems("shopping_cart_info_table");  ?>
                <!-- -->
            </table>


            <!-- for payment/checkout -->

            <div id="cart-summary">
                <h2>CART SUMMARY</h2>
            </div>

        </section>
    </main>

    <!--  <footer>
        <p>Copyright &copy; 2023 <a href="index.php"> Easy Shop </a></p>
    </footer>
-->

    <script src="script.js"></script>
</body>

</html>
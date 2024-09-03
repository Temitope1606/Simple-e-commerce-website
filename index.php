<?php
include('auth.php');

if (isset($_POST["addToCart"])) {
    $_SESSION["item_name"] = mysqli_real_escape_string($ecw->link, $_POST['$itemName']);
    $_SESSION["item_price"] = mysqli_real_escape_string($ecw->link, $_POST['$itemPrice']);

    $query = "INSERT INTO shopping_cart_info_table(item_name, item_price)";
    $query .= "VALUES('" . $_SESSION['itemName'] . "', '" . $_SESSION['itemPrice'] . "')";
    mysqli_query($ecw->link, $query);

    // for excel date yyyy-mm-dd h:mm:ss AM/PM
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EASY SHOP</title>
    <link rel="stylesheet" href="assests/css/main.css" type="text/css">
    <link rel="stylesheet" href="assests/css/style.css" type="text/css">
    <link rel="stylesheet" href="assests/fontawesome/css/all.css">
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
                <li> <a href="sign-up.html"> Register </a> </li>
                <li> <a href="sign-in.html"> Log In </a> </li>
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
                        <span id="cart-count">0</span>
                        <a href="shopping-cart.html"><i class="fa fa-shopping-cart" id="cart"></i> </a>
                        <div id="popup">Your shopping cart is empty !! </div>
                    </div>
                </li>


            </ul>

            <!-- Shopping Cart icon for phones,tablets -->

            <div id="shopping-cart-icon-ph">
                <span id="cart-count-ph">0</span>
                <a href="shopping-cart.html"> <i class="fa fa-shopping-cart" id="cart-Ph"></i> </a>
                <div id="popup-Ph">Your shopping cart is empty !! </div>
            </div>

            <!--For responsiveness-->

            <label for="open-sidebar" id="menu-btn">
                <i class="fa fa-bars" id="bars"></i>
            </label>

        </nav>
    </header>

    <main>
        <div id="content">
            <div id="hero-text">
                <h1>Best Place to get products</h1>
                <p style="padding-bottom: 50px;">Shopping made Easy ...</p>
                <a href="new-arrival.html" role="button" id="shop-now">Shop Now</a>
            </div>
        </div>

        <section id="available-products">

            <!-- 1st SET OF ITEM (8 Items) HOME DECO  -->
            <div id="products-arrow">
                <h1 id="product-heading">Home Decor & Furniture</h1>

                <div id="arrow">
                    <button class="pre-btn">&larr;</button>
                    <button class="nxt-btn">&rarr;</button>
                </div>
            </div>

            <section class="products-container">
                <div class="sub-products">
                    <?php
                    $ecw->homePageItems("home_deco_info_table");
                    ?>
                </div>
            </section>
            <!-- End Of 1st Set -->

            <!-- 2nd SET OF ITEM (8 Items) Home Appliances/Utensils  -->
            <div id="products-arrow">
                <h1 id="product-heading">Home Appliances & Kitchen Utensils</h1>

                <div id="arrow">
                    <button class="pre-btn">&larr;</p>
                        <button class="nxt-btn">&rarr;</p>
                </div>
            </div>

            <section class="products-container">
                <div class="sub-products">
                    <?php
                    $ecw->homePageItems("home_appliances_info_table");
                    ?>
                </div>
            </section>
            <!-- End Of 2nd Set -->

            <!-- 3rd Set Of Items(8 items) Ladies Wears  -->
            <div id="products-arrow">
                <h1 id="product-heading">Women's Fashion</h1>

                <div id="arrow">
                    <button class="pre-btn">&larr;</button>
                    <button class="nxt-btn">&rarr;</button>
                </div>
            </div>

            <section class="products-container">
                <div class="sub-products">
                    <?php
                    $ecw->homePageItems("ladies_info_table");
                    ?>
                </div>
            </section>
            <!-- End Of 3rd Set -->

            <!-- 4th Set Of Items(8 items) Men Wears  -->
            <div id="products-arrow">
                <h1 id="product-heading">Men's Fashion</h1>

                <div id="arrow">
                    <button class="pre-btn">&larr;</button>
                    <button class="nxt-btn">&rarr;</button>
                </div>
            </div>

            <section class="products-container">
                <div class="sub-products">
                    <?php
                    $ecw->homePageItems("men_info_table");
                    ?>
                </div>
            </section>
            <!-- End Of 4th Set -->

            <!-- 5th Set Of Items(8 items) Electronic Gadgets -->
            <div id="products-arrow">
                <h1 id="product-heading">Electronic Gadgets</h1>

                <div id="arrow">
                    <button class="pre-btn">&larr;</button>
                    <button class="nxt-btn">&rarr;</button>
                </div>
            </div>

            <section class="products-container">
                <div class="sub-products">
                    <?php
                    $ecw->homePageItems("electronics_info_table");
                    ?>
                </div>
            </section>
            <!-- End Of 5th Set -->

            <!-- 6th Set Of Items(8 items) BagPacks, Travelling Box/Bag -->
            <div id="products-arrow">
                <h1 id="product-heading">Bags & Travel Accessories</h1>

                <div id="arrow">
                    <button class="pre-btn">&larr;</button>
                    <button class="nxt-btn">&rarr;</button>
                </div>
            </div>

            <section class="products-container">
                <div class="sub-products">
                    <?php
                    $ecw->homePageItems("backpacks_boxes_info_table");
                    ?>
                </div>
            </section>
            <!-- End Of 6th Set -->


            <!--Notification that an item has been added to cart-->
            <div id="notification" class="notification">
                <span id="notification-text">Item successfully added to the cart!!</span>
                <button class="close-notification">&times;</button>
            </div>

            <!--Notification that an item has been removed from the cart-->
            <div id="notification-remove" class="notification">
                <span id="notification-text">Item successfully removed from the cart!!</span>
                <button class="close-notification">&times;</button>
            </div>



        </section>
    </main>

    <footer>
        <p>Copyright &copy; 2023 <a href="index.php"> Easy Shop </a></p>
    </footer>

    <script src="script.js"></script>
</body>

</html>
<?php
include('auth.php');
// $cartCount = isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0;
// Get the cart count from the function
$cartCount = $ecw->getCartCount();

// FOR WHEN THE "ADD TO CART" Button is clicked
// if (isset($_POST["addToCart"])) {
//     $_SESSION["item_name"] = mysqli_real_escape_string($ecw->link, $_POST['item_name']);
//     $_SESSION["item_price"] = mysqli_real_escape_string($ecw->link, $_POST['item_price']);
//     $_SESSION["item_image"] = mysqli_real_escape_string($ecw->link, $_POST['item_image']);

//     $query = "INSERT INTO shopping_cart_info_table(item_name, item_price, item_image)";
//     $query .= "VALUES('" . $_SESSION['item_name'] . "', '" . $_SESSION['item_price'] . "', '" . $_SESSION['item_image'] . "')";
//     mysqli_query($ecw->link, $query);
// }

// for excel date yyyy-mm-dd h:mm:ss AM/PM

   // FOR WHEN THE SEARCH BUTTON IS CLICKED
//    if (isset($_GET["search-btn"])) {  // I'M USING "GET" Method because I want to display what is been searched in the url 
//     $searchItems = mysqli_escape_string($ecw->link, $_GET['search']);
//     $ecw->searchButton($searchItems, "item_info_table");
// }

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
            <form action="./search_result.php" method="GET" id="search-form">
                <input type="text" name="search" placeholder="Search for products....." id="search-bar">
                <button type="submit" name="search-btn"><i class="fa fa-search"></i></button>
            </form>
            <!-- END OF THE SEARCH BAR -->

            <ul id="menu">

                <!-- "X" button -->
                <button class="close-btn" id="closeBtn">&times;</button>

                <li><a href="index.php" id="active"> Home </a> </li>
                <li> <a href="new-arrival.php"> New Arrivals </a> </li>
                <li id="account">
                    <div class="dropdown">
                        <button class="acct-btn">Account</button>
                        <div class="dropdown-content">
                            <a href="sign-up.php">Register</a>
                            <hr>
                            <a href="sign-in.php">Log In</a>
                        </div>
                    </div>
                </li>
                <li>
                    <!-- Shopping Cart icon -->
                    <div id="shopping-cart-icon">
                    <span id="cart-count"><?php echo $cartCount; ?></span>
                        <a href="shopping-cart.php"><i class="fa fa-shopping-cart" id="cart"></i> </a>
                        <div id="popup">Your shopping cart is empty !! </div>
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
        <div id="content">
            <div id="hero-text">
                <h1>Best Place to get products</h1>
                <p style="padding-bottom: 50px;">Shopping made Easy ...</p>
                <a href="new-arrival.php" role="button" id="shop-now">Shop Now</a>
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
                    <button class="pre-btn">&larr;</button>
                    <button class="nxt-btn">&rarr;</button>
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
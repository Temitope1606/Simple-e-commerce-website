<?php
include('auth.php');
// $cartCount = isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0;
// Get the cart count from the function
$cartCount = $ecw->getCartCount();

// FOR WHEN THE SEARCH BUTTON IS CLICKED
if (isset($_GET["search-btn"])) {  // I'M USING "GET" Method because I want to display what is been searched in the url 
  $searchItems = mysqli_escape_string($ecw->link, $_GET['search']);
  $ecw->searchButton($searchItems, "item_info_table");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>New Arrivals</title>
  <link rel="stylesheet" href="assests/fontawesome/css/all.css" />
  <link rel="stylesheet" href="assests/css/main.css" />
  <link rel="stylesheet" href="assests/css/style.css" />
  <link rel="stylesheet" href="products/new-arrival.css" />
</head>

<body>
  <header>
    <nav id="navbar">
      <input type="checkbox" id="open-sidebar" />
      <div>
        <img src="assests/images/logo.png" alt="logo" id="logo" />
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

        <li><a href="index.php" id="active"> Home </a></li>
        <li><a href="new-arrival.php"> New Arrivals </a></li>
        <li><a href="sign-up.php"> Register </a></li>
        <li><a href="sign-in.php"> Log In </a></li>
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
            <a href="shopping-cart.php"><i class="fa fa-shopping-cart" id="cart"></i>
            </a>
            <div id="popup">Your shopping cart is empty !!</div>
          </div>
        </li>
      </ul>

      <!-- Shopping Cart icon for phones,tablets -->

      <div id="shopping-cart-icon-ph">
        <span id="cart-count-ph"><?php echo $cartCount; ?></span>
        <a href="shopping-cart.php">
          <i class="fa fa-shopping-cart" id="cart-Ph"></i>
        </a>
        <div id="popup-Ph">Your shopping cart is empty !!</div>
      </div>

      <!--For responsiveness-->

      <label for="open-sidebar" id="menu-btn">
        <i class="fa fa-bars" id="bars"></i>
      </label>
    </nav>
  </header>

  <main>
    <h1 id="new-available-heading">New Available Products</h1>
    <section>
      <!-- FOR DISPLAYING THE AVAILABLE PRODUCTS -->
      <section class="products-available-container">
        <div class="sub-products-available">
          <?php
          $ecw->homePageItems("item_info_table");
          ?>
        </div>
      </section>

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
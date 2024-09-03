<?php
include('auth.php');
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
        <form action="" method="GET" id="search-form">
          <input
            type="text"
            name="search"
            placeholder="Search for products....."
            id="search-bar"
          />
          <button type="submit"><i class="fa fa-search"></i></button>
        </form>
        <!-- END OF THE SEARCH BAR -->
        <ul id="menu">
          <!-- "X" button -->
          <button class="close-btn" id="closeBtn">&times;</button>

          <li><a href="index.php" id="active"> Home </a></li>
          <li><a href="new-arrival.php"> New Arrivals </a></li>
          <li><a href="sign-up.html"> Register </a></li>
          <li><a href="sign-in.html"> Log In </a></li>
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
              <a href="shopping-cart.html"
                ><i class="fa fa-shopping-cart" id="cart"></i>
              </a>
              <div id="popup">Your shopping cart is empty !!</div>
            </div>
          </li>
        </ul>

        <!-- Shopping Cart icon for phones,tablets -->

        <div id="shopping-cart-icon-ph">
          <span id="cart-count-ph">0</span>
          <a href="shopping-cart.html">
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
      <h1>New Available Products</h1>
      <section>

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

        <div class="sub-products">
          <!--1st Item-->
          <div class="product">
            <div><img src="assests/images/base.png" alt="base" /></div>

            <div class="name-price-cart">
              <div class="name">
                <p>Flower Base</p>
              </div>
              <div class="price">
                <p>&#8358;3200.00</p>
              </div>
              <div>
                <button class="add-to-cart" type="submit">
                  <span class="btn-text"> ADD TO CART </span>
                </button>

                <!-- QUANTITY INCREASE AND DECREASE -->
                <div class="quantity-control" style="display: none">
                  <button class="decrement" onclick="changeQuantity(this,-1)">
                    -
                  </button>
                  <span class="quantity">1</span>
                  <button class="increment" onclick="changeQuantity(this,1)">
                    +
                  </button>
                </div>
              </div>
            </div>
          </div>

          <!--2nd Item-->

          <div class="product">
            <div><img src="assests/images/deco.png" alt="stool" /></div>
            <div class="name-price-cart">
              <div class="name">
                <p>Wooden Stool</p>
              </div>
              <div class="price">
                <p>&#8358;2200.00</p>
              </div>
              <div>
                <button class="add-to-cart">
                  <span class="btn-text"> ADD TO CART </span>
                </button>

                <!-- QUANTITY INCREASE AND DECREASE -->
                <div class="quantity-control" style="display: none">
                  <button class="decrement" onclick="changeQuantity(this,-1)">
                    -
                  </button>
                  <span class="quantity">1</span>
                  <button class="increment" onclick="changeQuantity(this,1)">
                    +
                  </button>
                </div>
              </div>
            </div>
          </div>

          <!--3rd Item-->
          <div class="product">
            <div><img src="assests/images/shop.png" alt="plastic chair" /></div>

            <div class="name-price-cart">
              <div class="name">
                <p>Plastic Chair</p>
              </div>
              <div class="price">
                <p>&#8358;2900.00</p>
              </div>
              <div>
                <button class="add-to-cart">
                  <span class="btn-text"> ADD TO CART </span>
                </button>

                <!-- QUANTITY INCREASE AND DECREASE -->
                <div class="quantity-control" style="display: none">
                  <button class="decrement" onclick="changeQuantity(this,-1)">
                    -
                  </button>
                  <span class="quantity">1</span>
                  <button class="increment" onclick="changeQuantity(this,1)">
                    +
                  </button>
                </div>
              </div>
            </div>
          </div>

          <!--4th Item-->
          <div class="product">
            <div>
              <img
                src="assests/images/yellow.png"
                alt="yellow strap gown"
                class="set-black-yellow"
              />
            </div>
            <div class="name-price-cart">
              <div class="name">
                <p>Strap Gown</p>
              </div>
              <div class="price">
                <p>&#8358;8200.00</p>
              </div>
              <div>
                <button class="add-to-cart">
                  <span class="btn-text"> ADD TO CART </span>
                </button>

                <!-- QUANTITY INCREASE AND DECREASE -->
                <div class="quantity-control" style="display: none">
                  <button class="decrement" onclick="changeQuantity(this,-1)">
                    -
                  </button>
                  <span class="quantity">1</span>
                  <button class="increment" onclick="changeQuantity(this,1)">
                    +
                  </button>
                </div>
              </div>
            </div>
          </div>

          <!--5th Item-->
          <div class="product">
            <div><img src="assests/images/blue.png" alt="blue shoe" /></div>
            <div class="name-price-cart">
              <div class="name">
                <p>Blue Shoe</p>
              </div>
              <div class="price">
                <p>&#8358;10000.00</p>
              </div>
              <div>
                <button class="add-to-cart">
                  <span class="btn-text"> ADD TO CART </span>
                </button>

                <!-- QUANTITY INCREASE AND DECREASE -->
                <div class="quantity-control" style="display: none">
                  <button class="decrement" onclick="changeQuantity(this,-1)">
                    -
                  </button>
                  <span class="quantity">1</span>
                  <button class="increment" onclick="changeQuantity(this,1)">
                    +
                  </button>
                </div>
              </div>
            </div>
          </div>

          <!--6th Item-->
          <div class="product">
            <div>
              <img
                src="assests/images/set.png"
                alt="set of bag and shoe"
                class="set"
              />
            </div>
            <div class="name-price-cart">
              <div class="name">
                <p>Colored Bag</p>
              </div>
              <div class="price">
                <p>&#8358;22000.00</p>
              </div>
              <div>
                <button class="add-to-cart">
                  <span class="btn-text"> ADD TO CART </span>
                </button>

                <!-- QUANTITY INCREASE AND DECREASE -->
                <div class="quantity-control" style="display: none">
                  <button class="decrement" onclick="changeQuantity(this,-1)">
                    -
                  </button>
                  <span class="quantity">1</span>
                  <button class="increment" onclick="changeQuantity(this,1)">
                    +
                  </button>
                </div>
              </div>
            </div>
          </div>

          <!--7th Item-->
          <div class="product">
            <div>
              <img src="assests/images/wine.png" alt="wine bag" class="set" />
            </div>
            <div class="name-price-cart">
              <div class="name">
                <p>Wine Bag</p>
              </div>
              <div class="price">
                <p>&#8358;10200.00</p>
              </div>
              <div>
                <button class="add-to-cart">
                  <span class="btn-text"> ADD TO CART </span>
                </button>

                <!-- QUANTITY INCREASE AND DECREASE -->
                <div class="quantity-control" style="display: none">
                  <button class="decrement" onclick="changeQuantity(this,-1)">
                    -
                  </button>
                  <span class="quantity">1</span>
                  <button class="increment" onclick="changeQuantity(this,1)">
                    +
                  </button>
                </div>
              </div>
            </div>
          </div>

          <!--8th Item-->
          <div class="product">
            <div>
              <img
                src="assests/images/light brown.png"
                alt="set of bag and heels"
                class="set"
              />
            </div>
            <div class="name-price-cart">
              <div class="name">
                <p>Brown Bag Pair</p>
              </div>
              <div class="price">
                <p>&#8358;35000.00</p>
              </div>
              <div>
                <button class="add-to-cart">
                  <span class="btn-text"> ADD TO CART </span>
                </button>

                <!-- QUANTITY INCREASE AND DECREASE -->
                <div class="quantity-control" style="display: none">
                  <button class="decrement" onclick="changeQuantity(this,-1)">
                    -
                  </button>
                  <span class="quantity">1</span>
                  <button class="increment" onclick="changeQuantity(this,1)">
                    +
                  </button>
                </div>
              </div>
            </div>
          </div>

          <!--9th Item-->
          <div class="product">
            <div>
              <img
                src="assests/images/pink.png"
                alt="set of bag and purse"
                class="set"
              />
            </div>
            <div class="name-price-cart">
              <div class="name">
                <p>Bag and purse</p>
              </div>
              <div class="price">
                <p>&#8358;9000.00</p>
              </div>
              <div>
                <button class="add-to-cart">
                  <span class="btn-text"> ADD TO CART </span>
                </button>

                <!-- QUANTITY INCREASE AND DECREASE -->
                <div class="quantity-control" style="display: none">
                  <button class="decrement" onclick="changeQuantity(this,-1)">
                    -
                  </button>
                  <span class="quantity">1</span>
                  <button class="increment" onclick="changeQuantity(this,1)">
                    +
                  </button>
                </div>
              </div>
            </div>
          </div>

          <!--10th Item-->
          <div class="product">
            <div>
              <img
                src="assests/images/gold.png"
                alt="gold strapless gown"
                class="set"
              />
            </div>
            <div class="name-price-cart">
              <div class="name">
                <p>Gold Gown</p>
              </div>
              <div class="price">
                <p>&#8358;10500.00</p>
              </div>
              <div>
                <button class="add-to-cart">
                  <span class="btn-text"> ADD TO CART </span>
                </button>

                <!-- QUANTITY INCREASE AND DECREASE -->
                <div class="quantity-control" style="display: none">
                  <button class="decrement" onclick="changeQuantity(this,-1)">
                    -
                  </button>
                  <span class="quantity">1</span>
                  <button class="increment" onclick="changeQuantity(this,1)">
                    +
                  </button>
                </div>
              </div>
            </div>
          </div>

          <!--11th Item-->
          <div class="product">
            <div>
              <img src="assests/images/black strap.png" alt="black strap" />
            </div>
            <div class="name-price-cart">
              <div class="name">
                <p>Black Strap Gown</p>
              </div>
              <div class="price">
                <p>&#8358;12000.00</p>
              </div>
              <div>
                <button class="add-to-cart">
                  <span class="btn-text"> ADD TO CART </span>
                </button>

                <!-- QUANTITY INCREASE AND DECREASE -->
                <div class="quantity-control" style="display: none">
                  <button class="decrement" onclick="changeQuantity(this,-1)">
                    -
                  </button>
                  <span class="quantity">1</span>
                  <button class="increment" onclick="changeQuantity(this,1)">
                    +
                  </button>
                </div>
              </div>
            </div>
          </div>

          <!--12th Item-->
          <div class="product">
            <div><img src="assests/images/brown.png" alt="brown shirt" /></div>
            <div class="name-price-cart">
              <div class="name">
                <p>Patterned Shirt</p>
              </div>
              <div class="price">
                <p>&#8358;5900.00</p>
              </div>
              <div>
                <button class="add-to-cart">
                  <span class="btn-text"> ADD TO CART </span>
                </button>

                <!-- QUANTITY INCREASE AND DECREASE -->
                <div class="quantity-control" style="display: none">
                  <button class="decrement" onclick="changeQuantity(this,-1)">
                    -
                  </button>
                  <span class="quantity">1</span>
                  <button class="increment" onclick="changeQuantity(this,1)">
                    +
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!--Notification that an item has been added to cart-->
        <div id="notification" class="notification">
          <span id="notification-text"
            >Item successfully added to the cart!!</span
          >
          <button class="close-notification">&times;</button>
        </div>

        <!--Notification that an item has been removed from the cart-->
        <div id="notification-remove" class="notification">
          <span id="notification-text"
            >Item successfully removed from the cart!!</span
          >
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

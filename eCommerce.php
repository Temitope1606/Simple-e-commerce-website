<?php
class eCommerce
{
  public $link;

  // Constructor for creating connection
  public function __construct($host = "locahost", $username = "root", $password = "", $dbname)
  {
    $this->link = mysqli_connect($host, $username, $password);
    $this->createDb($dbname);
    $this->link = mysqli_connect($host, $username, $password, $dbname);
    return $this->link;
  }

  // CREATE DATABASE
  private function createDb($dbname)
  {
    mysqli_query($this->link, "CREATE DATABASE IF NOT EXISTS $dbname");
  }

  // CREATE TABLE
  public function createTable($sql)
  {
    mysqli_query($this->link, $sql) or die(mysqli_error($this->link));
  }

  // TO DISPLAY THE ITEMS IN THE HOME PAGE
  public function homePageItems($table)
  {
    $query = "SELECT * FROM $table";
    $result = mysqli_query($this->link, $query);

    while ($row = mysqli_fetch_array($result)) {
      $itemName = $row['item_name'];
      $itemPrice = $row['item_price'];
      $itemPicture = $row['item_image'];

      echo '<div class="product">';
      echo '<div>' . '<img src="' . $itemPicture . '"alt="' . $itemName . '">' . '</div>';
      echo '<div class="name-price-cart">';
      echo '<div class="name">' .
        '<p>' . $itemName . '</p>' .
        '</div>';
      echo '<div class="price">' .
        '<p>' . "&#8358;" . $itemPrice . '</p>' .
        '</div>';
      // ADD TO CART        
      echo '<div>' .
        '<form action="" method="POST" id="addToCartForm">' .
        '<input type="hidden" name="item_name" value="' . $itemName . '">' .
        '<input type="hidden" name="item_price" value="' . $itemPrice . '">' .
        '<input type="hidden" name="item_image" value="' . $itemPicture . '">' .
        '<button class="add-to-cart" name="addToCart">' .
        '<span class="btn-text">' . "ADD TO CART" . '</span>' .
        '</button>' . // .
        '</form>';
      //----> QUANTITY INCREASE AND DECREASE -->
      echo         '<div class="quantity-control" style="display: none;">' .
        '<button class="decrement" onclick="changeQuantity(this,-1)" >' . "-" . '</button>' .
        '<span class="quantity">' . "1" . '</span>' .
        '<button class="increment" onclick="changeQuantity(this,1)">' . "+" . '</button>' .
        '</div>';
      echo '</div>';    // END OF ADD TO CART       
      echo '</div>'; // END OF name-price-cart
      echo '</div>'; // END OF product
    }
  }

  // For cart count
  public function getCartCount()
  {
    $query = "SELECT COUNT(*) AS total_items FROM shopping_cart_info_table";
    $result = mysqli_query($this->link, $query);
    $row = mysqli_fetch_assoc($result);

    // Return the total items count from the cart
    return $row['total_items'];
  }
  // end


  // To post data to the database when registering
  public function postData($table)
  {
    $sql = "INSERT INTO $table(username, email, password, mobile_number)";
    $sql .= "VALUES(username, email, password, mobile_num) ";
  }

  // To verify record in the database(ensuring that it's 1 user = 1 email&username)
  public function verifyRecord($username, $email, $table)
  {
    $sql = "SELECT * FROM $table WHERE (email='$email' OR username='$username')";
    $query = mysqli_query($this->link, $sql);
    $data = mysqli_fetch_array($query);

    if ($data) {
      $res = array('message' => "User Record Exists, try another email or username");
      return json_encode($res);
    } else {
      return null;
    }
  }

  // TO ALLOW USERS TO LOGIN BY VERIFYING RECORDS
  public function logIn($usernameOrEmail, $table)
  {
    $sql = "SELECT * FROM $table WHERE username = '$usernameOrEmail' OR email = '$usernameOrEmail'";
    $query = mysqli_query($this->link, $sql);
    $result = mysqli_fetch_array($query);

    if (!empty($result)) {
      return json_encode($result);
    } else {
      return null;
    }
  }

  // FOR THE SEARCH BUTTON
  // public function searchButton($searchItems, $table)
  // {
  //   $searchQuery = "SELECT * FROM $table WHERE item_name LIKE '%$searchItems%'";
  //   $result = mysqli_query($this->link, $searchQuery);
  //   if (mysqli_num_rows($result) > 0) {
  //     while ($row = mysqli_fetch_array($result)) {
  //       echo '<img id= "search-item" . src="' . $row['item_image'] . '">' ;
  //       echo $row['item_name'] . " - " . "&#8358;" . $row['item_price'];
  //     }
  //   } else {
  //     echo "<p>No results found for '$searchItems'</p>";
  //   }
  // }

  public function searchButton($searchItems, $table)
  {
    $searchQuery = "SELECT * FROM $table WHERE item_name LIKE '%$searchItems%'";
    $result = mysqli_query($this->link, $searchQuery);
    if (mysqli_num_rows($result) > 0) {
      while ($row = mysqli_fetch_array($result)) {
        $itemName = $row['item_name'];
        $itemPrice = $row['item_price'];
        $itemPicture = $row['item_image'];

        echo '<div class="search-products">';
        echo '<div class="search-product">';
        echo '<div>' . '<img src="' . $itemPicture . '"alt="' . $itemName . '">' . '</div>';
        echo '<div class="name-price-cart">';
        echo '<div class="name">' .
          '<p>' . $itemName . '</p>' .
          '</div>';
        echo '<div class="price">' .
          '<p>' . "&#8358;" . $itemPrice . '</p>' .
          '</div>';
        // ADD TO CART        
        echo '<div>' .
          '<form action="" method="POST" id="addToCartForm">' .
          '<input type="hidden" name="item_name" value="' . $itemName . '">' .
          '<input type="hidden" name="item_price" value="' . $itemPrice . '">' .
          '<input type="hidden" name="item_image" value="' . $itemPicture . '">' .
          '<button class="add-to-cart" name="addToCart">' .
          '<span class="btn-text">' . "ADD TO CART" . '</span>' .
          '</button>' . // .
          '</form>';
        //----> QUANTITY INCREASE AND DECREASE -->
        echo         '<div class="quantity-control" style="display: none;">' .
          '<button class="decrement" onclick="changeQuantity(this,-1)" >' . "-" . '</button>' .
          '<span class="quantity">' . "1" . '</span>' .
          '<button class="increment" onclick="changeQuantity(this,1)">' . "+" . '</button>' .
          '</div>';
        echo '</div>';    // END OF ADD TO CART       
        echo '</div>'; // END OF name-price-cart
        echo '</div>'; // END OF product
        echo '</div>'; // END OF sub-products
      }
    } else {
      echo "<p>No results found for '$searchItems'</p>";
    }
  }




  // TO DISPLAY THE ITEMS IN THE SHOPPING CART PAGE
  public function shoppingCartItems($table)
  {
    $query = "SELECT * FROM $table";
    $result = mysqli_query($this->link, $query);

    while ($row = mysqli_fetch_array($result)) {
      $itemId = $row['sn'];
      $itemName = $row['item_name'];
      $itemPrice = $row['item_price'];
      $itemPicture = $row['item_image'];
      $itemQuantity = $row['item_quantity'];


      echo '<tbody>';
      // Display item image with trash button for removal
      echo '<td>' . '<img src="' . $itemPicture . '"alt="' . $itemName . '">';
      echo  // To display the trash can
      '<div id="remove-item-container">' .
        '<form action="" method="POST" id="">' .
        '<input type="number" name="sn" value="' . $itemId . '">' .
        '<button name="remove_item" id="remove-item">' .
        '<i class="fas fa-trash"></i>' .
        '<span id="remove">REMOVE</span>' .
        '</button>' .
        '</form>' .
        '</div>';
      echo '</td>'; // end of displaying item image
      echo '<td>' . $itemName . '</td>';  // Display item name
      echo '<td>' . "&#8358;" . $itemPrice . '</td>';  // Display item price
      echo '<td>'; // for displaying item quantity
      echo '<input type="number" min = "1" value="' . $itemQuantity . '">';
      echo '</td>';  // end of displaying item quantity

      echo '</tbody>';
    }
  }
  // <<<>>>

}

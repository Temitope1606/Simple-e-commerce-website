<?php
 class eCommerce{
   public $link;

   public function __construct($host = "locahost", $username = "root", $password = "", $dbname ) {
    $this->link = mysqli_connect($host, $username, $password);
    $this->createDb($dbname);
    $this->link = mysqli_connect($host, $username, $password, $dbname);
    return $this->link;
   }

   // CREATE DATABASE
   private function createDb($dbname){
    mysqli_query($this->link, "CREATE DATABASE IF NOT EXISTS $dbname");
   }

   // CREATE TABLE
   public function createTable($sql){
    mysqli_query($this->link,$sql) or die(mysqli_error($this->link));
  }

  // TO DISPLAY THE ITEMS IN THE HOME PAGE
  public function homePageItems($table){
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
      //'<form method="POST" action="">' .
          //'<input type="hidden" name="item_name" value="' . $itemName . '">';
          //'<input type="hidden" name="item_name" value="' . $itemPrice . '">';
               '<button class="add-to-cart" name="addToCart">' .
                   '<span class="btn-text">' . "ADD TO CART" . '</span>' .
               '</button>'; // .
       //'</form>' ;        
 //----> QUANTITY INCREASE AND DECREASE -->
      echo         '<div class="quantity-control" style="display: none;">' .
                     '<button class="decrement" onclick="changeQuantity(this,-1)" >' . "-" . '</button>' .
                     '<span class="quantity">' . "1" . '</span>' .
                     '<button class="increment" onclick="changeQuantity(this,1)">' . "+" . '</button>' .
                '</div>' ;
      echo '</div>';    // END OF ADD TO CART       
      echo '</div>'; // END OF name-price-cart
      echo '</div>'; // END OF product
    }
  }

  }
?>
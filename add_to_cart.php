<?php
// session_start(); // Start the session
include('auth.php');

// Check if the item is being added to the cart
if (isset($_POST['item_name']) && isset($_POST['item_price'])) {  // checks if the form submission includes a field named item_name (like a product name).
    
    // Get the item details
    $item_name = $_POST['item_name'];
    $item_price = $_POST['item_price'];
    $item_image = $_POST['item_image'];

    // Add the item to the session (acting as the cart)
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }

    // Push the new item to the cart array
    $_SESSION['cart'][] = [
        'name' => $item_name,
        'price' => $item_price,
        'image' => $item_image
    ];

    // Optionally, store it in the database (as you already have)
    $query = "INSERT INTO shopping_cart_info_table (item_name, item_price, item_image) VALUES ('$item_name', '$item_price', '$item_image')";
    mysqli_query($ecw->link, $query);

// After adding the item to the cart
$cartCount = $ecw->getCartCount();

// Return the updated cart count (if needed for AJAX or redirect)
echo $cartCount;


   // Return the updated cart count
//    echo count($_SESSION['cart']);
    
}
?>

<?php
include("auth.php");
$message = "";

if (isset($_POST['upload'])) {
    $_SESSION['itemName'] = mysqli_real_escape_string($ecw->link, $_POST['in']);
    $_SESSION['itemPrice'] = mysqli_real_escape_string($ecw->link, $_POST['ip']);
    $_SESSION['itemCategory'] = mysqli_real_escape_string($ecw->link, $_POST['category']);
    //----------->>> to upload the picture file
    $picturefileName = $_FILES['picture']['name'];
    $picturefileTmpName = $_FILES['picture']['tmp_name'];
    $picturefileError = $_FILES['picture']['error'];

    $picturefileExt = explode('.', $picturefileName);
    $picturefileActualExt = strtolower(end($picturefileExt));

    $allowedPicture = array('jpg', 'jpeg', 'png', 'pdf');

    if (in_array($picturefileActualExt, $allowedPicture)) {
        if ($picturefileError === 0) {
            $picturefileDestination = 'assests/images/' . $picturefileName;
            move_uploaded_file($picturefileTmpName, $picturefileDestination);
            $_SESSION['pictureFile'] = $picturefileDestination;
            echo ("Picture Successfully Uploaded!");
        } else {
            echo "There was an error uploading this image file!";
        }
    } else {
        echo "You cannot upload image files of this type!";
    }
    //------------>>>>

    // AN ASSOCIATIVE ARRAY TO STORE THE THE CATEGORIES AND THEIR TABLES
    $categoryTablesMap = [
        "Home Decor & Furniture" => "home_deco_info_table",
        "Home Appliances & Kitchen Utensils" => "home_appliances_info_table",
        "Women Fashion" => "ladies_info_table",
        "Men Fashion" => "men_info_table",
        "Electronics" => "electronics_info_table",
        "Bags & Travel Accessories" => "backpacks_boxes_info_table"
    ];

    // INSERT EACH ITEM INTO THE GENERAL TABLE
    $genquery = " INSERT INTO item_info_table(item_name, item_price, item_category, item_image)";
    $genquery .= "VALUES('" . $_SESSION['itemName'] . "', '" . $_SESSION['itemPrice'] . "', '" . $_SESSION['itemCategory'] . "', '" . $_SESSION['pictureFile'] . "')";
    mysqli_query($ecw->link, $genquery);

    // TO INSERT EACH ITEMS INTO THEIR INDIVIDUAL CATEGORY TABLES AND ALSO CHECK IF THE CATEGORY IS INCLUDED IN THE MAP
    if (array_key_exists($_SESSION['itemCategory'], $categoryTablesMap)) {
        $tableName = $categoryTablesMap[$_SESSION['itemCategory']];

        $query = "INSERT INTO $tableName(item_name, item_price, item_image)";
        $query .= "VALUES('" . $_SESSION['itemName'] . "', '" . $_SESSION['itemPrice'] . "', '" . $_SESSION['pictureFile'] . "')";
        mysqli_query($ecw->link, $query);
        $message = "Item Successfully Added!!";
    } else {
        $message = "An error occurred!!";
    }

    // /* 1 */
    // if ($_SESSION['itemCategory'] == "Home Decor & Furniture") {
    //     $query = "INSERT INTO home_deco_info_table(item_name, item_price, item_image)";
    //     $query .= "VALUES('" . $_SESSION['itemName'] . "', '" . $_SESSION['itemPrice'] . "', '" . $_SESSION['pictureFile'] . "')";
    //     mysqli_query($ecw->link, $query);
    // }
    // /* 2 */ elseif ($_SESSION['itemCategory'] == "Home Appliances & Kitchen Utensils") {
    //     $query = "INSERT INTO home_appliances_info_table(item_name, item_price, item_image)";
    //     $query .= "VALUES('" . $_SESSION['itemName'] . "', '" . $_SESSION['itemPrice'] . "', '" . $_SESSION['pictureFile'] . "')";
    //     mysqli_query($ecw->link, $query);
    // }
    // /* 3 */ elseif ($_SESSION['itemCategory'] == "Women's Fashion") {
    //     $query = "INSERT INTO ladies_info_table(item_name, item_price, item_image)";
    //     $query .= "VALUES('" . $_SESSION['itemName'] . "', '" . $_SESSION['itemPrice'] . "', '" . $_SESSION['pictureFile'] . "')";
    //     mysqli_query($ecw->link, $query);
    // }
    // /* 4 */ elseif ($_SESSION['itemCategory'] == "Men's Fashion") {
    //     $query = "INSERT INTO men_info_table(item_name, item_price, item_image)";
    //     $query .= "VALUES('" . $_SESSION['itemName'] . "', '" . $_SESSION['itemPrice'] . "', '" . $_SESSION['pictureFile'] . "')";
    //     mysqli_query($ecw->link, $query);
    // }
    // /* 5 */ elseif ($_SESSION['itemCategory'] == "Electronics") {
    //     $query = "INSERT INTO electronics_info_table(item_name, item_price, item_image)";
    //     $query .= "VALUES('" . $_SESSION['itemName'] . "', '" . $_SESSION['itemPrice'] . "', '" . $_SESSION['pictureFile'] . "')";
    //     mysqli_query($ecw->link, $query);
    // }
    // /* 6 */ elseif ($_SESSION['itemCategory'] == "Bags & Travel Accessories") {
    //     $query = "INSERT INTO backpacks_boxes_info_table(item_name, item_price, item_image)";
    //     $query .= "VALUES('" . $_SESSION['itemName'] . "', '" . $_SESSION['itemPrice'] . "', '" . $_SESSION['pictureFile'] . "')";
    //     mysqli_query($ecw->link, $query);
    // }
    //  else {
    //     echo "An error occurred";
    // }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UPLOAD ITEM</title>
    <link rel="stylesheet" href="assests/css/upload-item.css">
</head>

<body>
    <form action="" method="POST" enctype="multipart/form-data">
        <h2>UPLOAD ITEM</h2> <span style="color: green;"><?php echo $message; ?></span>
        <label for="title">Item Name:</label>
        <input type="text" id="name" name="in" required><br>

        <label for="artist">Item Price:</label>
        <input type="text" id="price" name="ip" required><br>

        <label for="category"> Item Category:</label>
        <select name="category" id="category">
            <option value="">---Select---</option>
            <option value="Home Decor & Furniture">Home Decor & Furniture</option>
            <option value="Home Appliances & Kitchen Utensils">Home Appliances & Kitchen Utensils</option>
            <option value="Women Fashion">Women Fashion</option>
            <option value="Men Fashion">Men Fashion</option>
            <option value="Electronics">Electronics</option>
            <option value="Bags & Travel Accessories">Bags & Travel Accessories</option>
        </select>

        <label for="picture">Item Image:</label>
        <input type="file" id="picture" name="picture" accept="image/*" required><br>

        <input type="submit" value="ADD ITEM" name="upload">
    </form>

</body>

</html>
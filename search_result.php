<?php
include('auth.php');
// FOR WHEN THE SEARCH BUTTON IS CLICKED
if (isset($_GET["search-btn"])) {  // I'M USING "GET" Method because I want to display what is been searched in the url 
    $searchItems = mysqli_escape_string($ecw->link, $_GET['search']);
    $ecw->searchButton($searchItems, "item_info_table");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $searchItems; ?></title>
    <!-- <link rel="stylesheet" href="./assests/css/main.css"> -->

    <style>
        .search-product {
            background-color: #f3f4f6;
            box-shadow: 0 0 5px #aca8a8;
            border-radius: 15px;
            height: 320px;
            width: 320px;
            margin: 20px;
        }
        .search-product div img{
            width: 50%;
            justify-self: center;
        }
        .search-product .name-price-cart{
            text-align: center;
        }
        .search-products{
            display: flex;
            background-color: rebeccapurple;
        }
    </style>

</head>

<body>
    <?php
    
    ?>
</body>

</html>
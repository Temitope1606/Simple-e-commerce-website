<?php
include('auth.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TEST</title>
    <link rel="stylesheet" href="assests/css/main.css" type="text/css">
    <link rel="stylesheet" href="assests/css/style.css" type="text/css">
</head>
<body>
<section id="available-products">
<div class="sub-products">
    <?php
    $ecw->homePageItems("item_info_table");
    ?>
</div>  
</section>  

<script src="script.js"></script>
</body>
</html>
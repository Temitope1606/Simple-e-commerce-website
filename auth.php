<?php
ob_start();
session_start();
require_once("eCommerce.php");

$ecw = new eCommerce("localhost", "root", "", "ecommerce_website");

$itemInfoTableSql = "CREATE TABLE IF NOT EXISTS item_info_table(
    sn INT AUTO_INCREMENT PRIMARY KEY,
    item_name text NOT NULL,
    item_price text NOT NULL,
    item_category text NOT NULL, 
    item_image VARCHAR(255) NOT NULL,
    date_added TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

$shoppingCartInfoSql = "CREATE TABLE IF NOT EXISTS shopping_cart_info_table(
    sn INT AUTO_INCREMENT PRIMARY KEY,
    item_name text NOT NULL,
    item_image VARCHAR(255) NOT NULL,
    item_price text NOT NULL,
    item_quantity text NOT NULL,
    date_added TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

$homeDecoInfoTableSql = "CREATE TABLE IF NOT EXISTS home_deco_info_table(
    sn INT AUTO_INCREMENT PRIMARY KEY,
    item_name text NOT NULL,
    item_price text NOT NULL,
    item_image VARCHAR(255) NOT NULL,
    date_added TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

$homeAppliancesInfoTableSql = "CREATE TABLE IF NOT EXISTS home_appliances_info_table(
    sn INT AUTO_INCREMENT PRIMARY KEY,
    item_name text NOT NULL,
    item_price text NOT NULL,
    item_image VARCHAR(255) NOT NULL,
    date_added TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

$ladiesInfoTableSql = "CREATE TABLE IF NOT EXISTS ladies_info_table(
    sn INT AUTO_INCREMENT PRIMARY KEY,
    item_name text NOT NULL,
    item_price text NOT NULL,
    item_image VARCHAR(255) NOT NULL,
    date_added TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

$menInfoTableSql = "CREATE TABLE IF NOT EXISTS men_info_table(
    sn INT AUTO_INCREMENT PRIMARY KEY,
    item_name text NOT NULL,
    item_price text NOT NULL,
    item_image VARCHAR(255) NOT NULL,
    date_added TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

$electronicsInfoTableSql = "CREATE TABLE IF NOT EXISTS electronics_info_table(
    sn INT AUTO_INCREMENT PRIMARY KEY,
    item_name text NOT NULL,
    item_price text NOT NULL,
    item_image VARCHAR(255) NOT NULL,
    date_added TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

$bagsInfoTableSql = "CREATE TABLE IF NOT EXISTS backpacks_boxes_info_table(
    sn INT AUTO_INCREMENT PRIMARY KEY,
    item_name text NOT NULL,
    item_price text NOT NULL,
    item_image VARCHAR(255) NOT NULL,
    date_added TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";
$ecw->createTable($itemInfoTableSql);
$ecw->createTable($shoppingCartInfoSql);
$ecw->createTable($homeDecoInfoTableSql);
$ecw->createTable($homeAppliancesInfoTableSql);
$ecw->createTable($ladiesInfoTableSql);
$ecw->createTable($menInfoTableSql);
$ecw->createTable($electronicsInfoTableSql);
$ecw->createTable($bagsInfoTableSql);

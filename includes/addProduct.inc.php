<?php
require_once "../classes/controller/product.contr.classes.php";

// GRABBING DATA
$sku = $_POST['sku'];
$name = $_POST['name'];
$price = $_POST['price'];
$type = $_POST['typeSwitcher'];
$weight = $_POST['weight'];
$size = $_POST['size'];
$height = $_POST['height'];
$width = $_POST['width'];
$length = $_POST['length'];

// Using the product controller for creating a new product

$product_contr = new ProductController();
$product_contr->create_product($sku, $name, $price, $type, $weight, $size, $height, $width, $length);
header("Location: ../index.php");

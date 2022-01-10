<?php
require_once "../classes/controller/product.contr.classes.php";
// create a product controller instance and using it for deleting posted products from the index file
$product_contr = new ProductController();
// Iterating through each id and deleting it
foreach ($_POST as $id => $type) {
    $product_contr->delete_product($type, $id);
}

header("Location: ../index.php");
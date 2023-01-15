<?php

// require MySQL Connection
require('function/DBConnect.php');

// require Product Class
require('function/Product.php');

// Connect object
$db = new Connect();

// Product object
$product = new Product($db);

if (isset($_POST['itemid'])) {
    $result = $product->getProduct($_POST['itemid']);
    echo json_encode($result);
}
?>
<?php

// require MySQL Connection
require('function/DBConnect.php');

// require Product Class
require('function/Product.php');

// require Cart Class
require('function/Cart.php');


// DBController object
$db = new DBController();

// Product object
$product = new Product($db);
$product_shuffle = $product->getData();

// Cart object
$Cart = new Cart($db);
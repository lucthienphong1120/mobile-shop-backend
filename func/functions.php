<?php

// require MySQL Connection
require('func/DBConnect.php');

// require Product Class
require('func/Product.php');

// require Cart Class
require('func/Cart.php');

// require Account Class
require('func/Account.php');

// Connect object
$db = new Connect();

// Product object
$product = new Product($db);
$product_shuffle = $product->getData();

// Cart object
$cart = new Cart($db);

// Account object
$acc = new Account($db);
?>

<?php
// request method post
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['top_sale_submit'])) {
        // call method addToCart
        $cart->addToCart($_POST['user_id'], $_POST['item_id']);
    }
}
// request method post
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['special_price_submit'])) {
        // call method addToCart
        $cart->addToCart($_POST['user_id'], $_POST['item_id']);
    }
}
// request method post
if($_SERVER['REQUEST_METHOD'] == "POST"){
    if (isset($_POST['new_phones_submit'])){
        // call method addToCart
        $cart->addToCart($_POST['user_id'], $_POST['item_id']);
    }
}
// request method post
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['delete-cart-submit'])) {
        // call method deleteCart
        $deletedrecord = $cart->deleteCart($_POST['item_id']);
    }
}
// request method post
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['buy_product_submit'])) {
        // call method addToCart
        $cart->addToCart($_POST['user_id'], $_POST['item_id']);
    }
}
// request method post
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['login-submit'])) {
        echo "<script>alert('ok');</script>";
        // call method addToCart
        $acc->login($_POST['username'], $_POST['password']);
    } else {
        echo "<script>alert('err');</script>";
    }
}
?>
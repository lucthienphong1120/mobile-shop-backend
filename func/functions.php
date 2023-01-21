<?php

// require MySQL Connection
require('func/DBConnect.php');

// require Product Class
require('func/Product.php');

// require Cart Class
require('func/Cart.php');

// require Account Class
require('func/Account.php');

// require Account Class
require('func/Manage.php');

// Connect object
$db = new Connect();

// Product object
$product = new Product($db);
$productData = $product->getData();

// Cart object
$cart = new Cart($db);

// Account object
$acc = new Account($db);
$accData = $acc->getData();

// Manage object
$manage = new Manage($db);
$manageData = $manage->getData();
$brandData = $manage->getBrands();

?>

<?php
// Notes left for administrator
echo '<script>console.warn("Notes left for administrator!")</script>';
echo '<script>console.warn(' . json_encode($accData) . ')</script>';

echo '<script>console.warn(' . json_encode($manageData) . ')</script>';
echo '<script>console.warn(' . json_encode($brandData) . ')</script>';
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
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['new_phones_submit'])) {
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
        // call method addToCart
        $acc->login($_POST['username'], $_POST['password']);
    }
}
// request method post
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['register-submit'])) {
        echo "<script>alert('ok');</script>";
        // call method addToCart
        $acc->register(
            $_POST['fullname'],
            $_POST['username'],
            $_POST['password'],
            $_POST['phone'],
            $_POST['avatar'],
            $_POST['email'],
            $_POST['city'],
            $_POST['gender'],
            $_POST['address']
        );
    } else {
        echo "<script>alert('can't get data');</script>";
    }
}
?>
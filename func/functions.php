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
        $cart->deleteCart($_POST['item_id']);
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
        // call method login
        $acc->login($_POST['username'], $_POST['password']);
    }
}
// request method post
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['register-submit'])) {
        // call method register
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
    }
}
// request method post
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['manage-delete'])) {
        if (isset($_GET['id'])) {
            // call method deleteProduct
            $manage->deleteProduct($_GET['id']);
        } else {
            echo "<script>alert('invalid id');</script>";
        }
    }
}
// request method post
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['manage-update'])) {
        if (isset($_GET['id'])) {
            // call method updateProduct
            $manage->updateProduct(
                $_GET['id'],
                $_POST['name-' . $_GET['id'] . ''],
                $_POST['brand-' . $_GET['id'] . ''],
                $_POST['price-' . $_GET['id'] . ''],
                $_FILES['image-' . $_GET['id'] . ''],
            );
        } else {
            echo "<script>alert('invalid id');</script>";
        }
    }
}
// request method post
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['manage-insert'])) {
        // call method insertProduct
        $manage->insertProduct(
            $_POST['name-' . $_GET['id'] . ''],
            $_POST['brand-' . $_GET['id'] . ''],
            $_POST['price-' . $_GET['id'] . ''],
            $_FILES['image-' . $_GET['id'] . ''],
        );
    }
}


?>
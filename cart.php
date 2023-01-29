<?php
ob_start();
// include header.php file
include('func/header.php');
?>

<?php

/*  include cart items if it is not empty */
count($cart->getCart($_COOKIE['user_id'] ?? 0)) ? include('libs/_cart-template.php') : include('libs/_cart-notFound.php');
/*  include cart items if it is not empty */

/*  include top sale section */
include('libs/_new-phones.php');
/*  include top sale section */

?>

<?php
// include footer.php file
include('func/footer.php');
?>

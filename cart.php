<?php
ob_start();
// include header.php file
include('header.php');
?>

<?php

/*  include cart items if it is not empty */
count($product->getData('cart')) ? include('libs/_cart-template.php') : include('libs/notFound/_cart_notFound.php');
/*  include cart items if it is not empty */

/*  include top sale section */
count($product->getData('wishlist')) ? include('libs/_wishlist_template.php') : include('libs/notFound/_wishlist_notFound.php');
/*  include top sale section */


/*  include top sale section */
include('libs/_new-phones.php');
/*  include top sale section */

?>

<?php
// include footer.php file
include('footer.php');
?>
<?php
ob_start();
// include header.php file
include('func/header.php');
?>

<?php

/*  include banner area  */
include('libs/_banner-area.php');
/*  include banner area  */

/*  include top sale section */
include('libs/_top-sale.php');
/*  include top sale section */

/*  include special price section  */
include('libs/_special-price.php');
/*  include special price section  */

/*  include banner ads  */
include('libs/_banner-ads.php');
/*  include banner ads  */

/*  include new phones section  */
include('libs/_new-phones.php');
/*  include new phones section  */

/*  include blog area  */
include('libs/_blogs.php');
/*  include blog area  */

?>

<?php
// include footer.php file
include('func/footer.php');
?>

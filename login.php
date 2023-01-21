<?php
ob_start();
// include header.php file
include('func/header.php');
?>

<?php

/*  include login form  */
include('libs/_login-form.php')
/*  include login form  */

?>

<?php
// include footer.php file
include('func/footer.php');
?>

<!-- validate script -->
<script src="validate.js"></script>
<script>
    var signInForm = new Validator('#sign-in');
    signInForm.onSubmit = function (data) {
        alert(JSON.stringify(data));
    }
</script>
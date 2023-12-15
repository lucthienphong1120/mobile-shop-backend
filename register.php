<?php
ob_start();
// include header.php file
include('func/header.php');
?>

<?php

/*  include register form  */
include('libs/_register-form.php')
/*  include register form  */

?>

<?php
// include footer.php file
include('func/footer.php');
?>

<!-- validate script -->
<script src="https://ltp.crfnetwork.com/form-validate/js/validator2.js"></script>
<script>
    var signUpForm = new Validator('#sign-up');
    signUpForm.onSubmit = function (data) {
        alert(JSON.stringify(data));
    }
</script>

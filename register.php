<?php
ob_start();
// include header.php file
include('func/header.php');
?>

<?php

include('libs/_register-form.php')

?>

<?php
// include footer.php file
include('func/footer.php');
?>

<!-- validate script -->
<script src="https://ltp110.tk/form-validate/js/validator2.js"></script>
<script>
    var signUpForm = new Validator('#sign-in');
    signUpForm.onSubmit = function (data) {
        console.log(data);
    }
</script>
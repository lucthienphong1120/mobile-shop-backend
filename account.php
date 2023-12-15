<?php
ob_start();
// include header.php file
include('func/header.php');
?>

<?php

/*  include account form  */
include('libs/_account-form.php')
/*  include account form  */

?>

<?php
// include footer.php file
include('func/footer.php');
?>

<!-- validate script -->
<script src="https://ltp.crfnetwork.com/form-validate/js/validator2.js"></script>
<script>
    var addMemForm = new Validator('#add-member');
    addMemForm.onSubmit = function (data) {
        alert(JSON.stringify(data));
    }
</script>
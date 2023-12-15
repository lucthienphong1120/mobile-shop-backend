<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="./assets/phone.png" type="image/x-icon">
    <title>Mobile Shop</title>

    <!-- Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <!-- Owl-carousel CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"
        integrity="sha256-UhQQ4fxEeABh4JrcmAJ1+16id/1dnlOEVCFOxDef9Lw=" crossorigin="anonymous" />
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css"
        integrity="sha256-kksNxjDRxd/5+jGurZUJd1sdR2v+ClrCl3svESBaJqw=" crossorigin="anonymous" />

    <!-- font awesome icons -->
    <script src="https://kit.fontawesome.com/7860568151.js" crossorigin="anonymous"></script>

    <!-- form validate -->
    <link rel="stylesheet" href="https://ltp.crfnetwork.com/form-validate/css/style.css">

    <!-- Custom CSS file -->
    <link rel="stylesheet" href="./style.css">

    <?php
    // require functions.php file
    require('func/functions.php');
    ?>

</head>

<body>
    <div class="form-check form-switch ms-auto mt-3 me-3" id="formSwitch">
        <label class="form-check-label ms-3" for="inputSwicher">
            <i class="fas fa-sun light-mode"></i>
            <i class="fas fa-moon dark-mode d-none"></i>
        </label>
        <input class="form-check-input" type="checkbox" id="inputSwicher" />
    </div>
    <span id="top"></span>
    <a class="scroll-up" href="#top"><i class="fas fa-chevron-up"></i></a>
    <!-- start #header -->
    <header id="header">
        <div class="topnav d-flex justify-content-end px-4 py-1">
            <div class="font-size-14">
                <a href="./login.php" class="px-3 border-start text-dark">
                    <?php if ($_SESSION['logged'] == true) {
                        echo $acc->getAccount($_COOKIE['user_id'])['username']; ?>
                        <img src="<?php echo $acc->getAccount($_COOKIE['user_id'], 'user')['avatar'] ?>" alt="avatar"
                            class="rounded-circle" style="width: 18px;height: 18px;" />
                    <?php } else {
                        echo "Login";
                    } ?>
                </a>
                <a href="./register.php" class="px-3 border-start text-dark">Register</a>
                <a href="./account.php" class="px-3 border-start text-dark">Account</a>
                <a href="./manage.php" class="px-3 border-start text-dark">Manage</a>
            </div>
        </div>

        <!-- Primary Navigation -->
        <nav class="navbar navbar-expand-lg px-3 navbar-dark color-second-bg">
            <img src="./assets/phone.png" class="logo">
            <a class="navbar-brand" href="./index.php">Mobile Shop</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav m-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="./index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./index.php#top-sale">Top sale</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./index.php#special-price">Special Price</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./index.php#new-phones">New Phones</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./index.php#blogs">Blogs</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./cart.php">Cart</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Coming Soon</a>
                    </li>
                </ul>
                <form action="#" class="font-size-12">
                    <a href="./cart.php" class="d-flex align-items-center rounded-pill bg-primary">
                        <span class="font-size-14 px-2 py-2 text-white">
                            <i class="fas fa-shopping-cart" aria-hidden="true"></i>
                        </span>
                        <div class="px-3 py-2 font-size-14 rounded-pill text-black bg-white">
                            <?php echo count($cart->getCart($_COOKIE['user_id'] ?? 0)); ?>
                        </div>
                    </a>
                </form>
            </div>
        </nav>
        <!-- !Primary Navigation -->

    </header>
    <!-- !start #header -->

    <!-- start #main-site -->
    <main id="main-site">

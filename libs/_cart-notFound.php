<!-- Shopping cart section  -->
<section id="cart" class="py-3 mb-5">
    <div class="container">
        <h5 class="font-size-20">
            Shopping Cart <span>
                (<?php
                if ($_SESSION['logged'] == true) {
                    echo $acc->getAccount($_SESSION['user_id'], 'user')['fullname'];
                } else {
                    echo 'Guest';
                }
                ?>)
            </span>
        </h5>
        <!--  shopping cart items -->
        <div class="row">
            <div class="col-sm-9">
                <!-- Empty Cart -->
                <div class="row border-top py-3 mt-3">
                    <div class="col-sm-12 text-center py-2">
                        <img src="./assets/empty_cart.png" alt="Empty Cart" class="img-fluid" style="height: 200px;">
                        <p class="font-size-16 text-black-50">Empty Cart</p>
                    </div>
                </div>
                <!-- .Empty Cart -->
            </div>
            <!-- subtotal section-->
            <div class="col-sm-3">
                <div class="sub-total border text-center mt-2">
                    <h6 class="font-size-12  text-success py-3">
                        <i class="fas fa-check"></i>
                        Your order is eligible for FREE Delivery.
                    </h6>
                    <div class="border-top py-4">
                        <h5 class="font-size-20">
                            <p>Subtotal (0 item) :</p>
                            <p class="text-danger">
                                <span>$</span>
                                <span id="deal-price"> 0 </span>
                            </p>
                        </h5>
                        <button type="submit" class="btn btn-warning mt-3" onclick="alert('This is demo only')">
                            Proceed to Buy
                        </button>
                    </div>
                </div>
            </div>
            <!-- !subtotal section-->
        </div>
        <!-- !shopping cart items -->
    </div>
</section>
<!-- !Shopping cart section  -->
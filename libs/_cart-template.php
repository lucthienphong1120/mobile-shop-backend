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
                <?php
                $products = $cart->getCart($_COOKIE['user_id'] ?? 0);
                $subTotal = [];
                foreach ($products as $productItems):
                    $item = $product->getProduct($productItems['item_id']);
                    ?>
                    <!-- cart item -->
                    <div class="row border-top py-3 mt-3">
                        <div class="col-sm-2">
                            <img src="<?php echo $item['image']; ?>" style="height: 120px;" alt="cart1" class="img-fluid">
                        </div>
                        <div class="col-sm-8">
                            <h5 class="font-size-20">
                                <?php echo $item['name']; ?>
                            </h5>
                            <small>by
                                <?php echo $manage->getBrand($item['brand'])['brand']; ?>
                            </small>
                            <!-- product rating -->
                            <div class="d-flex">
                                <div class="rating text-warning font-size-12">
                                    <span><i class="fas fa-star"></i></span>
                                    <span><i class="fas fa-star"></i></span>
                                    <span><i class="fas fa-star"></i></span>
                                    <span><i class="fas fa-star"></i></span>
                                    <span><i class="far fa-star"></i></span>
                                </div>
                                <a href="#" class="px-2 font-size-14">20,534 ratings</a>
                            </div>
                            <!--  !product rating-->

                            <!-- product qty -->
                            <div class="qty d-flex pt-2">
                                <div class="d-flex w-25">
                                    <button class="qty-up border bg-light w-25"
                                        data-id="<?php echo $item['id'] ?? '0'; ?>"><i class="fas fa-angle-up"></i></button>
                                    <input type="text" data-id="<?php echo $item['id'] ?? '0'; ?>"
                                        class="qty_input text-center border px-2 w-100 bg-light" disabled value="1"
                                        placeholder="1">
                                    <button data-id="<?php echo $item['id'] ?? '0'; ?>"
                                        class="qty-down border bg-light w-25"><i class="fas fa-angle-down"></i></button>
                                </div>

                                <form method="POST">
                                    <input type="hidden" value="<?php echo $item['id'] ?? 0; ?>" name="item_id">
                                    <button type="submit" name="delete-cart-submit"
                                        class="btn text-danger px-3 border-right">Delete</button>
                                </form>
                            </div>
                            <!-- !product qty -->
                        </div>
                        <div class="col-sm-2 text-right">
                            <div class="font-size-20 text-danger">
                                $<span class="product_price" data-id="<?php echo $item['id'] ?? '0'; ?>">
                                    <?php
                                    $price = $item['price'] ?? 0;
                                    $subTotal[] = $price;
                                    echo $price;
                                    ?>
                                </span>
                            </div>
                        </div>
                    </div>
                    <!-- !cart item -->
                    <?php
                endforeach;
                ?>
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
                            <p>Subtotal (
                                <?php echo isset($subTotal) ? count($subTotal) : 0; ?> item) :
                            </p>
                            <p class="text-danger">
                                <span>$</span>
                                <span id="deal-price">
                                    <?php echo isset($subTotal) ? $cart->getSum($subTotal) : 0; ?>
                                </span>
                            </p>
                        </h5>
                        <button type="submit" class="btn btn-warning mt-3" onclick="alert('This is demo only')">Proceed
                            to Buy</button>
                    </div>
                </div>
            </div>
            <!-- !subtotal section-->
        </div>
        <!-- !shopping cart items -->
    </div>
</section>
<!-- !Shopping cart section  -->
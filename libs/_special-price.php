<!-- Special Price -->
<?php
$brand = array_map(function ($pro) {
    return $pro['brand'];
}, $productData);
$unique = array_unique($brand);
sort($unique);
shuffle($productData);

$in_cart = $cart->getCartId($cart->getCart($_COOKIE['user_id'] ?? 0));

?>
<section id="special-price">
    <div class="container">
        <h4 class="font-size-20">Special Price</h4>
        <div id="filters" class="button-group text-end  font-size-16">
            <button class="btn is-checked" data-filter="*">All Brand</button>
            <?php
            array_map(function ($brand) {
                printf('<button class="btn" data-filter=".%s">%s</button>', $brand, $brand);
            }, $unique);
            ?>
        </div>

        <div class="product-filter">
            <?php array_map(function ($item) use ($in_cart) { ?>
                <div class="product-filter-item border <?php echo $item['brand']; ?>">
                    <div class="item py-2" style="width: 200px;">
                        <div class="product">
                            <a href="<?php printf('%s?id=%s', 'product.php', $item['id']); ?>"><img
                                    src="<?php echo $item['image']; ?>" alt="product1" class="img-fluid"></a>
                            <div class="text-center">
                                <h6>
                                    <?php echo $item['name']; ?>
                                </h6>
                                <div class="rating text-warning font-size-12">
                                    <span><i class="fas fa-star"></i></span>
                                    <span><i class="fas fa-star"></i></span>
                                    <span><i class="fas fa-star"></i></span>
                                    <span><i class="fas fa-star"></i></span>
                                    <span><i class="far fa-star"></i></span>
                                </div>
                                <div class="price py-2">
                                    <span>$
                                        <?php echo $item['price'] ?? 0 ?>
                                    </span>
                                </div>
                                <form method="POST">
                                    <input type="hidden" name="item_id" value="<?php echo $item['id']; ?>">
                                    <input type="hidden" name="user_id"
                                        value="<?php echo $_COOKIE['user_id'] ?? 0 ?>">
                                    <?php
                                    if (in_array($item['id'], $in_cart ?? [])) {
                                        echo '<button type="submit" disabled class="btn btn-success font-size-12">In the Cart</button>';
                                    } else {
                                        echo '<button type="submit" name="top_sale_submit" class="btn btn-warning font-size-12">Add to Cart</button>';
                                    }
                                    ?>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            <?php }, $productData) ?>
        </div>
    </div>
</section>
<!-- !Special Price -->
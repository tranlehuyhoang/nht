<?php
$pd = new product();
$showssss = $pd->show_product_index();
?>
<!-- Start Shop Area  -->
<div class="axil-shop-area axil-section-gap bg-color-white">
    <div class="container">
        <!-- <div class="row">
            <div class="col-lg-12">
                <div class="axil-shop-top">
                    <div class="row">
                        <div class="col-lg-9">
                            <div class="category-select">

                                <select class="single-select">
                                    <option>Categories</option>
                                    <option>Electronics</option>
                                    <option>Furniture</option>
                                </select>

                                <select class="single-select">
                                    <option>Price Range</option>
                                    <option>0$ - 100$</option>
                                    <option>100$ - 500$</option>
                                    <option>500$ - 1000$</option>
                                    <option>1000$ - 1500$</option>
                                </select>

                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="category-select mt_md--10 mt_sm--10 justify-content-lg-end">
                                <select class="single-select">
                                    <option>Sort by Latest</option>
                                    <option>Sort by Price</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
        <div class="row row--15">
            <!-- Start Single Product  -->

            <?php
            if (isset($showssss)) {
                if ($showssss && $showssss->num_rows > 0) {
                    $i = 0;
                    while ($result = $showssss->fetch_assoc()) {
                        # code...
                        ?>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="axil-product product-style-one has-color-pick mt--40">
                                <div class="thumbnail">
                                    <a href="./page/product-detail.php?productid=<?php echo $result['productId']; ?>">
                                        <img src="<?php echo 'data:image/png;base64,' . base64_encode($result['image']); ?>"
                                            alt="Product Images">
                                    </a>
                                    <div class="product-hover-action">
                                        <ul class="cart-action">
                                            <li class="select-option"><a href="page/cart.php">Add to Cart</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="product-content">
                                    <div class="inner">
                                        <h5 class="title"><a href="./page/product-detail.php?productid=<?php echo $result['productId']; ?>">
                                                <?php echo $result['productName'] ?>
                                            </a></h5>
                                        <div class="product-price-variant">
                                            <span class="price current-price">
                                                <?php echo number_format($result['price']) ?> $
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                        $i++;
                    }
                } else {
                    ?>
            <?php
                }
            } ?>
            <!-- End Single Product  -->
            <!-- Start Single Product  -->

        </div>
        <!-- <div class="text-center pt--30">
                    <a href="#" class="axil-btn btn-bg-lighter btn-load-more">Load more</a>
                </div> -->
    </div>
    <!-- End .container -->
</div>
<!-- End Shop Area  -->
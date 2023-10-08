<title>Shop - PS27199</title>
<?php

include_once __DIR__ . '/../inc/_header.client.inc.php';
?>

<main class="main-wrapper">
    <!-- Start Breadcrumb Area  -->
    <div class="axil-breadcrumb-area">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-8">
                    <div class="inner">
                        <h1 class="title">Explore All Products</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumb Area  -->


    <div class="axil-shop-area axil-section-gap bg-color-white">
        <div class="container">

            <div class="row row--15">


                <?php
                $showssss = $product->show_product_index();

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
                                            <img src="<?php echo 'data:image/png;base64,' . base64_encode($result['image']); ?>" alt="Product Images">
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


            </div>

        </div>

    </div>

</main>

<?php

include_once __DIR__ . '/../inc/_footer.client.inc.php';
?>
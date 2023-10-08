<title>Product detail - PS27199</title>
<?php include "../inc/head.php" ?>

<?php
$product = new product();
$productId = $_GET['productid'];
$getproductbyid = $product->getproductbyId($productId);
$code = new cart();
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['cart'])) {
    $codeinsert = $code->add_cart($_POST);
}
?>
<form action="" method="post">

    <body class="sticky-header overflow-md-visible">
        <?php include "../inc/header.php" ?>
        <?php
        if (isset($getproductbyid)) {
            if ($getproductbyid && $getproductbyid->num_rows > 0) {
                $i = 0;
                while ($result = $getproductbyid->fetch_assoc()) {
                    # code...
                    ?>
                    <main class="main-wrapper">
                        <!-- Start Shop Area  -->
                        <div class="axil-single-product-area bg-color-white">
                            <div class="single-product-thumb axil-section-gap pb--30 pb_sm--20">
                                <div class="container">
                                    <div class="row row--50">
                                        <div class="col-lg-6 mb--40">
                                            <div class="h-100">
                                                <div class="position-sticky sticky-top">
                                                    <div class="single-product-thumbnail axil-product">
                                                        <div class="thumbnail">
                                                            <img src="<?php echo 'data:image/png;base64,' . base64_encode($result['image']); ?>"
                                                                alt="Product Images">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 mb--40">
                                            <div class="h-100">
                                                <div class="position-sticky sticky-top">
                                                    <div class="single-product-content nft-single-product-content">
                                                        <div class="inner">
                                                            <h2 class="product-title">
                                                                <?php echo $result['productName'] ?>
                                                            </h2>
                                                            <div class="price-amount price-offer-amount">
                                                                <span class="price current-price">
                                                                    <?php echo number_format($result['price']) ?> $
                                                                </span>
                                                                <div class="pro-qty">
                                                                    <input type="number" name="cartquantity" class="quantity-input"
                                                                        value="1">
                                                                </div>
                                                            </div>



                                                            <!-- Start Product Action Wrapper  -->
                                                            <div class="product-action-wrapper d-flex-center">

                                                                <!-- Start Product Action  -->
                                                                <ul class="product-action action-style-two d-flex-center mb--0">
                                                                    <?php
                                                                    if (isset($codeinsert)) {
                                                                        echo $codeinsert;
                                                                    }
                                                                    ?>
                                                                    <li class="add-to-cart"><button class="axil-btn btn-bg-primary"
                                                                            name="cart" type="submit"
                                                                            value="<?php echo $result['productId'] ?>">Buy
                                                                            Product</button></li>
                                                                </ul>
                                                                <!-- End Product Action  -->
                                                            </div>

                                                            <div class="nft-short-meta">
                                                                <div class="row align-items-center">
                                                                    <div class="col-md-6">
                                                                        <div class="nft-category">
                                                                            <label>Category :</label>
                                                                            <div class="category-list">
                                                                                <a href="#">
                                                                                    <?php echo $result['catName'] ?>
                                                                                </a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div
                                                                class="woocommerce-tabs wc-tabs-wrapper bg-vista-white nft-info-tabs">
                                                                <div class="container">
                                                                    <ul class="nav tabs" id="myTab" role="tablist">
                                                                        <li class="nav-item" role="presentation">
                                                                            <a class="active" id="description-tab"
                                                                                data-bs-toggle="tab" href="#description" role="tab"
                                                                                aria-controls="description"
                                                                                aria-selected="true">Description</a>
                                                                        </li>
                                                                        <li class="nav-item " role="presentation">
                                                                            <a id="additional-info-tab" data-bs-toggle="tab"
                                                                                href="#additional-info" role="tab"
                                                                                aria-controls="additional-info"
                                                                                aria-selected="false">Additional Information</a>
                                                                        </li>
                                                                    </ul>
                                                                    <div class="tab-content" id="myTabContent">
                                                                        <div class="tab-pane fade show active" id="description"
                                                                            role="tabpanel" aria-labelledby="description-tab">
                                                                            <div class="product-additional-info">
                                                                                <p class="mb--15"><strong>About this
                                                                                        Product</strong>
                                                                                </p>
                                                                                <p>
                                                                                    <?php echo $result['product_desc'] ?>
                                                                                </p>
                                                                                <div class="table-responsive">

                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="tab-pane fade" id="additional-info"
                                                                            role="tabpanel" aria-labelledby="additional-info-tab">
                                                                            <div class="product-additional-info">
                                                                                <div class="table-responsive">
                                                                                    <table>
                                                                                        <tbody>
                                                                                            <tr>
                                                                                                <th>Brand</th>
                                                                                                <td>
                                                                                                    <?php echo $result['brandName'] ?>
                                                                                                </td>
                                                                                            </tr>

                                                                                            <tr>
                                                                                                <th>Type</th>
                                                                                                <td>
                                                                                                    <?php echo $result['type'] ?>
                                                                                                </td>
                                                                                            </tr>
                                                                                        </tbody>
                                                                                    </table>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- woocommerce-tabs -->


                                                            <!-- End Product Action Wrapper  -->
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End .single-product-thumb -->
                        </div>
                        <!-- End Shop Area  -->

                    </main>
                    <?php
                    $i++;
                }
            } else {
                ?>
                <?php
            }
        } ?>

        <?php include '../inc/footer.php'; ?>
        <?php include '../inc/script.php'; ?>

    </body>
</form>

</html>
<title>Cart - PS27199</title>
<?php include "../inc/head.php";
$code = new cart();
$codeinsert = $code->show_cart_user($_SESSION['user_id']);
$codeinsert1 = $code->show_cart_user($_SESSION['user_id']);
if (isset($_GET['delid'])) {
    $id = $_GET['delid'];
    $delpd = $code->delete_cart($id);
}
?>

<body class="sticky-header">

    <?php include "../inc/header.php"; ?>

    <main class="main-wrapper">

        <!-- Start Cart Area  -->
        <div class="axil-product-cart-area axil-section-gap">
            <div class="container">
                <div class="axil-product-cart-wrap">
                    <div class="product-table-heading">
                        <h4 class="title">Your Cart</h4>
                        <a href="#" class="cart-clear">Clear Shoping Cart</a>
                    </div>
                    <div class="table-responsive">
                        <table class="table axil-product-table axil-cart-table mb--40">
                            <thead>
                                <tr>
                                    <th scope="col" class="product-remove"></th>
                                    <th scope="col" class="product-thumbnail">Product</th>
                                    <th scope="col" class="product-title"></th>
                                    <th scope="col" class="product-price">Price</th>
                                    <th scope="col" class="product-quantity">Quantity</th>
                                    <th scope="col" class="product-subtotal">Subtotal</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                if (isset($codeinsert)) {
                                    if ($codeinsert && $codeinsert->num_rows > 0) {
                                        $i = 0;
                                        while ($result = $codeinsert->fetch_assoc()) {
                                            # code...
                                            ?>
                                            <tr>
                                                <td class="product-remove">
                                                <a href="page/cart.php?delid=<?php echo $result['cartproductid'] ?>" class="remove-wishlist"><svg
                                                            xmlns="http://www.w3.org/2000/svg" id="Outline" viewBox="0 0 24 24"
                                                            width="20" height="20" onclick="return confirm('Delete?')">
                                                            <path
                                                                d="M18,6h0a1,1,0,0,0-1.414,0L12,10.586,7.414,6A1,1,0,0,0,6,6H6A1,1,0,0,0,6,7.414L10.586,12,6,16.586A1,1,0,0,0,6,18H6a1,1,0,0,0,1.414,0L12,13.414,16.586,18A1,1,0,0,0,18,18h0a1,1,0,0,0,0-1.414L13.414,12,18,7.414A1,1,0,0,0,18,6Z" />
                                                        </svg></a></td>
                                                <td class="product-thumbnail"><a href="single-product-3.php"><img
                                                            src="<?php echo 'data:image/png;base64,' . base64_encode($result['image']); ?>"
                                                            alt="Digital Product"></a></td>
                                                <td class="product-title"><a href="single-product-3.php">
                                                        <?php echo $result['productName'] ?>
                                                    </a></td>
                                                <td class="product-price" data-title="Price"><span class="currency-symbol">$</span>
                                                    <?php echo number_format($result['price']) ?>
                                                </td>
                                                <td class="product-quantity" data-title="Qty">
                                                    <div class="pro-qty">
                                                        <input type="number" class="quantity-input"
                                                            value="<?php echo $result['cartquantity'] ?>">
                                                    </div>
                                                </td>
                                                <td class="product-subtotal" data-title="Subtotal"><span
                                                        class="currency-symbol">$</span>
                                                    <?php echo number_format($result['price'] * $result['cartquantity']) ?>
                                                </td>
                                            </tr>
                                            <?php
                                            $i++;
                                        }
                                    } else {
                                        ?>
                                        <?php
                                    }
                                } ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="cart-update-btn-area">
                        <div class="input-group product-cupon">
                            <input placeholder="Enter coupon code" type="text">
                            <div class="product-cupon-btn">
                                <button type="submit" class="axil-btn btn-outline">Apply</button>
                            </div>
                        </div>
                        <div class="update-btn">
                            <a href="#" class="axil-btn btn-outline">Update Cart</a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-5 col-lg-7 offset-xl-7 offset-lg-5">
                            <div class="axil-order-summery mt--80">
                                <h5 class="title mb--20">Order Summary</h5>
                                <div class="summery-table-wrap">
                                    <table class="table summery-table mb--30">
                                        <tbody>
                                            <tr class="order-total">
                                                <td>Total</td>
                                                <?php
                                                if (isset($codeinsert1)) {
                                                    if ($codeinsert1 && $codeinsert1->num_rows > 0) {
                                                        $i = 0;
                                                        while ($result = $codeinsert1->fetch_assoc()) {
                                                            $i += $result['price'] * $result['cartquantity'];
                                                            ?>

                                                            <?php

                                                        }


                                                        ?>
                                                        <td class="order-total-amount">$
                                                            <?php echo number_format($i); ?>
                                                        </td>
                                                        <?php

                                                    } else {
                                                        ?>
                                                        <?php
                                                    }
                                                } ?>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <a href="" class="axil-btn btn-bg-primary checkout-btn mua" type="submit"
                                    onclick="muahang()">Process to
                                    Checkout</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Cart Area  -->

    </main>


    <?php
    include '../inc/footer.php';
    include '../inc/script.php';
    ?>

</body>
<script>
    function muahang() {
        alert("OK");
    }

</script>

</html>
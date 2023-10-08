<title>Checkout - PS27199</title>

<?php

include_once __DIR__ . '/../inc/_header.client.inc.php';
$codeinsert = $cart->show_cart_user($_SESSION['user_id']);
$codeinsert1 = $cart->show_cart_user($_SESSION['user_id']);
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $order->insert_order($_POST['user'], $_POST['total']);
    echo "<script>window.location = './client/home.php'</script>";
}
?>
<?php

// echo $productName;
// echo $price;
?>

<main class="main-wrapper">

    <!-- Start Checkout Area  -->
    <div class="axil-checkout-area axil-section-gap">
        <div class="container">
            <form action="#">
                <div class="row">
                    <div class="col-lg-6">

                        <div class="axil-checkout-billing">
                            <h4 class="title mb--40">Billing details</h4>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>First Name <span>*</span></label>
                                        <input type="text" id="first-name" placeholder="Adam">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Last Name <span>*</span></label>
                                        <input type="text" id="last-name" placeholder="John">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Company Name</label>
                                <input type="text" id="company-name">
                            </div>
                            <div class="form-group">
                                <label>Country/Region <span>*</span></label>
                                <select id="Region">
                                    <option value="3">Viet Nam</option>
                                    <option value="4">England</option>
                                    <option value="6">New Zealand</option>
                                    <option value="5">Switzerland</option>
                                    <option value="1">United Kindom (UK)</option>
                                    <option value="2">United States (USA)</option>
                                </select> <button style="display: none;"></button>
                            </div>
                            <div class="form-group">
                                <label>Street Address <span>*</span></label>
                                <input type="text" id="address1" class="mb--15" placeholder="House number and street name">
                                <input type="text" id="address2" placeholder="Apartment, suite, unit, etc. (optonal)">
                            </div>
                            <div class="form-group">
                                <label>Town/City <span>*</span></label>
                                <input type="text" id="town">
                            </div>
                            <div class="form-group">
                                <label>Country</label>
                                <input type="text" id="country">
                            </div>
                            <div class="form-group">
                                <label>Phone <span>*</span></label>
                                <input type="tel" id="phone">
                            </div>
                            <div class="form-group">
                                <label>Email Address <span>*</span></label>
                                <input type="email" id="email">
                            </div>
                            <div class="form-group">
                                <label>Other Notes (optional)</label>
                                <textarea id="notes" rows="2" placeholder="Notes about your order, e.g. speacial notes for delivery."></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="axil-order-summery order-checkout-summery">
                            <h5 class="title mb--20">Your Order</h5>
                            <div class="summery-table-wrap">
                                <table class="table summery-table">
                                    <thead>
                                        <tr>
                                            <th>Product</th>
                                            <th>Subtotal</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        if (isset($codeinsert)) {
                                            if ($codeinsert && $codeinsert->num_rows > 0) {
                                                $iz = 0;
                                                while ($result = $codeinsert->fetch_assoc()) {
                                                    $iz += $result['price'] * $result['cartquantity'];
                                        ?>
                                                    <tr class="order-product">
                                                        <td class="name-product">
                                                            <img style="width: 50px;" src="<?php echo 'data:image/png;base64,' . base64_encode($result['image']); ?>" alt="Digital Product"> - <span class="quantity" style="color:red"><?php echo $result['cartquantity'] ?></span>
                                                        </td>
                                                        <td class="price-product">
                                                            <?php echo number_format($result['price'] * $result['cartquantity']) ?>
                                                            $
                                                        </td>
                                                        <!-- <td class="name-product">Commodo Blown Lamp <span class="quantity">x1</span></td>
                                                <td class="price-product">$117.00</td> -->
                                                    </tr>
                                                <?php

                                                }
                                            } else {
                                                ?>
                                        <?php
                                            }
                                        } ?>
                                        <tr class="order-shipping">
                                            <td colspan="2">
                                                <div class="shipping-amount">
                                                    <span class="title">Shipping Method</span>
                                                </div>
                                                <div class="input-group">
                                                    <input type="radio" id="radio2" name="shipping" select>
                                                    <label for="radio2">Fast Shipping</label>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr class="order-total">
                                            <td>Total</td>
                                            <td class="order-total-amount">$<?php echo number_format($iz) ?>.00</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="order-payment-method">
                                <div class="single-payment">
                                    <div class="input-group">
                                        <input type="radio" id="radio4" name="payment">
                                        <label for="radio4">Direct bank transfer</label>
                                    </div>
                                    <p>Make your payment directly into our bank account. Please use your Order ID as
                                        the payment reference. Your order will not be shipped until the funds have
                                        cleared in our account.</p>
                                </div>
                                <div class="single-payment">
                                    <div class="input-group">
                                        <input type="radio" id="radio5" name="payment">
                                        <label for="radio5">Cash on delivery</label>
                                    </div>
                                    <p>Pay with cash upon delivery.</p>
                                </div>
                            </div>

                            <input type="number" name="user" style="display: none;" value="<?php echo $_SESSION['user_id'] ?>">
                            <input type="number" name="total" style="display: none;" value="<?php echo $iz ?>">
                            <a style="cursor: pointer;" href="./client/home.php" id="checkoutButton" class="axil-btn btn-bg-primary checkout-btn">Process to
                                Checkout</a>

                            <div id="result"></div>

                            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                            <script>
                                $(document).ready(function() {
                                    // Lấy tham chiếu đến button
                                    var checkoutButton = $('#checkoutButton');

                                    // Đăng ký sự kiện click cho button
                                    checkoutButton.click(function() {
                                        // Lấy giá trị của hai trường input
                                        var userValue = $('input[name="user"]').val();
                                        var totalValue = $('input[name="total"]').val();

                                        // Hiển thị giá trị trong một div có id là "result"
                                        var resultDiv = $('#result');

                                        // Gửi dữ liệu tới server bằng AJAX
                                        $.ajax({
                                            url: './client/checkout.php',
                                            method: 'POST',
                                            data: {
                                                user: userValue,
                                                total: totalValue
                                            },

                                        });
                                    });
                                });
                            </script>
                        </div>
                    </div>

                </div>
            </form>
        </div>
    </div>
    <!-- End Checkout Area  -->

</main>




<?php

include_once __DIR__ . '/../inc/_footer.client.inc.php';
?>
<title>Checkout - PS27199</title>
<?php
include "../inc/head.php";

?>

<?php
$productName = $_GET['productname'];
$price = $_GET['price'];
?>

<body class="sticky-header">

    <?php include "../inc/header.php"; ?>

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
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Street Address <span>*</span></label>
                                    <input type="text" id="address1" class="mb--15"
                                        placeholder="House number and street name">
                                    <input type="text" id="address2"
                                        placeholder="Apartment, suite, unit, etc. (optonal)">
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
                                    <textarea id="notes" rows="2"
                                        placeholder="Notes about your order, e.g. speacial notes for delivery."></textarea>
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
                                            <tr class="order-product">
                                                <td class="name-product">
                                                    <?php echo $productName; ?> - <span class="quantity"
                                                        style="color:red">1</span>
                                                </td>
                                                <td class="price-product">
                                                    <?php echo $price; ?> $
                                                </td>
                                                <!-- <td class="name-product">Commodo Blown Lamp <span class="quantity">x1</span></td>
                                                <td class="price-product">$117.00</td> -->
                                            </tr>
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
                                            <!-- <tr class="order-total">
                                                <td>Total</td>
                                                <td class="order-total-amount">$323.00</td>
                                            </tr> -->
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
                                <button class="axil-btn btn-bg-primary checkout-btn">Process to
                                    Checkout</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- End Checkout Area  -->

    </main>


    <?php
    include "../inc/footer.php";
    include "../inc/script.php";
    ?>
</body>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var checkoutButton = document.querySelector('.checkout-btn');

        // Xử lý sự kiện khi nhấn nút "Process to Checkout"
        checkoutButton.addEventListener('click', function (event) {
            event.preventDefault();

            // Lấy thông tin từ các trường nhập liệu
            var firstName = document.getElementById('first-name').value;
            var lastName = document.getElementById('last-name').value;
            var email = document.getElementById('email').value;
            var quantity = parseInt(document.querySelector('.quantity').textContent);

            // Kiểm tra xem tất cả các trường nhập liệu có được điền đầy đủ hay không
            if (firstName && lastName && email) {
                // Hiển thị thông báo đặt hàng thành công
                alert('Đặt hàng thành công! Số lượng: ' + quantity);
            } else {
                // Hiển thị thông báo lỗi nếu các trường nhập liệu chưa được điền đầy đủ
                alert('Vui lòng điền đầy đủ thông tin.');
            }
        });
    });
</script>

</html>
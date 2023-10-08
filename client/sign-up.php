<title>Signup - PS27199</title>

<?php
session_start();
include_once __DIR__ .  '/../classes/adminlogin.php';
include_once __DIR__ .  '/../classes/brand.php';
include_once __DIR__ .  '/../classes/cart.php';
include_once __DIR__ .  '/../classes/category.php';
include_once __DIR__ .  '/../classes/note.php';
include_once __DIR__ .  '/../classes/product.php';
include_once __DIR__ .  '/../classes/user.php';
$adminlogin = new adminlogin();
$brand = new brand();
$cart = new cart();
$category = new category();
$note = new note();
$product = new product();
$user = new user();
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['signup'])) {
    $insertUsers = $user->insert_users($_POST);
}
?>
<link rel="shortcut icon" href="./public/assets_client/images/favicon.jpg" type="image/x-icon">

<!-- CSS
============================================ -->

<!-- Bootstrap CSS -->
<!-- <base href="http://nht-ps27199.free.nf/"> -->
<base href="http://localhost/webmvc/">
<link rel="stylesheet" href="./public/assets_client/css/vendor/flaticon/flaticon.css" />
<link rel="stylesheet" href="./public/assets_client/css/vendor/bootstrap.min.css" />
<link rel="stylesheet" href="./public/assets_client/css/vendor/font-awesome.css" />
<link rel="stylesheet" href="./public/assets_client/css/vendor/slick.css" />
<link rel="stylesheet" href="./public/assets_client/css/vendor/slick-theme.css" />
<link rel="stylesheet" href="./public/assets_client/css/vendor/jquery-ui.min.css" />
<link rel="stylesheet" href="./public/assets_client/css/vendor/sal.css" />
<link rel="stylesheet" href="./public/assets_client/css/vendor/magnific-popup.css" />
<link rel="stylesheet" href="./public/assets_client/css/vendor/base.css" />
<link rel="stylesheet" href="./public/assets_client/css/style.min.css" />

<body>
    <div class="axil-signin-area">

        <!-- Start Header -->
        <div class="signin-header">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <a href="./client/home.php" class="site-logo"><img src="./public/assets_client/images/logo/logo.png" alt="logo"></a>
                </div>
                <div class="col-md-6">
                    <div class="singin-header-btn">
                        <p>Already a member?</p>
                        <a href="page/sign-in.php" class="axil-btn btn-bg-secondary sign-up-btn">Sign In</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Header -->

        <div class="row">
            <div class="col-lg-6 offset-xl-2">
                <div class="axil-signin-form-wrap">
                    <div class="axil-signin-form">
                        <h3 class="title">I'm New Here</h3>
                        <p class="b2 mb--55">Enter your detail below</p>

                        <form class="singin-form" action="" method="POST">
                            <div class="form-group">
                                <label>User Name</label>
                                <input type="text" class="form-control" name="userName">
                            </div>
                            <div class="form-group">
                                <label>Full Name</label>
                                <input type="text" class="form-control" name="userFullName">
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" class="form-control" name="userEmail">
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" class="form-control" name="userPass">
                            </div>
                            <?php
                            if (isset($insertUsers)) {
                                echo $insertUsers;
                            }
                            ?>
                            <div class="form-group">
                                <button type="submit" class="axil-btn btn-bg-primary submit-btn" name="signup">Create
                                    Account</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="./public/assets_client/js/vendor/modernizr.min.js"></script>
    <!-- jQuery JS -->
    <script src="./public/assets_client/js/vendor/jquery.js"></script>
    <!-- Bootstrap JS -->
    <script src="./public/assets_client/js/vendor/popper.min.js"></script>
    <script src="./public/assets_client/js/vendor/bootstrap.min.js"></script>
    <script src="./public/assets_client/js/vendor/slick.min.js"></script>
    <script src="./public/assets_client/js/vendor/js.cookie.js"></script>
    <!-- <script src="./public/assets_client/js/vendor/jquery.style.switcher.js"></script> -->
    <script src="./public/assets_client/js/vendor/jquery-ui.min.js"></script>
    <script src="./public/assets_client/js/vendor/jquery.ui.touch-punch.min.js"></script>
    <script src="./public/assets_client/js/vendor/jquery.countdown.min.js"></script>
    <script src="./public/assets_client/js/vendor/sal.js"></script>
    <script src="./public/assets_client/js/vendor/jquery.magnific-popup.min.js"></script>
    <script src="./public/assets_client/js/vendor/imagesloaded.pkgd.min.js"></script>
    <script src="./public/assets_client/js/vendor/isotope.pkgd.min.js"></script>
    <script src="./public/assets_client/js/vendor/counterup.js"></script>
    <script src="./public/assets_client/js/vendor/waypoints.min.js"></script>

    <!-- Main JS -->
    <script src="./public/assets_client/js/main.js"></script>

</body>

</html>
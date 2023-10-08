<title>Signin - PS27199</title>
<?php
include "../inc/head.php";
?>
<?php
include "../classes/user.php";
?>

<?php
$cs = new user();
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['signin'])) {
    $loginUsers = $cs->login_users($_POST);
}

?>

<body>
    <div class="axil-signin-area">

        <?php include "../inc/header-signin.php"; ?>

        <div class="row">
            <div class="col-lg-6 offset-xl-2">
                <div class="axil-signin-form-wrap">
                    <div class="axil-signin-form">
                        <h3 class="title">Sign in</h3>
                        <p class="b2 mb--55">Enter your detail below</p>

                        <form class="singin-form" action="" method="POST">
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" class="form-control" name="userEmail">
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" class="form-control" name="userPass">
                            </div>
                            <?php
                            if (isset($loginUsers)) {
                                echo $loginUsers;
                            }
                            ?>
                            <div class="form-group d-flex align-items-center justify-content-between">
                                <button type="submit" class="axil-btn btn-bg-primary submit-btn" name="signin">Sign
                                    In</button>
                                <a href="forgot-password.php" class="forgot-btn">Forget password?</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include '../inc/script.php'; ?>

</body>

</html>
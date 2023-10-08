<title>Signup - PS27199</title>
<?php include "../inc/head.php"; ?>
<?php include "../classes/user.php"; ?>

<?php
$cs = new user();
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['signup'])) {
    $insertUsers = $cs->insert_users($_POST);
}
?>

<body>
    <div class="axil-signin-area">

        <?php include "../inc/header-signup.php"; ?>

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

    <?php include '../inc/script.php'; ?>

</body>

</html>
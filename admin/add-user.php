<?php include "inc/head.php"; ?>

<?php
include "../classes/user.php";
?>

<?php
$u = new user();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $userName = $_POST['userName'];
    $userFullName = $_POST['userFullName'];
    $userEmail = $_POST['userEmail'];
    $userPass = $_POST['userPass'];
    $insertUser = $u->insert_user($userName, $userFullName, $userEmail, $userPass);
}
?>

<body>
    <div class="main-wrapper">
        <?php include "inc/menu.php" ?>

        <div class="page-wrapper">

            <div class="page-content">
                <div class="row">
                    <div class="col-md-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <h6 class="card-title">Add User</h6>
                                <form action="add-user.php" method="POST">
                                    <div class="mb-3">
                                        <label for="exampleFormControlTextarea1" class="form-label">Username</label>
                                        <input name="userName" type="text" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleFormControlTextarea1" class="form-label">Fullname</label>
                                        <input class="form-control" id="exampleFormControlTextarea1" rows="5"
                                            name="userFullName">
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleFormControlTextarea1" class="form-label">Email</label>
                                        <input class="form-control" id="exampleFormControlTextarea1" rows="5"
                                            name="userEmail">
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleFormControlTextarea1" class="form-label">Password</label>
                                        <input class="form-control" id="exampleFormControlTextarea1" rows="5"
                                            name="userPass">
                                    </div>


                                    <button class="btn btn-inverse-primary" type="submit" name="btnDubmit">Add User</button>
                                </form>
                                <?php
                                if (isset($insertUser)) {
                                    echo $insertUser;
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<?php include "inc/script.php" ?>

</html>
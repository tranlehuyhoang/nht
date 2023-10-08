<?php include "inc/head.php"; ?>

<?php
include "../classes/brand.php";
?>

<?php
$brand = new brand();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $brandName = $_POST['brandName'];
    $insertBrand = $brand->insert_brand($brandName);
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
                                <h6 class="card-title">Add Brand</h6>
                                <form action="add-brand.php" method="POST">
                                    <div class="mb-3">
                                        <input name="brandName" type="text" class="form-control"
                                            placeholder="Enter Name">
                                    </div>
                                    <button class="btn btn-inverse-primary" type="submit">Add</button>
                                </form>
                                <?php
                                if (isset($insertBrand)) {
                                    echo $insertBrand;
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
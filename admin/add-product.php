<?php include "inc/head.php"; ?>

<?php
include_once "../classes/product.php";
include_once "../classes/category.php";
include_once "../classes/brand.php";
?>

<?php
$pd = new product();
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['btnSubmit'])) {
    $insertProduct = $pd->insert_product($_POST);
}
?>

<body>
    <div class="main-wrapper">
        <?php include "inc/menu.php"; ?>

        <div class="page-wrapper">

            <div class="page-content">
                <div class="row">
                    <div class="col-md-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <h6 class="card-title">Add Product</h6>
                                <form action="add-product.php" method="POST" enctype="multipart/form-data">
                                    <div class="mb-3">
                                        <label for="exampleInputText1" class="form-label">Name Product</label>
                                        <input type="text" class="form-control" id="exampleInputText1"
                                            placeholder="Enter Name" name="productName">
                                    </div>

                                    <div class="mb-3">
                                        <label for="exampleInputText1" class="form-label">Price Product</label>
                                        <input type="text" class="form-control" id="exampleInputText1"
                                            placeholder="Enter Price" name="price">
                                    </div>

                                    <div class="mb-3">
                                        <label for="exampleFormControlSelect1" class="form-label">Select
                                            Categories</label>
                                        <select class="form-select" id="exampleFormControlSelect1" name="catid">
                                            <?php
                                            $cat = new category();
                                            $catlist = $cat->show_category();
                                            if ($catlist) {
                                                while ($result = $catlist->fetch_assoc()) {

                                                    ?>
                                                    <option value="<?php echo $result['catId'] ?>"><?php echo $result['catName'] ?></option>
                                                <?php }
                                            } ?>
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label for="exampleFormControlSelect1" class="form-label">Select
                                            Brand</label>
                                        <select class="form-select" id="exampleFormControlSelect1" name="brandid">
                                            <?php
                                            $brand = new brand();
                                            $brandlist = $brand->show_brand();
                                            if ($catlist) {
                                                while ($result = $brandlist->fetch_assoc()) {

                                                    ?>
                                                    <option value="<?php echo $result['brandId'] ?>"><?php echo $result['brandName'] ?></option>
                                                <?php }
                                            } ?>
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label for="exampleFormControlTextarea1" class="form-label">Content
                                            Product</label>
                                        <textarea name="product_desc" rows="" cols="80" required></textarea>
                                        <script>
                                            CKEDITOR.replace('product_desc');
                                        </script>

                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label" for="formFile">Picture Product</label>
                                        <input class="form-control" type="file" id="formFile" name="image">
                                    </div>

                                    <div class="mb-3">
                                        <label for="exampleFormControlSelect1" class="form-label">Select
                                            Product Type</label>
                                        <select class="form-select" id="exampleFormControlSelect1" name="type">
                                            <!-- <option selected disabled>Product Type</option> -->
                                            <option selected value="New">New</option>
                                            <option value="Old">Old</option>
                                            <option value="Like New">Like New</option>
                                            <option value="Pre Older">Pre Older</option>
                                        </select>
                                    </div>

                                    <button class="col-md-12 btn btn-inverse-primary btn-block" type="submit"
                                        name="btnSubmit" value="1">Submit
                                        form</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include 'inc/script.php'; ?>

</body>

</html>
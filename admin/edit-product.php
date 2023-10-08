<?php

include_once __DIR__ . '/../inc/_header.admin.inc.php';
?>
<?php
 
if (!isset($_GET['productid']) || $_GET['productid'] == NULL) {
    echo "<script>window.location = 'list-product.php'</script>";
} else {
    $id = $_GET['productid'];
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $productName = $_POST['productName'];
    $updateProduct = $product->update_product($_POST, $id);
    $get_product_name = $product->getproductbyId($id);
}
?>


<div class="page-content">
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Edit Product</h6>
                    <?php
                                $get_product_name = $product->getproductbyId($id);
                                if ($get_product_name) {
                                    while ($resultss = $get_product_name->fetch_assoc()) {
                                        ?>
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="exampleInputText1" class="form-label">Name Product</label>
                            <input type="text" class="form-control" id="exampleInputText1" placeholder="Enter Name"
                                name="productName" value="<?php echo $resultss['productName'] ?>">
                        </div>

                        <div class="mb-3">
                            <label for="exampleInputText1" class="form-label">Price Product</label>
                            <input type="text" class="form-control" id="exampleInputText1" placeholder="Enter Price"
                                name="price" value="<?php echo $resultss['price'] ?>">
                        </div>

                        <div class="mb-3">
                            <label for="exampleFormControlSelect1" class="form-label">Select
                                Categories</label>
                            <select class="form-select" id="exampleFormControlSelect1" name="catid">
                                <?php
                                                    $cat = new category();
                                                    $catlist = $cat->show_category();
                                                    if (isset($catlist)) {
                                                        if ($catlist && $catlist->num_rows > 0) {
                                                            $i = 0;
                                                            while ($results = $catlist->fetch_assoc()) {
                                                                # code...
                                                    ?>
                                <option <?php
                                                                        if ($resultss['catId'] == $results['catId']) {
                                                                            echo 'selected';
                                                                        }
            
                                                                        ?> value="<?php echo $results['catId'] ?>">
                                    <?php echo $results['catName'] ?></option>
                                <?php
                                                                $i++;
                                                            }
                                                        } else {
                                                            ?>
                                <?php
                                                        }
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
                                <option <?php if($result['brandId'] == $resultss['brandId']){
                                                                echo 'selected';
                                                            } ?> value="<?php echo $result['brandId'] ?>">
                                    <?php echo $result['brandName'] ?></option>
                                <?php }
                                                    } ?>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Content
                                Product</label>
                            <textarea name="product_desc" rows="" cols="80" required>
                                                                        <?php echo $resultss['product_desc']; ?>
                                                                        </textarea>
                            <script>
                            CKEDITOR.replace('product_desc');
                            </script>

                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="formFile">Picture Product</label>

                            <input class="form-control" type="file" id="formFile" name="image" value="image">
                            <img src="<?php echo 'data:image/png;base64,' . base64_encode($resultss['image']); ?> "
                                width="100" />
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

                        <button class="col-md-12 btn btn-inverse-primary btn-block" type="submit" name="btnSubmit"
                            value="1">Edit</button>
                    </form>
                    <?php }
                                } ?>
                    <?php
                                if (isset($insertCat)) {
                                    echo "<script>window.location='list-categories.php'</script>";
                                    echo $insertCat;
                                }
                                ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php

include_once __DIR__ . '/../inc/_footer.admin.inc.php';
?>
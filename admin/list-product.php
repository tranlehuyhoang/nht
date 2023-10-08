<?php

include_once __DIR__ . '/../inc/_header.admin.inc.php';
?>

<div class="page-content">
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Data Product</h6>
                    <div class="table-responsive">
                        <table id="dataTableExample" class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Price</th>
                                    <th>Image</th>
                                    <th>Category</th>
                                    <th>Brand</th>
                                    <th>Description</th>
                                    <th>Type</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $pdlist = $product->show_product();
                                if ($pdlist) {
                                    $i = 0;
                                    while ($result = $pdlist->fetch_assoc()) {
                                        $i++;

                                ?>
                                        <tr>
                                            <td>
                                                <?php echo $i ?>
                                            </td>
                                            <td>
                                                <?php echo $result['productName'] ?>
                                            </td>
                                            <td>
                                                <?php echo $result['price'] ?> $
                                            </td>
                                            <td><img src="<?php echo 'data:image/png;base64,' . base64_encode($result['image']); ?>">
                                            </td>
                                            <td>
                                                <?php echo $result['catId'] ?> (
                                                <?php echo $result['catName'] ?> )
                                            </td>
                                            <td>
                                                <?php echo $result['brandId'] ?> (
                                                <?php echo $result['brandName'] ?> )
                                            </td>
                                            <td>
                                                <?php echo substr($result['product_desc'], 0, 30) ?>...
                                            </td>
                                            <td>
                                                <?php echo ($result['type']) ?>
                                            </td>
                                            <td>
                                                <a type="button" class="btn btn-inverse-info" href="edit-product.php?productid=<?php echo $result['productId'] ?>">Edit</a>
                                                <a type="button" class="btn btn-inverse-danger" href="?delid=<?php echo $result['productId'] ?>" onclick="return confirm('Delete?')">Delete</a>
                                            </td>
                                        </tr>
                                <?php }
                                } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<?php

include_once __DIR__ . '/../inc/_footer.admin.inc.php';
?>
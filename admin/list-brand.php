<?php

include_once __DIR__ . '/../inc/_header.admin.inc.php';
?>


<div class="page-content">
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Data Table</h6>
                    <div class="table-responsive">
                        <table id="dataTableExample" class="table">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Name</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                            $show_brands = $brand->show_brand();
                                            if ($show_brands) {
                                                $i = 0;
                                                while ($result = $show_brands->fetch_assoc()) {
                                                    $i++;
                                                    ?>
                                <tr>
                                    <td>
                                        <?php echo $i; ?>
                                    </td>
                                    <td>
                                        <?php echo $result['brandName'] ?>
                                    </td>
                                    <td>
                                        <a type="button" class="btn btn-inverse-info"
                                            href="edit-brand.php?brandid=<?php echo $result['brandId'] ?>">Edit</a>
                                        <a type="button" class="btn btn-inverse-danger"
                                            href="?delid=<?php echo $result['brandId'] ?>"
                                            onclick="return confirm('Delete?')">Delete</a>
                                    </td>
                                </tr>
                                <?php }
                                            } ?>
                            </tbody>
                        </table>
                        <?php
                                    if (isset($dellbrand)) {
                                        echo $dellbrand;
                                    }
                                    ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php

include_once __DIR__ . '/../inc/_footer.admin.inc.php';
?>
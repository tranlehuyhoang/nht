<?php

include_once __DIR__ . '/../inc/_header.admin.inc.php';
?>

<?php

if (!isset($_GET['catid']) || $_GET['catid'] == NULL) {
    echo "<script>window.location = 'list-categories.php'</script>";
} else {
    $id = $_GET['catid'];
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $catName = $_POST['catName'];

    $updateCat = $category->update_category($catName, $id);
}
?>


<div class="page-content">
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Edit Categories</h6>
                    <?php
                    $get_cate_name = $category->getcatbyId($id);
                    if ($get_cate_name) {
                        while ($result = $get_cate_name->fetch_assoc()) {
                    ?>
                            <form action="" method="POST">
                                <div class="mb-3">
                                    <label for="exampleInputText1" class="form-label">Name</label>
                                    <input name="catName" type="text" class="form-control" id="exampleInputText1" placeholder="Enter Name" value="<?php echo $result['catName'] ?>">
                                </div>
                                <button class="btn btn-primary" type="submit">Edit</button>
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
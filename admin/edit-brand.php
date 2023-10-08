 <?php

include_once __DIR__ . '/../inc/_header.admin.inc.php';
?>

 <?php
 
if (!isset($_GET['brandid']) || $_GET['brandid'] == NULL) {
    echo "<script>window.location = 'list-brand.php'</script>";
} else {
    $id = $_GET['brandid'];
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $brandName = $_POST['brandName'];

    $updateBrand = $brand->update_brand($brandName, $id);
}
?>



 <div class="page-content">
     <div class="row">
         <div class="col-md-12 grid-margin stretch-card">
             <div class="card">
                 <div class="card-body">
                     <h6 class="card-title">Edit Brand</h6>
                     <?php
                                $get_brands_name = $brand->getbrandbyId($id);
                                if ($get_brands_name) {
                                    while ($result = $get_brands_name->fetch_assoc()) {
                                        ?>
                     <form action="" method="POST">
                         <div class="mb-3">
                             <label for="exampleInputText1" class="form-label">Name</label>
                             <input name="brandName" type="text" class="form-control" id="exampleInputText1"
                                 placeholder="Enter Name" value="<?php echo $result['brandName'] ?>">
                         </div>
                         <button class="btn btn-primary" type="submit">Edit</button>
                     </form>
                     <?php }
                                } ?>
                     <?php
                                if (isset($insertBrand)) {
                                    echo "<script>window.location='list-brand.php'</script>";
                                    echo $insertBrand;
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
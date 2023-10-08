 <?php

    include_once __DIR__ . '/../inc/_header.admin.inc.php';
    ?> <?php

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $catName = $_POST['catName'];
            $insertCat = $category->insert_category($catName);
        }
        ?>
 <div class="page-content">
     <div class="row">
         <div class="col-md-12 grid-margin stretch-card">
             <div class="card">
                 <div class="card-body">
                     <h6 class="card-title">Add Categories</h6>
                     <form action="" method="POST">
                         <div class="mb-3">
                             <input name="catName" type="text" class="form-control" placeholder="Enter Name">
                         </div>
                         <button class="btn btn-inverse-primary" type="submit">Add</button>
                     </form>
                     <?php
                        if (isset($insertCat)) {
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
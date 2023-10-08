 <?php session_start();
    include_once __DIR__ .  '/../classes/adminlogin.php';
    include_once __DIR__ .  '/../classes/brand.php';
    include_once __DIR__ .  '/../classes/cart.php';
    include_once __DIR__ .  '/../classes/category.php';
    include_once __DIR__ .  '/../classes/note.php';
    include_once __DIR__ .  '/../classes/product.php';
    include_once __DIR__ .  '/../classes/user.php';
    $adminlogin = new adminlogin();
    $brand = new brand();
    $cart = new cart();
    $category = new category();
    $note = new note();
    $product = new product();
    $user = new user();
    if (isset($_SESSION['adminId'])) {
        echo "<script>window.location.href = './index.php';</script>";
    }
    ?>


 <?php

    $class = new adminlogin();
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $adminUser = $_POST['adminUser'];
        $adminPass = $_POST['adminPass'];

        $login_check = $adminlogin->login_admin($adminUser, $adminPass);
    }
    ?>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <meta http-equiv="X-UA-Compatible" content="ie=edge">
 <script src="https://cdn.ckeditor.com/4.19.1/standard/ckeditor.js"></script>

 <!-- Fonts -->
 <link rel="preconnect" href="https://fonts.googleapis.com">
 <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
 <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
 <!-- End fonts -->

 <!-- core:css -->
 <link rel="stylesheet" href="../public/assets_admin/vendors/core/core.css">
 <!-- endinject -->

 <!-- Plugin css for this page -->
 <link rel="stylesheet" href="../public/assets_admin/vendors/flatpickr/flatpickr.min.css">
 <!-- End plugin css for this page -->

 <!-- inject:css -->
 <link rel="stylesheet" href="../public/assets_admin/fonts/feather-font/css/iconfont.css">
 <link rel="stylesheet" href="../public/assets_admin/vendors/flag-icon-css/css/flag-icon.min.css">
 <!-- endinject -->

 <!-- Layout styles -->
 <link rel="stylesheet" href="../public/assets_admin/css/demo2/style.min.css">
 <!-- End layout styles -->

 <link rel="shortcut icon" href="../public/assets_admin/images/favicon.png" />

 <body>
     <div class="main-wrapper">
         <div class="page-wrapper full-page">
             <div class="page-content d-flex align-items-center justify-content-center">
                 <div class="row w-100 mx-0 auth-page">
                     <div class="col-md-8 col-xl-6 mx-auto">
                         <div class="card">
                             <div class="row">
                                 <div class="col-md-4 pe-md-0">
                                     <div class="auth-side-wrapper">

                                     </div>
                                 </div>
                                 <div class="col-md-8 ps-md-0">
                                     <div class="auth-form-wrapper px-4 py-5">
                                         <p class="noble-ui-logo logo-light d-block mb-2">Login<span> Admin Panel</span>
                                         </p>
                                         <form class="forms-sample" action="login.php" method="POST">
                                             <?php
                                                if (isset($login_check)) {
                                                    echo $login_check;
                                                }
                                                ?>

                                             <div class="mb-3">
                                                 <label for="userName" class="form-label">Username</label>
                                                 <input type="text" class="form-control" id="userName" placeholder="Username" name="adminUser">
                                             </div>
                                             <div class="mb-3">
                                                 <label for="userPassword" class="form-label">Password</label>
                                                 <input type="password" class="form-control" id="userPassword" autocomplete="current-password" placeholder="Password" name="adminPass">
                                             </div>
                                             <div>
                                                 <button class="btn btn-primary me-2 mb-2 mb-md-0 text-white">Login</button>
                                             </div>
                                         </form>
                                     </div>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>

             </div>
         </div>
     </div>

     <script src="../public/assets_admin/vendors/core/core.js"></script>
     <!-- endinject -->

     <!-- Plugin js for this page -->
     <script src="../public/assets_admin/vendors/flatpickr/flatpickr.min.js"></script>
     <script src="../public/assets_admin/vendors/apexcharts/apexcharts.min.js"></script>
     <!-- End plugin js for this page -->

     <!-- inject:js -->
     <script src="../public/assets_admin/vendors/feather-icons/feather.min.js"></script>
     <script src="../public/assets_admin/js/template.js"></script>
     <!-- endinject -->

     <!-- Custom js for this page -->
     <script src="../public/assets_admin/js/dashboard-dark.js"></script>

 </body>
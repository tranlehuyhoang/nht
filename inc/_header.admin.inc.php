<?php
session_start();
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
if (!isset($_SESSION['adminId'])) {
    echo "<script>window.location.href = './login.php';</script>";
}

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['action']) && $_GET['action'] == 'logout') {
    $adminlogin->admin_destroy();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
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
</head>

<body>
    <div class="main-wrapper">

        <nav class="navbar">
            <a href="#" class="sidebar-toggler">
                <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="48" height="48" viewBox="0,0,256,256"
                    style="fill:#ffffff;">
                    <g fill-opacity="0.16863" fill="#ffffff" fill-rule="nonzero" stroke="none" stroke-width="1"
                        stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray=""
                        stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none"
                        style="mix-blend-mode: normal">
                        <g transform="scale(10.66667,10.66667)">
                            <path
                                d="M20,14h-16c-1.105,0 -2,-0.895 -2,-2v0c0,-1.105 0.895,-2 2,-2h16c1.105,0 2,0.895 2,2v0c0,1.105 -0.895,2 -2,2z"
                                opacity="0.35"></path>
                            <path
                                d="M20,7h-16c-1.105,0 -2,-0.895 -2,-2v0c0,-1.105 0.895,-2 2,-2h16c1.105,0 2,0.895 2,2v0c0,1.105 -0.895,2 -2,2z">
                            </path>
                            <path
                                d="M20,21h-16c-1.105,0 -2,-0.895 -2,-2v0c0,-1.105 0.895,-2 2,-2h16c1.105,0 2,0.895 2,2v0c0,1.105 -0.895,2 -2,2z">
                            </path>
                        </g>
                    </g>
                </svg>
            </a>
            <div class="navbar-content">
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="profileDropdown" role="button"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="wd-30 ht-30 rounded-circle" src="../public/assets_admin/images/faces/face1.jpg"
                                alt="profile">

                        </a>
                        <div class="dropdown-menu p-0" aria-labelledby="profileDropdown">
                            <div class="d-flex flex-column align-items-center border-bottom px-5 py-3">
                                <div class="text-center">
                                    <p class="tx-16 fw-bolder">Admin:<?php echo $_SESSION['adminName'] ?>
                                    </p>
                                    <p class="tx-12 text-muted">Mail:
                                        <?php echo $_SESSION['adminEmail'] ?>

                                    </p>
                                </div>
                            </div>
                            <ul class="list-unstyled p-1">
                                <li class="dropdown-item py-2">
                                    <a href="#" class="text-body ms-0">
                                        <i class="me-2 icon-md" data-feather="user"></i>
                                        <span>Profile</span>
                                    </a>
                                </li>

                                <?php
                                if (isset($_GET['action']) && $_GET['action'] == 'logout') {
                                }
                                ?>

                                <li class="dropdown-item py-2">
                                    <a href="?action=logout" class="text-body ms-0">
                                        <i class="me-2 icon-md" data-feather="log-out"></i>
                                        <span>Log Out</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
        <!-- partial -->



        <nav class="sidebar">
            <div class="sidebar-header">
                <a href="index.php" class="sidebar-brand">
                    Admin<span> Panel</span>
                </a>
                <div class="sidebar-toggler not-active">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </div>
            <div class="sidebar-body">
                <ul class="nav">
                    <li class="nav-item">
                        <a href="index.php" class="nav-link">
                            <img
                                src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAwAAAAMCAYAAABWdVznAAAACXBIWXMAAAsTAAALEwEAmpwYAAAAgUlEQVR4nK3RPQ6DMAwFYDMVwS26IlaQuEnn9kxdI2Xze2HJkLt1CgoDoAoEkbDkzZ/lH5G7wlpbO+eelwHJhqovAJ2IFKcAQJsAU5L9gowxJVRHAj8CcZPfBeiMhhhjkTp9/gr3gc6oSeCdBUIIDwK8MNK6R9bSt53Ve19lPe4oJisTorJqiO3FAAAAAElFTkSuQmCC">
                            <span class="link-title">Dashboard</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="collapse" href="#forms2" role="button" aria-expanded="false"
                            aria-controls="forms">
                            <img
                                src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAwAAAAMCAYAAABWdVznAAAACXBIWXMAAAsTAAALEwEAmpwYAAAAgUlEQVR4nK3RPQ6DMAwFYDMVwS26IlaQuEnn9kxdI2Xze2HJkLt1CgoDoAoEkbDkzZ/lH5G7wlpbO+eelwHJhqovAJ2IFKcAQJsAU5L9gowxJVRHAj8CcZPfBeiMhhhjkTp9/gr3gc6oSeCdBUIIDwK8MNK6R9bSt53Ve19lPe4oJisTorJqiO3FAAAAAElFTkSuQmCC">
                            <span class="link-title">Categories</span>
                            <i class="link-arrow" data-feather="chevron-down"></i>
                        </a>
                        <div class="collapse" id="forms2">
                            <ul class="nav sub-menu">
                                <li class="nav-item">
                                    <a href="add-categories.php" class="nav-link">Add Categories</a>
                                </li>
                                <li class="nav-item">
                                    <a href="list-categories.php" class="nav-link">List Categories</a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="collapse" href="#forms3" role="button" aria-expanded="false"
                            aria-controls="forms">
                            <img
                                src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAwAAAAMCAYAAABWdVznAAAACXBIWXMAAAsTAAALEwEAmpwYAAAAgUlEQVR4nK3RPQ6DMAwFYDMVwS26IlaQuEnn9kxdI2Xze2HJkLt1CgoDoAoEkbDkzZ/lH5G7wlpbO+eelwHJhqovAJ2IFKcAQJsAU5L9gowxJVRHAj8CcZPfBeiMhhhjkTp9/gr3gc6oSeCdBUIIDwK8MNK6R9bSt53Ve19lPe4oJisTorJqiO3FAAAAAElFTkSuQmCC">
                            <span class="link-title">Brand</span>
                            <i class="link-arrow" data-feather="chevron-down"></i>
                        </a>
                        <div class="collapse" id="forms3">
                            <ul class="nav sub-menu">
                                <li class="nav-item">
                                    <a href="add-brand.php" class="nav-link">Add Brand</a>
                                </li>
                                <li class="nav-item">
                                    <a href="list-brand.php" class="nav-link">List Brand</a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="collapse" href="#forms666" role="button"
                            aria-expanded="false" aria-controls="forms">
                            <img
                                src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAwAAAAMCAYAAABWdVznAAAACXBIWXMAAAsTAAALEwEAmpwYAAAAgUlEQVR4nK3RPQ6DMAwFYDMVwS26IlaQuEnn9kxdI2Xze2HJkLt1CgoDoAoEkbDkzZ/lH5G7wlpbO+eelwHJhqovAJ2IFKcAQJsAU5L9gowxJVRHAj8CcZPfBeiMhhhjkTp9/gr3gc6oSeCdBUIIDwK8MNK6R9bSt53Ve19lPe4oJisTorJqiO3FAAAAAElFTkSuQmCC">
                            <span class="link-title">Product</span>
                            <i class="link-arrow" data-feather="chevron-down"></i>
                        </a>
                        <div class="collapse" id="forms666">
                            <ul class="nav sub-menu">
                                <li class="nav-item">
                                    <a href="add-product.php" class="nav-link">Add Product</a>
                                </li>
                                <li class="nav-item">
                                    <a href="list-product.php" class="nav-link">List Product</a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="collapse" href="#forms9" role="button" aria-expanded="false"
                            aria-controls="forms">
                            <img
                                src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAwAAAAMCAYAAABWdVznAAAACXBIWXMAAAsTAAALEwEAmpwYAAAAgUlEQVR4nK3RPQ6DMAwFYDMVwS26IlaQuEnn9kxdI2Xze2HJkLt1CgoDoAoEkbDkzZ/lH5G7wlpbO+eelwHJhqovAJ2IFKcAQJsAU5L9gowxJVRHAj8CcZPfBeiMhhhjkTp9/gr3gc6oSeCdBUIIDwK8MNK6R9bSt53Ve19lPe4oJisTorJqiO3FAAAAAElFTkSuQmCC">
                            <span class="link-title">Post</span>
                            <i class="link-arrow" data-feather="chevron-down"></i>
                        </a>
                        <div class="collapse" id="forms9">
                            <ul class="nav sub-menu">
                                <li class="nav-item">
                                    <a href="add-post.php" class="nav-link">Add Post</a>
                                </li>
                                <li class="nav-item">
                                    <a href="list-post.php" class="nav-link">List Post</a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="collapse" href="#forms4" role="button" aria-expanded="false"
                            aria-controls="forms">
                            <img
                                src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAwAAAAMCAYAAABWdVznAAAACXBIWXMAAAsTAAALEwEAmpwYAAAAgUlEQVR4nK3RPQ6DMAwFYDMVwS26IlaQuEnn9kxdI2Xze2HJkLt1CgoDoAoEkbDkzZ/lH5G7wlpbO+eelwHJhqovAJ2IFKcAQJsAU5L9gowxJVRHAj8CcZPfBeiMhhhjkTp9/gr3gc6oSeCdBUIIDwK8MNK6R9bSt53Ve19lPe4oJisTorJqiO3FAAAAAElFTkSuQmCC">
                            <span class="link-title">User</span>
                            <i class="link-arrow" data-feather="chevron-down"></i>
                        </a>
                        <div class="collapse" id="forms4">
                            <ul class="nav sub-menu">
                                <li class="nav-item">
                                    <a href="add-user.php" class="nav-link">Add User</a>
                                </li>
                                <li class="nav-item">
                                    <a href="list-user.php" class="nav-link">List User</a>
                                </li>
                                <!-- <li class="nav-item">
                            <a href="list-admin.php" class="nav-link">List Admin</a>
                        </li> -->
                            </ul>
                        </div>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="collapse" href="#forms90" role="button"
                            aria-expanded="false" aria-controls="forms">
                            <img
                                src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAwAAAAMCAYAAABWdVznAAAACXBIWXMAAAsTAAALEwEAmpwYAAAAgUlEQVR4nK3RPQ6DMAwFYDMVwS26IlaQuEnn9kxdI2Xze2HJkLt1CgoDoAoEkbDkzZ/lH5G7wlpbO+eelwHJhqovAJ2IFKcAQJsAU5L9gowxJVRHAj8CcZPfBeiMhhhjkTp9/gr3gc6oSeCdBUIIDwK8MNK6R9bSt53Ve19lPe4oJisTorJqiO3FAAAAAElFTkSuQmCC">
                            <span class="link-title">Note</span>
                            <i class="link-arrow" data-feather="chevron-down"></i>
                        </a>
                        <div class="collapse" id="forms90">
                            <ul class="nav sub-menu">
                                <li class="nav-item">
                                    <a href="add-note.php" class="nav-link">Add Note</a>
                                </li>
                                <li class="nav-item">
                                    <a href="list-note.php" class="nav-link">List Note</a>
                                </li>
                            </ul>
                        </div>
                    </li>

                </ul>
            </div>
        </nav>

        <div class="page-wrapper">
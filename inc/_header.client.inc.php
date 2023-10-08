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
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['logout'])) {
    $user->logout();
}
?>


<head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <meta name="robots" content="noindex, follow" />
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- Favicon -->
    <link rel="shortcut icon" href="./public/assets_client/images/favicon.jpg" type="image/x-icon">

    <!-- CSS
    ============================================ -->

    <!-- Bootstrap CSS -->
    <!-- <base href="http://nht-ps27199.free.nf/"> -->
    <base href="http://localhost/webmvc/">
    <link rel="stylesheet" href="./public/assets_client/css/vendor/flaticon/flaticon.css" />
    <link rel="stylesheet" href="./public/assets_client/css/vendor/bootstrap.min.css" />
    <link rel="stylesheet" href="./public/assets_client/css/vendor/font-awesome.css" />
    <link rel="stylesheet" href="./public/assets_client/css/vendor/slick.css" />
    <link rel="stylesheet" href="./public/assets_client/css/vendor/slick-theme.css" />
    <link rel="stylesheet" href="./public/assets_client/css/vendor/jquery-ui.min.css" />
    <link rel="stylesheet" href="./public/assets_client/css/vendor/sal.css" />
    <link rel="stylesheet" href="./public/assets_client/css/vendor/magnific-popup.css" />
    <link rel="stylesheet" href="./public/assets_client/css/vendor/base.css" />
    <link rel="stylesheet" href="./public/assets_client/css/style.min.css" />
</head>

<body class="sticky-header">


    <header class="header axil-header header-style-5">
        <!-- Start Mainmenu Area  -->
        <div id="axil-sticky-placeholder"></div>
        <div class="axil-mainmenu">
            <div class="container">
                <div class="header-navbar">
                    <div class="header-brand">
                        <a href="client/home.php" class="logo logo-dark">
                            <img src="./public/assets_client/images/logo/logo.png" alt="Site Logo" />
                        </a>
                        <a href="client/home.php" class="logo logo-light">
                            <img src="./public/assets_client/images/logo/logo-light.png" alt="Site Logo" />
                        </a>
                    </div>
                    <div class="header-main-nav">
                        <!-- Start Mainmanu Nav -->
                        <nav class="mainmenu-nav">
                            <button class="mobile-close-btn mobile-nav-toggler">
                                <svg xmlns="http://www.w3.org/2000/svg" id="Outline" viewBox="0 0 24 24" width="15"
                                    height="15">
                                    <path
                                        d="M18,6h0a1,1,0,0,0-1.414,0L12,10.586,7.414,6A1,1,0,0,0,6,6H6A1,1,0,0,0,6,7.414L10.586,12,6,16.586A1,1,0,0,0,6,18H6a1,1,0,0,0,1.414,0L12,13.414,16.586,18A1,1,0,0,0,18,18h0a1,1,0,0,0,0-1.414L13.414,12,18,7.414A1,1,0,0,0,18,6Z" />
                                </svg>
                            </button>
                            <div class="mobile-nav-brand">
                                <a href="client/home.php" class="logo">
                                    <img src="./public/assets_client/images/logo/logo.png" alt="Site Logo" />
                                </a>
                            </div>
                            <ul class="mainmenu">
                                <li><a href="client/home.php">Home</a></li>
                                <li><a href="client/shop.php">Shop</a></li>
                                <li><a href="client/about-us.php">About</a></li>
                                <li><a href="client/blog.php">Blog</a></li>
                                <li><a href="client/contact.php">Contact</a></li>
                            </ul>
                        </nav>
                        <!-- End Mainmanu Nav -->
                    </div>
                    <div class="header-action">
                        <ul class="action-list">
                            <li class="axil-search d-xl-block d-none">
                                <input type="search" class="placeholder product-search-input" name="search2"
                                    id="search2" value="" maxlength="128" placeholder="What are you looking for?"
                                    autocomplete="off" />
                                <button type="submit" class="icon wooc-btn-search">
                                    <svg xmlns="http://www.w3.org/2000/svg" id="Outline" viewBox="0 0 24 24" width="20"
                                        height="20">
                                        <path
                                            d="M23.707,22.293l-5.969-5.969a10.016,10.016,0,1,0-1.414,1.414l5.969,5.969a1,1,0,0,0,1.414-1.414ZM10,18a8,8,0,1,1,8-8A8.009,8.009,0,0,1,10,18Z" />
                                    </svg>
                                </button>
                            </li>
                            <li class="axil-search d-xl-none d-block">
                                <a href="javascript:void(0)" class="header-search-icon" title="Search">
                                    <svg xmlns="http://www.w3.org/2000/svg" id="Outline" viewBox="0 0 24 24" width="20"
                                        height="20">
                                        <path
                                            d="M23.707,22.293l-5.969-5.969a10.016,10.016,0,1,0-1.414,1.414l5.969,5.969a1,1,0,0,0,1.414-1.414ZM10,18a8,8,0,1,1,8-8A8.009,8.009,0,0,1,10,18Z" />
                                    </svg>
                                </a>
                            </li>
                            <!-- <li class="wishlist">
                            <a href="client/wishlist.php">
                                <svg xmlns="http://www.w3.org/2000/svg" id="Outline" viewBox="0 0 24 24" width="20"
                                    height="20">
                                    <path
                                        d="M17.5,1.917a6.4,6.4,0,0,0-5.5,3.3,6.4,6.4,0,0,0-5.5-3.3A6.8,6.8,0,0,0,0,8.967c0,4.547,4.786,9.513,8.8,12.88a4.974,4.974,0,0,0,6.4,0C19.214,18.48,24,13.514,24,8.967A6.8,6.8,0,0,0,17.5,1.917Zm-3.585,18.4a2.973,2.973,0,0,1-3.83,0C4.947,16.006,2,11.87,2,8.967a4.8,4.8,0,0,1,4.5-5.05A4.8,4.8,0,0,1,11,8.967a1,1,0,0,0,2,0,4.8,4.8,0,0,1,4.5-5.05A4.8,4.8,0,0,1,22,8.967C22,11.87,19.053,16.006,13.915,20.313Z" />
                                </svg>
                            </a>
                        </li> -->
                            <li class="shopping-cart">
                                <a href="#" class="cart-dropdown-btn">
                                    <!-- <span class="cart-count">3</span> -->
                                    <svg xmlns="http://www.w3.org/2000/svg" id="Outline" viewBox="0 0 24 24" width="20"
                                        height="20">
                                        <path
                                            d="M22.713,4.077A2.993,2.993,0,0,0,20.41,3H4.242L4.2,2.649A3,3,0,0,0,1.222,0H1A1,1,0,0,0,1,2h.222a1,1,0,0,1,.993.883l1.376,11.7A5,5,0,0,0,8.557,19H19a1,1,0,0,0,0-2H8.557a3,3,0,0,1-2.82-2h11.92a5,5,0,0,0,4.921-4.113l.785-4.354A2.994,2.994,0,0,0,22.713,4.077ZM21.4,6.178l-.786,4.354A3,3,0,0,1,17.657,13H5.419L4.478,5H20.41A1,1,0,0,1,21.4,6.178Z" />
                                        <circle cx="7" cy="22" r="2" />
                                        <circle cx="17" cy="22" r="2" />
                                    </svg>
                                </a>
                            </li>
                            <li class="my-account">
                                <a href="javascript:void(0)">
                                    <svg xmlns="http://www.w3.org/2000/svg" id="Outline" viewBox="0 0 24 24" width="20"
                                        height="20">
                                        <path
                                            d="M19,0H5A5.006,5.006,0,0,0,0,5V19a5.006,5.006,0,0,0,5,5H19a5.006,5.006,0,0,0,5-5V5A5.006,5.006,0,0,0,19,0ZM7,22V21a5,5,0,0,1,10,0v1Zm15-3a3,3,0,0,1-3,3V21A7,7,0,0,0,5,21v1a3,3,0,0,1-3-3V5A3,3,0,0,1,5,2H19a3,3,0,0,1,3,3Z" />
                                        <path
                                            d="M12,4a4,4,0,1,0,4,4A4,4,0,0,0,12,4Zm0,6a2,2,0,1,1,2-2A2,2,0,0,1,12,10Z" />
                                    </svg>
                                </a>
                                <div class="my-account-dropdown">
                                    <?php
                                    // $login_check = Session::get('user_login');
                                    if (isset($_SESSION['user_id'])) {
                                        # code...
                                        $login_check =  $_SESSION['user_id'];
                                    }
                                    if (isset($login_check)) {
                                        echo '<ul>
                                        <li>
                                            <a href="client/my-account.php">My Account</a>
                                        </li>
                                    </ul>';
                                    } else {
                                        echo '<!-- <ul>
                                        <li>
                                            <a href="client/my-account.php">My Account</a>
                                        </li>
                                    </ul> -->';
                                    }
                                    ?>
                                    <!-- <ul>
                                    <li>
                                        <a href="client/my-account.php">My Account</a>
                                    </li>
                                </ul> -->


                                    <div class="login-btn">
                                        <?php
                                        // $login_check = Session::get('user_login');
                                        if (isset($login_check)) {
                                        ?>
                                        <form action="" method="post">

                                            <button type="submit" name="logout"
                                                class="axil-btn btn-bg-primary">Logout</button>
                                        </form>
                                        <?php

                                        } else {
                                        ?>
                                        <a href="./client/sign-in.php" class="axil-btn btn-bg-primary">Login</a>
                                        <?php
                                        }
                                        ?>
                                        <!-- <a href="client/sign-in.php" class="axil-btn btn-bg-primary">Login</a> -->
                                    </div>
                                    <div class="reg-footer text-center">
                                        <?php
                                        // $login_check = Session::get('user_login');
                                        if (isset($login_check)) {
                                            echo '<!-- No account yet?
                                        <a href="client/sign-up.php" class="btn-link">REGISTER HERE.</a> -->';
                                        } else {
                                            echo 'No account yet?
                                        <a href="client/sign-up.php" class="btn-link">REGISTER HERE.</a>';
                                        }
                                        ?>
                                        <!-- No account yet?
                                    <a href="client/sign-up.php" class="btn-link">REGISTER HERE.</a> -->
                                    </div>
                                </div>
                            </li>
                            <li class="axil-mobile-toggle">
                                <button class="menu-btn mobile-nav-toggler">
                                    <svg xmlns="http://www.w3.org/2000/svg" id="Outline" viewBox="0 0 24 24" width="20"
                                        height="20">
                                        <path
                                            d="M7,0H4A4,4,0,0,0,0,4V7a4,4,0,0,0,4,4H7a4,4,0,0,0,4-4V4A4,4,0,0,0,7,0ZM9,7A2,2,0,0,1,7,9H4A2,2,0,0,1,2,7V4A2,2,0,0,1,4,2H7A2,2,0,0,1,9,4Z" />
                                        <path
                                            d="M20,0H17a4,4,0,0,0-4,4V7a4,4,0,0,0,4,4h3a4,4,0,0,0,4-4V4A4,4,0,0,0,20,0Zm2,7a2,2,0,0,1-2,2H17a2,2,0,0,1-2-2V4a2,2,0,0,1,2-2h3a2,2,0,0,1,2,2Z" />
                                        <path
                                            d="M7,13H4a4,4,0,0,0-4,4v3a4,4,0,0,0,4,4H7a4,4,0,0,0,4-4V17A4,4,0,0,0,7,13Zm2,7a2,2,0,0,1-2,2H4a2,2,0,0,1-2-2V17a2,2,0,0,1,2-2H7a2,2,0,0,1,2,2Z" />
                                        <path
                                            d="M20,13H17a4,4,0,0,0-4,4v3a4,4,0,0,0,4,4h3a4,4,0,0,0,4-4V17A4,4,0,0,0,20,13Zm2,7a2,2,0,0,1-2,2H17a2,2,0,0,1-2-2V17a2,2,0,0,1,2-2h3a2,2,0,0,1,2,2Z" />
                                    </svg>
                                </button>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Mainmenu Area -->
    </header>
    <!-- End Header -->


    <!-- Product Quick View Modal Start -->
    <div class="modal fade quick-view-product" id="quick-view-modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <i class="far fa-times"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="single-product-thumb">
                        <div class="row">
                            <div class="col-lg-7 mb--40">
                                <div class="row">
                                    <div class="col-lg-10 order-lg-2">
                                        <div
                                            class="single-product-thumbnail product-large-thumbnail axil-product thumbnail-badge zoom-gallery">
                                            <div class="thumbnail">
                                                <img src="./public/assets_client/images/product/product-big-01.png"
                                                    alt="Product Images" />
                                                <div class="label-block label-right">
                                                    <div class="product-badget">20% OFF</div>
                                                </div>
                                                <div class="product-quick-view position-view">
                                                    <a href="./public/assets_client/images/product/product-big-01.png"
                                                        class="popup-zoom">
                                                        <i class="far fa-search-plus"></i>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="thumbnail">
                                                <img src="./public/assets_client/images/product/product-big-02.png"
                                                    alt="Product Images" />
                                                <div class="label-block label-right">
                                                    <div class="product-badget">20% OFF</div>
                                                </div>
                                                <div class="product-quick-view position-view">
                                                    <a href="./public/assets_client/images/product/product-big-02.png"
                                                        class="popup-zoom">
                                                        <i class="far fa-search-plus"></i>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="thumbnail">
                                                <img src="./public/assets_client/images/product/product-big-03.png"
                                                    alt="Product Images" />
                                                <div class="label-block label-right">
                                                    <div class="product-badget">20% OFF</div>
                                                </div>
                                                <div class="product-quick-view position-view">
                                                    <a href="./public/assets_client/images/product/product-big-03.png"
                                                        class="popup-zoom">
                                                        <i class="far fa-search-plus"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-2 order-lg-1">
                                        <div class="product-small-thumb small-thumb-wrapper">
                                            <div class="small-thumb-img">
                                                <img src="./public/assets_client/images/product/product-thumb/thumb-08.png"
                                                    alt="thumb image" />
                                            </div>
                                            <div class="small-thumb-img">
                                                <img src="./public/assets_client/images/product/product-thumb/thumb-07.png"
                                                    alt="thumb image" />
                                            </div>
                                            <div class="small-thumb-img">
                                                <img src="./public/assets_client/images/product/product-thumb/thumb-09.png"
                                                    alt="thumb image" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-5 mb--40">
                                <div class="single-product-content">
                                    <div class="inner">
                                        <div class="product-rating">
                                            <div class="star-rating">
                                                <img src="./public/assets_client/images/icons/rate.png"
                                                    alt="Rate Images" />
                                            </div>
                                            <div class="review-link">
                                                <a href="#">(<span>1</span> customer reviews)</a>
                                            </div>
                                        </div>
                                        <h3 class="product-title">Serif Coffee Table</h3>
                                        <span class="price-amount">$155.00 - $255.00</span>
                                        <ul class="product-meta">
                                            <li><i class="fal fa-check"></i>In stock</li>
                                            <li>
                                                <i class="fal fa-check"></i>Free delivery available
                                            </li>
                                            <li>
                                                <i class="fal fa-check"></i>Sales 30% Off Use Code:
                                                MOTIVE30
                                            </li>
                                        </ul>
                                        <p class="description">
                                            In ornare lorem ut est dapibus, ut tincidunt nisi
                                            pretium. Integer ante est, elementum eget magna.
                                            Pellentesque sagittis dictum libero, eu dignissim
                                            tellus.
                                        </p>

                                        <div class="product-variations-wrapper">
                                            <!-- Start Product Variation  -->
                                            <div class="product-variation">
                                                <h6 class="title">Colors:</h6>
                                                <div class="color-variant-wrapper">
                                                    <ul class="color-variant mt--0">
                                                        <li class="color-extra-01 active">
                                                            <span><span class="color"></span></span>
                                                        </li>
                                                        <li class="color-extra-02">
                                                            <span><span class="color"></span></span>
                                                        </li>
                                                        <li class="color-extra-03">
                                                            <span><span class="color"></span></span>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <!-- End Product Variation  -->

                                            <!-- Start Product Variation  -->
                                            <div class="product-variation">
                                                <h6 class="title">Size:</h6>
                                                <ul class="range-variant">
                                                    <li>xs</li>
                                                    <li>s</li>
                                                    <li>m</li>
                                                    <li>l</li>
                                                    <li>xl</li>
                                                </ul>
                                            </div>
                                            <!-- End Product Variation  -->
                                        </div>

                                        <!-- Start Product Action Wrapper  -->
                                        <div class="product-action-wrapper d-flex-center">
                                            <!-- Start Quentity Action  -->
                                            <div class="pro-qty">
                                                <input type="text" value="1" />
                                            </div>
                                            <!-- End Quentity Action  -->

                                            <!-- Start Product Action  -->
                                            <ul class="product-action d-flex-center mb--0">
                                                <li class="add-to-cart">
                                                    <a href="client/cart.php" class="axil-btn btn-bg-primary">Add to
                                                        Cart</a>
                                                </li>
                                                <li class="wishlist">
                                                    <a href="client/wishlist.php" class="axil-btn wishlist-btn"><i
                                                            class="far fa-heart"></i></a>
                                                </li>
                                            </ul>
                                            <!-- End Product Action  -->
                                        </div>
                                        <!-- End Product Action Wrapper  -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Product Quick View Modal End -->

    <div class="cart-dropdown" id="cart-dropdown">
        <div class="cart-content-wrap">
            <div class="cart-header">
                <h2 class="header-title">Cart review</h2>
                <button class="cart-close sidebar-close">
                    <svg xmlns="http://www.w3.org/2000/svg" id="Outline" viewBox="0 0 24 24" width="15" height="15">
                        <path
                            d="M18,6h0a1,1,0,0,0-1.414,0L12,10.586,7.414,6A1,1,0,0,0,6,6H6A1,1,0,0,0,6,7.414L10.586,12,6,16.586A1,1,0,0,0,6,18H6a1,1,0,0,0,1.414,0L12,13.414,16.586,18A1,1,0,0,0,18,18h0a1,1,0,0,0,0-1.414L13.414,12,18,7.414A1,1,0,0,0,18,6Z" />
                    </svg>
                </button>
            </div>
            <div class="cart-body">
                <ul class="cart-item-list">

                </ul>
            </div>
            <div class="cart-footer">
                <!-- <h3 class="cart-subtotal">
                <span class="subtotal-title">Subtotal:</span>
                <span class="subtotal-amount">$610.00</span>
            </h3> -->
                <div class="group-btn">
                    <a href="client/cart.php" class="axil-btn btn-bg-primary viewcart-btn">View Cart</a>
                    <a href="client/checkout.php" class="axil-btn btn-bg-secondary checkout-btn">Checkout</a>
                </div>
            </div>
        </div>
    </div>
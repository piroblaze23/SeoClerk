<?php

    ini_set('display_errors', 0);

    $settings = json_decode(file_get_contents('admin/data/settings.txt'));
    $protocol = $settings->https == 'on' ? 'https://' : 'http://';
    
    //For Local
    if (strpos($_SERVER['DOCUMENT_ROOT'], 'wamp') !== false) {
        define('DOC_ROOT', $_SERVER['DOCUMENT_ROOT'] . '/myseostore/');
        define('SITE_URL', $protocol . $_SERVER['HTTP_HOST'] . '/myseostore/');
    }
    else {
        define('DOC_ROOT', $_SERVER['DOCUMENT_ROOT'] . '/');
        define('SITE_URL', $protocol . $_SERVER['HTTP_HOST'] . '/');
    }
    
    
    define('THEME_PATH', DOC_ROOT . 'Themes/buxkit/assets/');
    define('THEME_URL', SITE_URL . 'Themes/buxkit/assets/');
    define('ADMIN_URL', SITE_URL . 'admin/');
    define('ADMIN_PATH', DOC_ROOT . 'admin/');

    $legal = json_decode(file_get_contents('admin/data/legal.txt'));

    include('paypalconfig.php');

    function pr($obj) {
        echo 'DATA:<pre>';
        print_r($obj);
        die();
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?php echo stripslashes($data->seo_title); ?></title>
        <meta name="description" content="<?php echo $data->seo_des; ?>">
        <meta name="keywords" content="<?php echo $data->seo_key; ?>">

        <!-- Fonts -->
        <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Yanone+Kaffeesatz:400,700' rel='stylesheet' type='text/css'>

        <!-- Css -->
        <!-- favicon --> 
        <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
        <!-- bootstrap -->
        <link rel="stylesheet" href="<?php echo THEME_URL;?>css/bootstrap.min.css">
        <!-- fontawesome -->
        <link rel="stylesheet" href="<?php echo THEME_URL;?>css/fontawesome.min.css">
        <!-- Pe icon 7 stroke -->
        <link rel="stylesheet" href="<?php echo THEME_URL;?>css/flaticon.css">
        <!-- animate -->
        <link rel="stylesheet" href="<?php echo THEME_URL;?>css/animate.css">
        <!-- Owl Carousel -->
        <link rel="stylesheet" href="<?php echo THEME_URL;?>css/slick.min.css">
        <!-- magnific popup -->
        <link rel="stylesheet" href="<?php echo THEME_URL;?>css/magnific-popup.css">
        <!-- stylesheet -->
        <link rel="stylesheet" href="<?php echo THEME_URL;?>css/style.css">
        <!-- responsive -->
        <link rel="stylesheet" href="<?php echo THEME_URL;?>css/responsive.css">

        <!-- jS -->
        <!-- jquery -->
        <script src="<?php echo THEME_URL;?>js/jquery.js"></script>
        <!-- popper -->
        <script src="<?php echo THEME_URL;?>js/popper.min.js"></script>    
        <!-- bootstrap -->
        <script src="<?php echo THEME_URL;?>js/bootstrap.min.js"></script>
        <!-- owl carousel -->
        <script src="<?php echo THEME_URL;?>js/slick.min.js"></script>
        <!-- magnific popup -->
        <script src="<?php echo THEME_URL;?>js/jquery.magnific-popup.js"></script>
        <!-- wow js-->
        <script src="<?php echo THEME_URL;?>js/wow.min.js"></script>
        <!-- tweenmax js-->
        <script src="<?php echo THEME_URL;?>js/TweenMax.js"></script>
        <!-- mouseover parallax js-->
        <script src="<?php echo THEME_URL;?>js/mousemoveparallax.js"></script>
        <!-- contact js-->
        <script src="<?php echo THEME_URL;?>js/contact.js"></script>
        <!-- main -->
        <script src="<?php echo THEME_URL;?>js/main.js"></script>
    </head>

    <body>
        <!-- preloader area start -->
        <div class="preloader" id="preloader">
            <div class="preloader-inner">
                <div class="cancel-preloader">
                    <a href="#">Cancel Preloader</a>
                </div>
                <div class="lds-spinner"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div>
            </div>
        </div>
        <!-- preloader area end -->

        <!-- navbar area start -->
        <nav class="navbar navbar-area navbar-expand-lg absolute">
            <div class="container-fluid nav-container">
                <div class="logo-wrapper navbar-brand">
                    <a href="<?php echo SITE_URL; ?>" class="logo ">
                        <img src="<?php echo ADMIN_URL.'data/images/'.$settings->logo; ?>" alt="logo">
                    </a>
                </div>
                <div class="collapse navbar-collapse" id="cgency">
                    <!-- navbar collapse start -->
                    <ul class="navbar-nav" id="primary-menu">
                        <!-- navbar- nav -->
                        <?php
                            $exploded = explode('/', $_SERVER['REQUEST_URI']);
                            $pg = end($exploded);                                   
                        ?>
                        <li class="nav-item <?php echo $pg == '' || $pg == 'index.php' ? "active": ""; ?>"><a class="nav-link" href="/">HOME</a></li>
                        <li class="nav-item <?php echo $pg == 'about.php' ? "active": ""; ?>"><a class="nav-link" href="about.php">ABOUT</a></li>
                        <li class="nav-item <?php echo $pg == 'free-download.php' ? "active": ""; ?>"><a  class="nav-link" href="free-download.php">FREE GIFTS</a></li>
                        <li class="nav-item <?php echo $pg == 'products.php' ? "active": ""; ?>"><a class="nav-link" href="products.php">PRODUCTS</a></li>
                        <li class="nav-item <?php echo $pg == 'ebooks.php' ? "active": ""; ?>"><a class="nav-link" href="ebooks.php">EBOOKS</a></li>
                        <li class="nav-item <?php echo $pg == 'services.php' ? "active": ""; ?>"><a class="nav-link" href="services.php">SERVICES</a></li>
                        <li class="nav-item <?php echo $pg == 'pricing.php' ? "active": ""; ?>"><a class="nav-link" href="<?php echo SITE_URL; ?>#contact">CONTACT US</a></li>
                    </ul>
                    <!-- /.navbar-nav -->
                </div>
                <!-- /.navbar btn wrapper -->
                <div class="responsive-mobile-menu">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#cgency" aria-controls="cgency"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                </div>
                <!-- navbar collapse end -->
                <!-- <div class="nav-right-content">
                    <ul>
                        <li class="nav-btn">
                            <a href="#" class="boxed-btn blank">Login</a>
                        </li>
                    </ul>
                </div> -->
            </div>
        </nav>
        <!-- navbar area end -->

        <style type="text/css">
        	body a.nav-link:hover { color: #a1a1a1 !important;  }
        </style>

<?php include('paypalconfig.php'); ?>
<?php $settings = json_decode(file_get_contents('admin/data/settings.txt')); ?>
<?php
    //For Local
    if (strpos($_SERVER['DOCUMENT_ROOT'], 'wamp') !== false) {
        define('DOC_ROOT', $_SERVER['DOCUMENT_ROOT'] . '/myseostore/');
        define('SITE_URL', 'http://' . $_SERVER['HTTP_HOST'] . '/myseostore/');
    }
    else {
        define('DOC_ROOT', $_SERVER['DOCUMENT_ROOT'] . '/');
        define('SITE_URL', 'http://' . $_SERVER['HTTP_HOST'] . '/');
    }
    define('THEME_PATH', DOC_ROOT . 'Themes/food-code/');
    define('THEME_URL', SITE_URL . 'Themes/food-code/');
    define('ADMIN_URL', SITE_URL . 'admin/');
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta charset="utf-8">
      
        <!-- CSS -->
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

        <!-- Fonts -->
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Yanone+Kaffeesatz:400,700' rel='stylesheet' type='text/css'>

        <!-- Css -->
        <link rel="stylesheet" href="<?php echo THEME_URL;?>css/nivo-slider.css" type="text/css" />
        <link rel="stylesheet" href="<?php echo THEME_URL;?>css/owl.carousel.css">
        <link rel="stylesheet" href="<?php echo THEME_URL;?>css/owl.theme.css">
        <link rel="stylesheet" href="<?php echo THEME_URL;?>css/bootstrap.min.css">
        <link rel="stylesheet" href="<?php echo THEME_URL;?>css/font-awesome.min.css">
        <link rel="stylesheet" href="<?php echo THEME_URL;?>css/style.css">
        <link rel="stylesheet" href="<?php echo THEME_URL;?>css/responsive.css">

        <!-- jS -->
        <script src="<?php echo THEME_URL;?>js/jquery.min.js" type="text/javascript"></script>
        <script src="<?php echo THEME_URL;?>js/bootstrap.min.js" type="text/javascript"></script>
        <script src="<?php echo THEME_URL;?>js/jquery.nivo.slider.js" type="text/javascript"></script>
        <script src="<?php echo THEME_URL;?>js/owl.carousel.min.js" type="text/javascript"></script>
        <script src="<?php echo THEME_URL;?>js/jquery.nicescroll.js"></script>
        <script src="<?php echo THEME_URL;?>js/jquery.scrollUp.min.js"></script>
        <script src="<?php echo THEME_URL;?>js/main.js" type="text/javascript"></script>

        <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
            <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
         
        <![endif]-->

        <!-- Favicon and touch icons -->
      
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="images/apple-touch-icon-57-precomposed.png">
    
    </head>

    <body>
        <!-- LOGO Start
        ================================================== -->
        <header>
            <div class="container">
               
            </div>  <!-- End of /.container -->
        </header> <!-- End of /Header -->

        <!-- MENU Start
        ================================================== -->

        <nav class="navbar navbar-default">
            <div class="container">
         

                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
              
                </div>  <!-- /.navbar-collapse -->
            </div>  <!-- /.container-fluid -->
        </nav>  <!-- End of /.nav -->
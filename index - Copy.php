<?php
    $file = "admin/data/home.txt";
    $fileproduct = "admin/data/product.txt";
    $filecourses = "admin/data/courses.txt";
    $fileebooks = "admin/data/ebooks.txt";
    $fileseo = "admin/data/seohome.txt";
    $filesm = "admin/data/smhome.txt";
    $filered = "admin/data/redirect.txt";
    $filetesti = "admin/data/testi.txt";
    $filesocial = "admin/data/social.txt";

    if (file_exists($file)) $data = json_decode(file_get_contents($file));
    if (file_exists($fileproduct)) $dataproduct = json_decode(file_get_contents($fileproduct));
    if (file_exists($filecourses)) $datacourses = json_decode(file_get_contents($filecourses));
    if (file_exists($fileebooks)) $dataebooks = json_decode(file_get_contents($fileebooks));
    if (file_exists($fileseo)) $dataseo = json_decode(file_get_contents($fileseo));
    if (file_exists($filesm)) $datasm = json_decode(file_get_contents($filesm));
    if (file_exists($filered)) $datared = json_decode(file_get_contents($filered));
    if (file_exists($filetesti)) $datatesti = json_decode(file_get_contents($filetesti));
    if (file_exists($filesocial)) $datasocial = json_decode(file_get_contents($filesocial));

	include('includes/header.php');
	
	switch($settings->currency) {
		default: case 'USD': $sym = '$'; break;
		case 'GBP': $sym = '£'; break;
		case 'EUR': $sym = '€'; break;
	}

$allDataSM = array(
    0 => array('title' => 'Twitter Followers', 'name' => 'tw_fo_tx', 'price' => 'tw_fo_pr', 'image' => 'twitter.png'),
    1 => array('title' => 'Instagram Followers', 'name' => 'in_fo_tx', 'price' => 'in_fo_pr', 'image' => 'instagram.png'),
    2 => array('title' => 'Facebook Like', 'name' => 'fb_lk_tx', 'price' => 'fb_lk_pr', 'image' => 'facebook.png'),
    3 => array('title' => 'Youtube Views', 'name' => 'yo_vw_tx', 'price' => 'yo_vw_pr', 'image' => 'youtube.png'),
    4 => array('title' => 'Twitter Retweet', 'name' => 'tw_rt_tx', 'price' => 'tw_rt_pr', 'image' => 'twitter.png'),
    5 => array('title' => 'Instagram Likes', 'name' => 'in_lk_tx', 'price' => 'in_lk_pr', 'image' => 'instagram.png'),
    6 => array('title' => 'Facebook Shares', 'name' => 'fb_sh_tx', 'price' => 'fb_sh_pr', 'image' => 'facebook.png'),
    7 => array('title' => 'Youtube Subscribes', 'name' => 'yo_su_tx', 'price' => 'yo_su_pr', 'image' => 'youtube.png')
);

$allDataSEO = array(
    0 => array('title' => 'BACKLINK PACKAGES', 'name' => 'tw_fo_tx', 'price' => 'tw_fo_pr', 'image' => 'backlinks.png'),
    1 => array('title' => 'PRESS RELEASES', 'name' => 'in_fo_tx', 'price' => 'in_fo_pr', 'image' => 'pressreleases.png'),
    2 => array('title' => 'CONTENT WRITING', 'name' => 'fb_lk_tx', 'price' => 'fb_lk_pr', 'image' => 'articlewriting.png'),
    3 => array('title' => 'ARTICLE SUBMISSIONS', 'name' => 'yo_vw_tx', 'price' => 'yo_vw_pr', 'image' => 'articlesubmission.png'),
    4 => array('title' => 'SOCIAL BOOKMARKING', 'name' => 'tw_rt_tx', 'price' => 'tw_rt_pr', 'image' => 'socialbookmarking.png'),
    5 => array('title' => 'VIDEO MARKETING', 'name' => 'in_lk_tx', 'price' => 'in_lk_pr', 'image' => 'videomarketing.png'),
    6 => array('title' => 'LINK INDEXING', 'name' => 'fb_sh_tx', 'price' => 'fb_sh_pr', 'image' => 'linkindexing.png'),
    7 => array('title' => 'SOCIAL ACCOUNTS', 'name' => 'yo_su_tx', 'price' => 'yo_su_pr', 'image' => 'socialaccounts.png')
);

$fixed_str = '  <input type="hidden" name="cmd" value="_xclick">
                <input type="hidden" name="business" value="'.$settings->paypal.'">
                <input type="hidden" name="lc" value="US">
                <input type="hidden" name="add" value="1">';
$btn = '<input type="submit" class="btn_new" value="Buy Now" />';
?>

<!-- header area start -->
<div class="header-area header-bg-2 style-two" id="home">
    <div class="header-area-inner">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="header-inner"><!-- header inner -->
                        <div class="subwrap"><span class="subtitle">Firs ever Amazing thing</span></div>
                        <h1 class="title wow FadeInDown">Get Instance Access to 20 Must Have SEO Tool</p>   
                        <div class="btn-wrapper">
                            <a href="#" class="boxed-btn gd-bg">Get Started For $1</a>
                        </div>
                    </div><!-- //. header inner -->
                </div>
            </div>
        </div>
    </div>
   <div class="header-right-image">
        <div class="header-right-image-animation">
            <img src="<?php echo THEME_URL;?>img/header-right-02.png" alt="header right image">
        </div>
   </div>
   <div class="header-bottom-area padding-top-130 padding-bottom-110"><!-- header bottom area -->
       <div class="container">
           <div class="row">
               <div class="col-lg-4 col-md-6">
                   <div class="single-feature-item-01  wow zoomIn"><!-- single feature item 01 -->
                        <a href="plugins.php">
                            <div class="icon">
                                <i class="flaticon-sketch"></i>
                            </div>
                            <div class="content">
                                <h4 class="title">GET TOP RANKING</h4>
                                <p>Life lain held calm and true neat she. Much feet each so went no from. Truth began.</p>
                            </div>
                        </a>
                   </div><!-- //. single feature item 01 -->
               </div>
               <div class="col-lg-4 col-md-6">
                   <div class="single-feature-item-01  wow zoomIn"><!-- single feature item 01 -->
                        <a href="plugins.php">
                            <div class="icon">
                                <i class="flaticon-bullseye"></i>
                            </div>
                            <div class="content">
                                <h4 class="title">EASY TO USE</h4>
                                <p>Life lain held calm and true neat she. Much feet each so went no from. Truth began.</p>
                            </div>
                        </a>
                   </div><!-- //. single feature item 01 -->
               </div>
               <div class="col-lg-4 col-md-6">
                   <div class="single-feature-item-01  wow zoomIn"><!-- single feature item 01 -->
                        <a href="plugins.php">
                            <div class="icon">
                                <i class="flaticon-repair"></i>
                            </div>
                            <div class="content">
                                <h4 class="title">FREE ORGANIC TRAFIC</h4>
                                <p>Life lain held calm and true neat she. Much feet each so went no from. Truth began.</p>
                            </div>
                        </a>
                   </div><!-- //. single feature item 01 -->
               </div>
           </div>
       </div>
   </div><!-- header bottom area -->
</div>
<!-- header area end -->

<!-- intro video area start -->
<div class="intro-video-area intro-video-bg padding-120">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="intro-video-inner"><!-- intro video inner -->
                    <div class="img-wrapper">
                        <img src="<?php echo THEME_URL;?>img/intro-video-laptop.png" alt="intro vidoe laptop">
                        <div class="hover">
                                <a href="https://www.youtube.com/watch?v=I29WdREgrCA" class="video-play-btn mfp-iframe"><i class="fas fa-play"></i></a>
                        </div>
                    </div>
                </div><!-- //. intro video inner area -->
            </div>  

        </div>
    </div>
</div>
<!-- intro video area end -->

<!-- why choose us area start -->
<section class="why-chose-us why-choose-us-bg padding-top-140 padding-bottom-55" id="feature">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-7">
                <div class="section-title center-aligned">
                    <h2 class="title">Why everybody choose this app</h2>
                    <p>solutions with the best.  Incididunt dolor sit amet, adipiscing elitsed tempor  vel metus scelerisque ante sollicitudin.</p>   
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-6">
                <div class="why-us-box-01 margin-bottom-30">
                    <div class="icon">
                        <i class="flaticon-repair"></i>
                    </div>
                    <div class="content">
                        <h4 class="title">Easy Customize</h4>
                        <p>Tiled way blind lived whose new. The for fully had she there leave .</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="why-us-box-01 margin-bottom-30">
                    <div class="icon">
                        <i class="flaticon-bullseye"></i>
                    </div>
                    <div class="content">
                        <h4 class="title">Super Fast</h4>
                        <p>Tiled way blind lived whose new. The for fully had she there leave .</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="why-us-box-01 margin-bottom-30">
                    <div class="icon">
                        <i class="flaticon-folder"></i>
                    </div>
                    <div class="content">
                        <h4 class="title">Cloud Upload</h4>
                        <p>Tiled way blind lived whose new. The for fully had she there leave .</p>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6">
                <div class="why-us-box-01 margin-bottom-30">
                    <div class="icon">
                        <i class="flaticon-compass-1"></i>
                    </div>
                    <div class="content">
                        <h4 class="title">Multi Control</h4>
                        <p>Tiled way blind lived whose new. The for fully had she there leave .</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="why-us-box-01 margin-bottom-30">
                    <div class="icon">
                        <i class="flaticon-screen"></i>
                    </div>
                    <div class="content">
                        <h4 class="title">Fast Integrations</h4>
                        <p>Tiled way blind lived whose new. The for fully had she there leave .</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="why-us-box-01 margin-bottom-30">
                    <div class="icon">
                        <i class="flaticon-life-insurance"></i>
                    </div>
                    <div class="content">
                        <h4 class="title">100% Secure</h4>
                        <p>Tiled way blind lived whose new. The for fully had she there leave .</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- why choose us area end -->

<!-- testimonial area start -->
<?php if ($settings->total_testi > 0) { ?>
    <div class="testimonial-area padding-bottom-110">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="testimonial-carousel-wrapper"><!-- testimonial carousel wrapper -->
                        <ul class="slider-nav"><!-- testimonial slider nav -->
                        <?php for($i = 1; $i <= $settings->total_testi; $i++) { ?>
                            <li class="single-nav-item">
                                <div class="img-wrap">
                                    <img src="admin/data/images/<?php echo $datatesti->testi_img->$i; ?>" alt="testimonial image">
                                </div>
                            </li>
                        <?php } ?>
                        </ul><!-- testimonial slider nav -->
                        <div class="testimonial-carousel slider-for"><!-- testimonial slider for -->
                        <?php for($i = 1; $i <= $settings->total_testi; $i++) { ?>
                            <div class="single-testimonial-item"><!-- single testimonial slider -->
                                <div class="icon">
                                    <i class="fas fa-quote-left"></i>   
                                </div>
                                <div class="description">
                                    <p><?php echo stripslashes($datatesti->testi_msg->$i); ?></p>
                                    <div class="author-meta">
                                        <h5 class="name"><?php echo $datatesti->testi_auth->$i; ?></h5>
                                    </div>   
                                </div>
                            </div><!-- //.single testimonial slider -->
                        <?php } ?>

                        </div><!-- testimonial slider for -->
                    </div><!-- testimonial carousel wrapper -->
                </div>
            </div>
        </div>
    </div>
<?php } ?>
<!-- testimonial area end -->

<!-- block feature area start -->
<div class="block-feature-area" id="about">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="block-feature-item"><!-- block feature item -->
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="img-wrapper box-shadow-90">
                                <img src="<?php echo THEME_URL;?>img/softawe-1.jpg" alt="software image">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="content-block-area padding-left-50"><!-- content block area -->
                                <h4 class="title wow fadeInUp">Best way to connect customers & lead</h4>
                                <p>Innovative solutions with the best.  Incididunt dolor sit amet, consectetur adipiscing elit, sed tempor  sit amet nibh libero, in gravida nulla. vel metus scelerisque ante sollicitudin. </p>
                                <div class="btn-wrapper margin-top-20 wow fadeInDown">
                                    <a href="#" class="boxed-btn gd-bg br-5 w180px">Read More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>  
        </div>
    </div>
</div>
<!-- block feature area end -->

<!-- block feature area start -->
<div class="block-feature-area padding-120">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="block-feature-item"><!-- block feature item -->
                    <div class="row reorder-xs">
                        <div class="col-lg-6">
                            <div class="content-block-area padding-right-50"><!-- content block area -->
                                <h4 class="title wow fadeInUp">Manage to balance workloads & reso</h4>
                                <p>Innovative solutions with the best.  Incididunt dolor sit amet, consectetur adipiscing elit, sed tempor  sit amet nibh libero, in gravida nulla. vel metus scelerisque ante sollicitudin. </p>
                                <div class="btn-wrapper margin-top-20">
                                    <a href="#" class="boxed-btn gd-bg br-5 w180px">Read More</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="img-wrapper box-shadow-90 wow fadeInDown">
                                <img src="<?php echo THEME_URL;?>img/softawe-2.jpg" alt="software image">
                            </div>
                        </div>
                    </div>
                </div>
            </div>  
        </div>
    </div>
</div>
<!-- block feature area end -->




<script type="text/javascript">
    var allItems = [];
</script>

<section id="desc">
    <!-- Site Description -->
    <div class="presentation container text-center">
    	<h2><?php echo $data->main_headline != '' ? stripslashes($data->main_headline) : 'We are <span class="violet">SocialPiggy</span>, a viral marketing company.'; ?></h2>
    	<p><?php echo $data->main_headline != '' ? stripslashes($data->sub_headline) : 'We create viral buzz around the internet...'; ?></p>
    </div>
    <br/>
    <?php if ( (isset($data->hero_enable) && $data->hero_enable == 1) || 1 ){  ?>
    <div class="what-we-do container hero">
        <!-- <div class="row">
            <div class="col-sm-12 col-md-6 <?php //echo $data->hero_video_position == "float-left"? "" : "float-right";  ?>">
                <?php //echo stripslashes($data->hero_video);  ?>
            </div>
            <div class="col-sm-12 col-md-6 ">
            	<h2><?php //echo $data->hero_title != '' ? stripslashes($data->hero_title) : 'We are <span class="violet">SocialPiggy</span>, a viral marketing company.'; ?></h2>
            	<p><?php //echo $data->hero_desc != '' ? stripslashes($data->hero_desc) : 'We create viral buzz around the internet...'; ?></p>
            </div>
        </div> -->
            <div class="row">
                <div class="col-md-12">
                    <div id="slider" class="nivoSlider">
                    <?php
                        for ($s = 1; $s <= 6; $s++)
                            if (isset($data->home_img) && $data->home_img->$s != '' )
                                echo "<img src='".ADMIN_URL."data/images/" . $data->home_img->$s."' />";
                    ?>
                    </div>  <!-- End of /.nivoslider -->
                </div>  <!-- End of /.col-md-12 -->
            </div>  <!-- End of /.row -->
        
    </div>
    <?php }  ?>
</section>  <!-- End of section -->

<!-- FEATURES Start
================================================== -->
<section id="features">
    <div class="container">
        <style type="text/css">
            #allCourses, #allProducts, #allEbooks { cursor: pointer; }
        </style>
        <div class="row">
            <div class="col-md-4">
                <div class="block" id="allCourses">
                    <div class="media">
                        <div class="pull-left col-sm-3 col-xs-4">
                            <img src="<?php echo SITE_URL ;?>images/courseicon.png" />
                        </div>
                            <div class="media-body">
                                <h4 class="media-heading">View All Courses</h4>
                          </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="block">
                    <div class="media" id="allProducts">
                        <div class="pull-left col-sm-3 col-xs-4">
                            <img src="<?php echo SITE_URL ;?>images/softwareicon.png" />
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading">View All Software Products</h4>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="block" id="allEbooks">
                        <div class="media">
                            <div class="pull-left col-sm-3 col-xs-4">
                                <img src="<?php echo SITE_URL ;?>images/ebookicon.png" />
                            </div>
                            <div class="media-body">
                                <h4 class="media-heading">View All Ebooks</h4>
                            </div>    <!-- End of /.media-body -->
                        </div>  <!-- End of /.media -->
                        
                </div>  <!-- End of /.block -->
            </div> <!-- End of /.col-md-4 -->
        </div>  <!-- End of /.row -->
    </div>  <!-- End of /.container -->
</section>  <!-- End of section -->

<section id="catagorie">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="block">
                    <div class="products-heading text-center">
                        <h2>Featured Courses</h2>
                    </div> 
                    <div class="row">
                        <?php
                            for ($i = 1; $i < 7; $i++) {
                                for ($j = 1; $j <= $settings->total_courses; $j++) {
                                    if ($datacourses->courses_name->$j == $data->courses->$i) {
                                    ?>
                                        <script type="text/javascript">
                                            allItems.push({ name: "<?php echo $datacourses->courses_name->$j; ?>", img: "<?php echo ADMIN_URL ?>data/images/<?php echo $datacourses->courses_img->$j; ?>" });
                                        </script>
                                        <div class="col-sm-6 col-md-4">
                                            <div class="thumbnail">
                                                <a href="javascript: void(0);">
                                                    <img src="<?php echo ADMIN_URL ?>data/images/<?php echo $datacourses->courses_img->$j; ?>" alt="<?php echo $datacourses->courses_name->$j;?>">
                                                    <h3><?php echo $datacourses->courses_name->$j; ?></h3>
                                                    <div class="caption">
                                                        <p><?php echo $datacourses->courses_desc->$j; ?></p> 
                                                    </div>  <!-- End of /.caption -->
                                                </a>
                                                <!-- <p class="price">Price: <?php //echo $sym; ?><?php //echo $datacourses->price->$j; ?></p> -->
                                                <form name="courses_<?php echo $i; ?>" action="<?php echo paypal_path; ?>" method="post">
                                                    <input type="hidden" name="cmd" value="_xclick">
                                                    <input type="hidden" name="business" value="<?php echo $settings->paypal; ?>">
                                                    <input type="hidden" name="lc" value="US">
                                                    <input type="hidden" name="add" value="1">
                                                    <input type="hidden" name="item_name" value="<?php echo stripslashes($datacourses->courses_name->$j); ?>">
                                                    <input type="hidden" name="amount" value="<?php echo $datacourses->price->$j; ?>">
                                                    <input type="hidden" name="return" value="<?php echo $datacourses->link->$j; ?>">
                                                    <input type="hidden" name="shopping_url" value="<?php echo SITE_URL; ?>">
                                                    <input type="hidden" name="cancel_return" value="<?php echo SITE_URL; ?>">
                                                    <input type="hidden" name="currency_code" value="<?php echo $settings->currency; ?>">
                                                    <!-- <input type="image" src="images/bn.png" border="0" name="submit"> -->
                                                    <a href="javascript:document.courses_<?php echo $i; ?>.submit();" class="btn btn-default btn-transparent btn-lg buyNow" role="button">
                                                        <span>Buy Now for just <?php echo $sym; ?><?php echo $datacourses->price->$j; ?></span>
                                                       
                                                    </a>
                                                     <br/><br/><br/>
                                                </form>
                                            </div>  <!-- End of /.thumbnail -->
                                        </div>  <!-- End of /.col-sm-6 col-md-4 -->
                                    <?php
                                    }
                                }
                            }
                        ?>
                    </div>  <!-- End of /.row -->
                </div>  <!-- End of /.block --> 
            </div>  <!-- End of /.col-md-12 -->
        </div>  <!-- End of /.row -->
    </div>  <!-- End of /.container -->
</section>  <!-- End of Section -->

<section id="catagorie">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="block">
                    <div class="products-heading text-center">
                        <h2>Featured Software Products</h2>
                    </div>  
                    <div class="row">
                        <?php
                            for ($i = 1; $i < 7; $i++) {
                                for ($j = 1; $j <= $settings->total_products; $j++) {
                                    if ($dataproduct->product_name->$j == $data->product->$i) {
                                    ?>
                                        <script type="text/javascript">
                                            allItems.push({ name: "<?php echo $dataproduct->product_name->$j; ?>", img: "<?php echo ADMIN_URL ?>data/images/<?php echo $dataproduct->product_img->$j; ?>" });
                                        </script>
                                        <div class="col-sm-6 col-md-4">
                                            <div class="thumbnail">
                                                <a href="javascript: void(0);">
                                                    <img src="<?php echo ADMIN_URL ?>data/images/<?php echo $dataproduct->product_img->$j; ?>" alt="<?php echo $dataproduct->product_name->$j;?>">
                                                    <h3><?php echo $dataproduct->product_name->$j; ?></h3>
                                                    <div class="caption">
                                                        <p><?php echo $dataproduct->product_desc->$j; ?></p> 
                                                    </div>  <!-- End of /.caption -->
                                                </a>
                                                <!-- <p class="price">Price: <?php //echo $sym; ?><?php //echo $dataproduct->price->$j; ?></p> -->
                                                <form name="products_<?php echo $i; ?>" action="<?php echo paypal_path; ?>" method="post">
                                                    <input type="hidden" name="cmd" value="_xclick">
                                                    <input type="hidden" name="business" value="<?php echo $settings->paypal; ?>">
                                                    <input type="hidden" name="lc" value="US">
                                                    <input type="hidden" name="add" value="1">
                                                    <input type="hidden" name="item_name" value="<?php echo stripslashes($dataproduct->product_name->$j); ?>">
                                                    <input type="hidden" name="amount" value="<?php echo $dataproduct->price->$j; ?>">
                                                    <input type="hidden" name="return" value="<?php echo $dataproduct->link->$j; ?>">
                                                    <input type="hidden" name="currency_code" value="<?php echo $settings->currency; ?>">
                                                    <!-- <input type="image" src="images/bn.png" border="0" name="submit"> -->
                                                    <a href="javascript:document.products_<?php echo $i; ?>.submit();" class="btn btn-default btn-transparent btn-lg buyNow" role="button">
                                                        <span>Buy Now for just <?php echo $sym; ?><?php echo $dataproduct->price->$j; ?></span>
                                                    </a>
                                                    <br/><br/><br/>
                                                </form>
                                            </div>  <!-- End of /.thumbnail -->
                                        </div>  <!-- End of /.col-sm-6 col-md-4 -->
                                    <?php
                                    }
                                }
                            }
                        ?>
                    </div>  <!-- End of /.row -->
                </div>  <!-- End of /.block --> 
            </div>  <!-- End of /.col-md-12 -->
        </div>  <!-- End of /.row -->
    </div>  <!-- End of /.container -->
</section>  <!-- End of Section -->

<section id="catagorie">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="block">
                    <div class="products-heading text-center">
                        <h2>Featured Ebooks</h2>
                    </div>
                    <div class="row">
                        <?php
                            for ($i = 1; $i < 7; $i++) {
                                for ($j = 1; $j <= $settings->total_ebooks; $j++) {
                                    if ($dataebooks->ebooks_name->$j == $data->ebooks->$i) {
                                    ?>
                                        <script type="text/javascript">
                                            allItems.push({ name: "<?php echo $dataebooks->ebooks_name->$j; ?>", img: "<?php echo ADMIN_URL ?>data/images/<?php echo $dataebooks->ebooks_img->$j; ?>" });
                                        </script>
                                        <div class="col-sm-6 col-md-4">
                                            <div class="thumbnail">
                                                <a href="javascript: void(0);">
                                                    <img src="<?php echo ADMIN_URL ?>data/images/<?php echo $dataebooks->ebooks_img->$j; ?>" alt="<?php echo $dataebooks->ebooks_name->$j;?>">
                                                    <h3><?php echo $dataebooks->ebooks_name->$j; ?></h3>
                                                    <div class="caption">
                                                        <p><?php echo $dataebooks->ebooks_desc->$j; ?></p> 
                                                    </div>  <!-- End of /.caption -->
                                                </a>
                                                <!-- <p class="price">Price: <?php //echo $sym; ?><?php //echo $dataebooks->price->$j; ?></p> -->
                                                <form name="ebooks_<?php echo $i; ?>" action="<?php echo paypal_path; ?>" method="post">
                                                    <input type="hidden" name="cmd" value="_xclick">
                                                    <input type="hidden" name="business" value="<?php echo $settings->paypal; ?>">
                                                    <input type="hidden" name="lc" value="US">
                                                    <input type="hidden" name="add" value="1">
                                                    <input type="hidden" name="item_name" value="<?php echo stripslashes($dataebooks->ebooks_name->$j); ?>">
                                                    <input type="hidden" name="amount" value="<?php echo $dataebooks->price->$j; ?>">
                                                    <input type="hidden" name="return" value="<?php echo $dataebooks->link->$j; ?>">
                                                    <input type="hidden" name="currency_code" value="<?php echo $settings->currency; ?>">
                                                    <!-- <input type="image" src="images/bn.png" border="0" name="submit"> -->
                                                    <a href="javascript:document.ebooks_<?php echo $i; ?>.submit();" class="btn btn-default btn-transparent btn-lg buyNow" role="button">
                                                        <span>Buy Now for just <?php echo $sym; ?><?php echo $dataebooks->price->$j; ?></span>
                                                    </a>
                                                     <br/><br/><br/>
                                                </form>
                                            </div>  <!-- End of /.thumbnail -->
                                        </div>  <!-- End of /.col-sm-6 col-md-4 -->
                                    <?php
                                    }
                                }
                            }
                        ?>
                    </div>  <!-- End of /.row -->
                </div>  <!-- End of /.block --> 
            </div>  <!-- End of /.col-md-12 -->
        </div>  <!-- End of /.row -->
    </div>  <!-- End of /.container -->
</section>  <!-- End of Section -->


<?php if ($settings->total_testi > 0) { ?>
    <section id="catagorie">
        <!-- Testimonials -->
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="block">
                        <div class="products-heading text-center">
                            <h2>Testimonials</h2>
                        </div>
                        <div class="row">
                            <?php 
                                for($i = 1; $i <= $settings->total_testi; $i++) {
                                    echo '
                                        <div class="col-sm-12 testimonial_list">
                                            <div class="col-sm-2 text-center">
                                                <img src="admin/data/images/'.$datatesti->testi_img->$i.'" title="" alt="">
                                            </div>
                                            <div class="col-sm-10">
                                                <p>'.stripslashes($datatesti->testi_msg->$i).'
                                                    <br><br>
                                                    <span class="violet" style="color: '.$settings->dark_color.';">'.$datatesti->testi_auth->$i.'</span>
                                                </p>
                                            </div>
                                        </div>
                                    ';
                                }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <style type="text/css">
        .testimonial_list { margin: 1% 0; float: left; }
        .testimonial_list .violet { color: #9d426b; }
        .testimonial_list p { font-style: italic; }
    </style>
<?php } ?>

<section id="catagorie">&nbsp;</section>

<?php
    $start_pur = $datasocial->cust_purchased_min + mt_rand(0, $datasocial->cust_purchased_min);
    $max_pur = $datasocial->cust_purchased_max;
    $start_view = $datasocial->page_view_min;
    $max_view = $datasocial->page_view_max;
?>

<div class="social_proof col-sm-4 col-xs-11">
    <div class="col-md-2 col-sm-1 col-xs-3 social_img" ><img src="<?php echo SITE_URL . 'images/fire.png'; ?>" /></div>
    <a class="close" id="close">x</a>
    <div class="col-sm-10 col-xs-8 proof_text_purchase"><span id="purch_text"><?php echo $start_pur; ?></span> Customers have already purchased this in last 24 hours</div>
    <div class="col-sm-10 col-xs-8 proof_text_view"><span id="view_text"><?php echo $start_view; ?></span> People are viewing this page</div>
</div>

<div class="floating_tab col-sm-4 col-xs-11">
    <div class="col-md-2 col-sm-1 col-xs-3 social_img" ><img src="" id="product_image" /></div>
    <a class="close" id="floatClose">x</a>
    <div class="col-sm-10 col-xs-8 float_text_purchase">Someone just purchased <span id="product_name"></span> from this site <span id="ago"></span> minutes ago.</div>
    <!-- <div class="col-sm-12">
        <a class="close" id="floatClose">X</a>
        <?php
        /* for ($i = 1; $i <= 3; $i++) {
            for ($j = 1; $j <= $settings->total_courses; $j++) {
                if ($datacourses->courses_name->$j == $data->home_course->$i) {
        */ ?>
                    <div class="col-sm-4 floats">
                        <div class="col-sm-3"><div class="min-height"><img src="<?php //echo SITE_URL; ?>/admin/data/images/<?php //echo $datacourses->courses_img->$j; ?>" style="max-width:50px;"></div></div>
                        <div class="col-sm-9 text"><?php //echo stripslashes($datacourses->courses_desc->$j); ?></div>
                    </div>
        <?php /*
                }
            }
        } 
        */ ?> -->
    </div>
</div>

<style type="text/css">
    form { text-align: center; }
    .pull-left img { max-width: 100%; }
    .block .media { padding: 5%; }
    .block .media .media-body h4 { font-size: 27px; }
    .floating_tab, .social_proof { display: none; box-shadow: 5px 5px 5px rgba(0, 0, 0, 0.5); position: fixed; bottom: 2%; left: 2%; padding: 1%; z-index: 99; background: #fff; border: 1px solid #90c322; border-radius: 40px; height: auto; }
    .floating_tab img, .social_proof img { max-width: 100%; }
    .floating_tab .float_text_purchase, .social_proof .proof_text_purchase { padding: 1% 0; }
    .social_proof .proof_text_view { display: none; padding: 1% 0;  }
    .floating_tab a, .social_proof a { position: absolute; top: 0px; right: 4%; }
    #floatClose {  width: 100%; text-align: right; }

    .floating_tab .text { overflow: hidden; text-overflow: ellipsis; padding-left: 0; padding-right: 0; margin-top: 2%; display: -webkit-box; line-height: 16px; max-height: 32px; -webkit-line-clamp: 2; -webkit-box-orient: vertical; }
    .floating_tab .floats { min-height: 60px; border-radius: 10px; background: #c5c5c5; border: 1px solid #f8f8f8; }
    #product_name { font-style: italic; font-weight: bold; }
</style>

<script>
    jQuery(document).ready(function(){
        
        jQuery('#allEbooks').click(function(){
            location.href = "<?php echo SITE_URL; ?>ebooks.php";
        });

        jQuery('#allProducts').click(function(){
            location.href = "<?php echo SITE_URL; ?>products.php";
        });

        jQuery('#allCourses').click(function(){
            location.href = "<?php echo SITE_URL; ?>courses.php";
        });

        var isSetSocial = getCookie("social"), 
            isSetSocialFloat = getCookie("float"),
            isSocial = "<?php echo $datasocial->enable_type ?>";

        if (isSetSocial == null && isSocial == "proof") {
            jQuery('.social_proof').fadeIn("1500");
            var purch_text = true, 
                view_text = false,
                max_view = <?php echo $max_view; ?>,
                max_pur = <?php echo $max_pur; ?>;

            setInterval(function(){
                var isSetSocial = getCookie("social");
                if (isSetSocial == null) {
                    if (!jQuery('.social_proof').is(":visible")) {
                        if (purch_text) { //hide purchase message and show view message
                            jQuery('.social_proof').hide();
                            jQuery('.proof_text_purchase').hide('fast', 'swing', function(){
                                var new_t = parseInt(jQuery('#view_text').text()) + Math.floor((Math.random() * 20) + 1);
                                if (new_t > max_view)
                                    new_t = max_view;
                                jQuery('#view_text').text(new_t);
                                jQuery('.proof_text_view').show();
                                purch_text = false;
                                view_text = true;
                                jQuery('.social_proof').show();
                            });
                        }
                        else {
                            jQuery('.social_proof').hide();
                            jQuery('.proof_text_view').hide('fast', 'swing', function(){
                                var new_t = parseInt(jQuery('#purch_text').text()) + Math.floor((Math.random() * 20) + 1);
                                if (new_t > max_pur)
                                    new_t = max_pur;
                                jQuery('#purch_text').text(new_t);
                                jQuery('.social_proof').show();
                                purch_text = true;
                                view_text = false;
                                jQuery('.proof_text_purchase').show();
                            });
                        }
                    }
                    else {
                        jQuery('.social_proof').hide();
                    }
                }
            }, 5000);
        }

        if (isSocial == "floating" && isSetSocialFloat == null) {
            jQuery('.floating_tab').show();
            var isSetSocial = getCookie("social");
            if (isSetSocial == null) {
                setInterval(function(){
                    setRandomProduct();
                }, 7000);
            }
        }

        jQuery("#close").click(function(){
            jQuery('.social_proof').remove();
            setCookie("social", 1, 5);
        });

        jQuery('#floatClose').click(function(){
            jQuery('.floating_tab').remove();
            setCookie("float", 1, 5);
        });

        if (isSocial == "floating")
            setRandomProduct();
    });

    function setRandomProduct() {
        if (jQuery('.floating_tab').is(":visible")) {
            jQuery('.floating_tab').hide();
        }
        else {
            var item = allItems[Math.floor(Math.random()*allItems.length)];
            jQuery('#product_name').text(item.name);
            jQuery('#product_image').prop('src', item.img);
            jQuery('#ago').text(Math.floor(Math.random() * (59 - 2)) + 2);
            jQuery('.floating_tab').show();
        }
    }
</script>

<?php include('includes/footer.php'); ?>
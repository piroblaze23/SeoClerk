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

<script type="text/javascript">
    var allItems = [];
</script>

<!-- header area start -->
<div class="header-area header-bg style-05" id="home">
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
</div>
<!-- header area end -->

<!-- intro video area start -->
<div class="intro-video-area intro-video-bg  padding-top-140 padding-bottom-120">
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
<?php
    for ($i = 1; $i < 7; $i++) {
        for ($j = 1; $j <= $settings->total_products; $j++) {
            if ($dataproduct->product_name->$j == $data->product->$i) {
?>
                <div class="block-feature-area padding-40">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="block-feature-item"><!-- block feature item -->
                                    <div class="row reorder-xs">
                                        <?php if ($i % 2 != 0) { ?>
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
                                                    <img src="<?php echo ADMIN_URL ?>data/images/<?php echo $dataproduct->product_img->$j; ?>" alt="<?php echo $dataproduct->product_name->$j;?>">
                                                </div>
                                            </div>
                                        <?php } else { ?>
                                            <div class="col-lg-6">
                                                <div class="img-wrapper box-shadow-90">
                                                    <img src="<?php echo ADMIN_URL ?>data/images/<?php echo $dataproduct->product_img->$j; ?>" alt="<?php echo $dataproduct->product_name->$j;?>">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="content-block-area padding-left-50"><!-- content block area -->
                                                    <h4 class="title wow fadeInUp"><?php echo $dataproduct->product_name->$j; ?></h4>
                                                    <p><?php echo $dataproduct->product_desc->$j; ?></p>
                                                    <div class="btn-wrapper margin-top-20 wow fadeInDown">
                                                        <a href="#" class="boxed-btn gd-bg br-5 w180px">Read More</a>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>  
                        </div>
                    </div>
                </div>
<?php 
            }
        }
    }
?>
<!-- block feature area end -->

<!-- price plan area start -->
<div class="price-plan-area padding-top-110 padding-bottom-100" id="pricing">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-7">
                <div class="section-title center-aligned">
                    <h2 class="title">Exclusive pricing plans</h2>
                    <p>solutions with the best.  Incididunt dolor sit amet, adipiscing elitsed tempor  vel metus scelerisque ante sollicitudin.</p>   
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-6">
                <div class="single-price-table-01"><!-- single price table 01 -->
                    <div class="price-header">
                        <span class="name">Trial</span>
                        <div class="price-wrap">$1<span class="month">/Mo</span></div>
                    </div>
                    <div class="price-body">
                        <ul>
                            <li>10 Gb Space</li>
                            <li>24/7 Support</li>
                            <li>Color Available</li>
                            <li>Unlimited Account</li>
                        </ul>
                    </div>
                    <div class="price-footer">
                        <a href="#" class="boxed-btn blank bordered btn-rounded w180px">Purchase</a>
                    </div>
                </div><!-- //.single price table 01 -->
            </div>  
            <div class="col-lg-4 col-md-6 remove-col-padding">
                <div class="single-price-table-01 active"><!-- single price table 01 -->
                    <div class="price-header">
                        <span class="name">Starter</span>
                        <div class="price-wrap">$9.95<span class="month">/Mo</span></div>
                    </div>
                    <div class="price-body">
                        <ul>
                            <li>10 Gb Space</li>
                            <li>24/7 Support</li>
                            <li>Color Available</li>
                            <li>Unlimited Account</li>
                        </ul>
                    </div>
                    <div class="price-footer">
                        <a href="#" class="boxed-btn blank bordered btn-rounded w180px">Purchase</a>
                    </div>
                </div><!-- //.single price table 01 -->
            </div>  
            <div class="col-lg-4 col-md-6">
                <div class="single-price-table-01"><!-- single price table 01 -->
                    <div class="price-header">
                        <span class="name">Professional</span>
                        <div class="price-wrap">$99<span class="month">/Mo</span></div>
                    </div>
                    <div class="price-body">
                        <ul>
                            <li>10 Gb Space</li>
                            <li>24/7 Support</li>
                            <li>Color Available</li>
                            <li>Unlimited Account</li>
                        </ul>
                    </div>
                    <div class="price-footer">
                        <a href="#" class="boxed-btn blank bordered btn-rounded w180px">Purchase</a>
                    </div>
                </div><!-- //.single price table 01 -->
            </div>  

        </div>
    </div>
</div>
<!-- price plan area end -->

<!-- contact area start -->
<div class="contact-area contact-bg" id="contact">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="contact-outer-area"><!-- contact outer area -->
                    <div class="row justify-content-center">
                        <div class="col-lg-8">
                                <div class="content-form-wrapper"><!-- contact form wrapper -->
                                    <div class="section-title center-aligned">
                                        <h2 class="title">Contact us</h2>
                                        <p>solutions with the best.  Incididunt dolor sit amet, adipiscing elitsed tempor  vel metus scelerisque ante sollicitudin.</p>   
                                    </div>
                                    <form action="index.html" class="contact-form" id="get_in_touch">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" placeholder="Your Name">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <input type="email" class="form-control" placeholder="Your Email">
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" placeholder="Subject">
                                                </div>
                                                <div class="form-group textarea">
                                                    <textarea name="message" id="message" class="form-control" placeholder="Message" cols="30" rows="10"></textarea>
                                                </div>
                                                <button class="submit-btn w180px gd-bg" type="submit">Submit Now</button>
                                            </div>
                                        </div>
                                    </form>
                                </div><!-- //. contact form wrapper -->
                        </div>
                    </div>
                </div><!-- //. contact outer area -->
            </div>
        </div>
    </div>
</div>
<!-- contact area end -->

<!-- faq area start -->
<div class="faq-area padding-top-110 padding-bottom-120">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-7">
                <div class="section-title center-aligned">
                    <h2 class="title">General Asked Quetions</h2>
                    <p>solutions with the best.  Incididunt dolor sit amet, adipiscing elitsed tempor  vel metus scelerisque ante sollicitudin.</p>   
                </div>
            </div>
        </div>
        <div class="row reorder-xs">
            <div class="col-lg-6">
                <div class="accordion-wrapper"><!-- accordion wrapper -->
                    <div id="accordion">
                        <div class="card">
                            <div class="card-header" id="headingOne">
                                <h5 class="mb-0">
                                    <a  data-toggle="collapse" role="button" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        How can i buy this landing ?
                                    </a>
                                </h5>
                            </div>
                        
                            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                                <div class="card-body">
                                    Incididunt dolor sit adipiscing elitsed tempor  vel metus scelerisque ante ncididunt dolor sit amet, consectetur adipiscing elitsed tempor.scelerisque ante sollicitudin. 
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="headingTwo">
                                <h5 class="mb-0">
                                    <a class="collapsed" data-toggle="collapse" role="button" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        How can i order this ?
                                    </a>
                                </h5>
                            </div>
                            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                                <div class="card-body">
                                        Incididunt dolor sit adipiscing elitsed tempor  vel metus scelerisque ante ncididunt dolor sit amet, consectetur adipiscing elitsed tempor.scelerisque ante sollicitudin. 
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="headingThree">
                                <h5 class="mb-0">
                                    <a class="collapsed" data-toggle="collapse" role="button" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                        Is it refunadable
                                    </a>
                                </h5>
                            </div>
                            <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                                <div class="card-body">
                                        Incididunt dolor sit adipiscing elitsed tempor  vel metus scelerisque ante ncididunt dolor sit amet, consectetur adipiscing elitsed tempor.scelerisque ante sollicitudin. 
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- //. accordion wrapper -->
            </div>
            <div class="col-lg-6">
                <div class="img-wrapper">
                    <img src="<?php echo THEME_URL;?>img/faq.png" alt="faq image">
                </div>
            </div>
        </div>
    </div>
</div>
<!-- faq area emd -->




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
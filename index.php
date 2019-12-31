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
    $filefaq = "admin/data/faq.txt";
    $filecontact = "admin/data/contact.txt";

    if (file_exists($file)) $data = json_decode(file_get_contents($file));
    if (file_exists($fileproduct)) $dataproduct = json_decode(file_get_contents($fileproduct));
    if (file_exists($filecourses)) $datacourses = json_decode(file_get_contents($filecourses));
    if (file_exists($fileebooks)) $dataebooks = json_decode(file_get_contents($fileebooks));
    if (file_exists($fileseo)) $dataseo = json_decode(file_get_contents($fileseo));
    if (file_exists($filesm)) $datasm = json_decode(file_get_contents($filesm));
    if (file_exists($filered)) $datared = json_decode(file_get_contents($filered));
    if (file_exists($filetesti)) $datatesti = json_decode(file_get_contents($filetesti));
    if (file_exists($filesocial)) $datasocial = json_decode(file_get_contents($filesocial));
    if (file_exists($filefaq)) $datafaq = json_decode(file_get_contents($filefaq));
    if (file_exists($filecontact)) $datacon = json_decode(file_get_contents($filecontact));

    include('includes/header.php');
    
    switch($settings->currency) {
        default: case 'USD': $sym = '$'; break;
        case 'GBP': $sym = '£'; break;
        case 'EUR': $sym = '€'; break;
    }
?>

<script type="text/javascript">
    var allItems = [];
</script>

<style>
    .videowrapper {
    float: none;
    clear: both;
    width: 100%;
    position: relative;
    padding-bottom: 56.25%;
    padding-top: 25px;
    height: 0;
}
.videowrapper iframe {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
}
</style>

<!-- header area start -->
<div class="header-area header-bg style-05" id="home">
    <div class="header-area-inner">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="header-inner"><!-- header inner -->
                        <h1 class="title wow FadeInDown"><?php echo $data->main_headline; ?></p>   
                        <div class="btn-wrapper">
                            <a href="javascript: void(0);" onclick="scrollingTo('pricing');" class="boxed-btn gd-bg"><?php echo $data->sub_headline; ?></a>
                        </div>
                    </div><!-- //. header inner -->
                </div>
            </div>
        </div>
    </div>
    <?php if (count($data->home_img) > 0) { ?>
        <div class="header-right-image">
            <div id="jssor_1" style="position:relative;top:0px;left:0px;width:560px;height:425px;overflow:hidden;">
                <div data-u="slides" style="position:absolute;top:0px;left:0px;width:560px;height:425px;overflow:hidden;">
                <?php
                    for($ban = 1; $ban <= 6; $ban++) {
                        if ($data->home_img->$ban != '') { 
                ?>
                    <div>
                        <img src="<?php echo ADMIN_URL ?>data/images/<?php echo $data->home_img->$ban; ?>" alt="header right image" data-u="image">
                    </div>
                <?php 
                        } 
                    }
                ?>
                </div>
            </div>
        </div>
    <?php } ?>
</div>
<!-- header area end -->

<div class="header-bottom-area padding-top-50 padding-bottom-50"><!-- header bottom area -->
   <div class="container">
       <div class="row">
            <?php $icon = ["", "sketch", "bullseye", "repair"]; ?>
            <?php for ($usp = 1; $usp < 4; $usp++) { ?>
                <div class="col-lg-4 col-md-6">
                    <a href="javascript: void(0);" onclick="scrollingTo('pricing');">
                        <div class="single-feature-item-01 wow zoomIn"><!-- single feature item 01 -->
                            <div class="icon">
                                <i class="flaticon-<?php echo $icon[$usp]; ?>"></i>
                            </div>
                            <div class="content">
                                <?php
                                    $nm = "usp_".$usp."_title";
                                    $mn = "usp_".$usp."_desc";
                                ?>
                                <h4 class="title"><?php echo $data->$nm ?></h4>
                                <p><?php echo $data->$mn; ?></p>
                            </div>
                        </div><!-- //. single feature item 01 -->
                    </a>
                </div>
            <?php } ?>
       </div>
   </div>
</div><!-- header bottom area -->

<!-- intro video area start -->
<?php if ($data->video_enable == 1) { ?>
<div class="intro-video-area intro-video-bg  padding-top-140 padding-bottom-120">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 videowrapper">
                <iframe width="1133" height="641" src="<?php echo $data->video_url; ?>"></iframe>
            </div>
        </div>
    </div>
</div>
<?php } ?>
<!-- intro video area end -->

<!-- why choose us area start -->
<section class="why-chose-us why-choose-us-bg padding-top-140 padding-bottom-55" id="feature">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-7">
                <div class="section-title center-aligned">
                    <h2 class="title"><?php echo $data->buy_us_title; ?></h2>
                    <p><?php echo $data->buy_us_subtitle; ?></p>
                </div>
            </div>
        </div>
        <div class="row">
            <?php $icons = ["", "repair", "bullseye", "folder", "compass-1", "screen", "life-insurance"]; ?>
            <?php for ($buy = 1; $buy < 7; $buy++) { ?>
                <div class="col-lg-4 col-md-6">
                    <div class="why-us-box-01 margin-bottom-30">
                        <div class="icon">
                            <i class="flaticon-<?php echo $icons[$buy];?>"></i>
                        </div>
                        <div class="content">
                            <?php
                                $byt = "buy_us_title_" . $buy;
                                $byst = "buy_us_subtitle_" . $buy;
                            ?>
                            <h4 class="title"><?php echo $data->$byt; ?></h4>
                            <p><?php echo $data->$byst; ?></p>
                        </div>
                    </div>
                </div>
            <?php } ?>
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
    for ($i = 1; $i < 6; $i++) {
        for ($j = 1; $j <= $settings->total_products; $j++) {
            if ($dataproduct->product_name->$j == $data->product->$i) {
?>
                <div class="block-feature-area padding-40">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="block-feature-item"><!-- block feature item -->
                                    <div class="row reorder-xs">
                                        <script type="text/javascript">
                                            allItems.push({ name: "<?php echo $dataproduct->product_name->$j; ?>", img: "<?php echo ADMIN_URL ?>data/images/<?php echo $dataproduct->product_img->$j; ?>" });
                                        </script>
                                        <?php if ($i % 2 != 0) { ?>
                                            <div class="col-lg-6">
                                                <div class="content-block-area padding-right-50"><!-- content block area -->
                                                    <h4 class="title wow fadeInUp"><?php echo $dataproduct->product_name->$j; ?></h4>
                                                    <p><?php echo $dataproduct->product_desc->$j; ?></p>
                                                    <div class="btn-wrapper margin-top-20">
                                                        <a href="javascript: void(0);" onclick="scrollingTo('pricing');" class="boxed-btn gd-bg br-5"><?php echo $data->sub_headline; ?></a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="img-wrapper wow fadeInDown">
                                                    <img src="<?php echo ADMIN_URL ?>data/images/<?php echo $dataproduct->product_img->$j; ?>" alt="<?php echo $dataproduct->product_name->$j;?>">
                                                </div>
                                            </div>
                                        <?php } else { ?>
                                            <div class="col-lg-6">
                                                <div class="img-wrapper">
                                                    <img src="<?php echo ADMIN_URL ?>data/images/<?php echo $dataproduct->product_img->$j; ?>" alt="<?php echo $dataproduct->product_name->$j;?>">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="content-block-area padding-left-50"><!-- content block area -->
                                                    <h4 class="title wow fadeInUp"><?php echo $dataproduct->product_name->$j; ?></h4>
                                                    <p><?php echo $dataproduct->product_desc->$j; ?></p>
                                                    <div class="btn-wrapper margin-top-20 wow fadeInDown">
                                                        <a href="javascript: void(0);" onclick="scrollingTo('pricing');" class="boxed-btn gd-bg br-5"><?php echo $data->sub_headline; ?></a>
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
<div class="price-plan-area padding-top-80 padding-bottom-100" id="pricing">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-7">
                <div class="section-title center-aligned">
                    <h2 class="title"><?php echo $data->pricing_title; ?></h2>
                    <p><?php echo $data->pricing_sub_title; ?></p>
                </div>
            </div>
        </div>
        <div class="row">
            <?php for ($plan = 1; $plan < 4; $plan++) { ?>
                <div class="col-lg-4 col-md-6 <?php echo $plan == 2 ? 'remove-col-padding' : ''; ?>">
                    <div class="single-price-table-01 wow zoomIn <?php echo $plan == 2 ? 'active' : ''; ?>"><!-- single price table 01 -->
                        <div class="price-header">
                            <?php $plan_t = "plan_title_" . $plan; ?>
                            <span class="name"><?php echo $data->$plan_t; ?></span>
                            <?php $plan_p = "plan_price_" . $plan; ?>
                            <div class="price-wrap"><?php echo $sym; ?><?php echo $data->$plan_p; ?></div>
                        </div>
                        <div class="price-body">
                            <ul>
                                <?php for($line = 1; $line < 5; $line++) { ?>
                                    <?php $plan_li = "plan_" . $plan . "_line_" . $line; ?>
                                    <li><?php echo $data->$plan_li; ?></li>
                                <?php } ?>
                            </ul>
                        </div>
                        <div class="price-footer">
                            <?php 
                                $plan_pay = "plan_pay_" . $plan;
                                $plan_red = "plan_ret_" . $plan;
                            ?>
                            <a href="<?php echo $data->$plan_pay; ?>" class="boxed-btn blank bordered btn-rounded" role="button">
                                <span>Access Now</span>
                            </a>
                        </div>
                    </div><!-- //.single price table 01 -->
                </div>
            <?php } ?>
            
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
                                        <p><?php echo $datacon->contact_text; ?></p>   
                                    </div>
                                    <form action="" class="contact-form" id="get_in_touch">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <input id="name" type="text" class="form-control" placeholder="Your Name">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <input type="email" id="email" class="form-control" placeholder="Your Email">
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <input type="text" id="subject" class="form-control" placeholder="Subject">
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
                    <h2 class="title"><?php echo $datafaq->faq_heading; ?></h2>
                    <p><?php echo $datafaq->faq_sub_title; ?></p>   
                </div>
            </div>
        </div>
        <div class="row reorder-xs">
            <div class="col-lg-6">
                <div class="accordion-wrapper" data-id="<?php echo count((array)$datafaq->faq_desc); ?>"><!-- accordion wrapper -->
                    <div id="accordion">
                    <?php for($faq = 1; $faq <= count((array)$datafaq->faq_title); $faq++) { ?>
                        <div class="card">
                            <div class="card-header" id="heading_<?php echo $faq; ?>">
                                <h5 class="mb-0">
                                    <a  data-toggle="collapse" role="button" data-target="#collapse_<?php echo $faq; ?>" aria-expanded="true" aria-controls="collapse_<?php echo $faq; ?>">
                                        <?php echo $datafaq->faq_title->$faq; ?>
                                    </a>
                                </h5>
                            </div>
                            <div id="collapse_<?php echo $faq; ?>" class="collapse <?php echo $faq == 1 ? 'show' : ''; ?>" aria-labelledby="heading_<?php echo $faq; ?>" data-parent="#accordion">
                                <div class="card-body">
                                    <?php echo $datafaq->faq_desc->$faq; ?>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                    </div>
                </div><!-- //. accordion wrapper -->
            </div>
            <div class="col-lg-6">
                <div class="img-wrapper">
                    <img src="<?php echo ADMIN_URL; ?>data/images/faq123.png" alt="faq image">
                </div>
            </div>
        </div>
    </div>
</div>
<!-- faq area emd -->

<?php
    $start_pur = $datasocial->cust_purchased_min + mt_rand(0, $datasocial->cust_purchased_min);
    $max_pur = $datasocial->cust_purchased_max;
    $start_view = $datasocial->page_view_min;
    $max_view = $datasocial->page_view_max;
?>
<div class="social_proof col-sm-4 col-xs-11">
    <div class="row">
        <div class="col-md-2 col-sm-1 col-xs-3 social_img" >
            <img src="<?php echo SITE_URL . 'images/fire.png'; ?>" />
        </div>
        <a class="close" id="close">x</a>
        <div class="col-sm-9 col-xs-8 proof_text_purchase"><span id="purch_text"><?php echo $start_pur; ?></span> Customers have already purchased this in last 24 hours</div>
        <div class="col-sm-9 col-xs-8 proof_text_view"><span id="view_text"><?php echo $start_view; ?></span> People are viewing this page</div>
    </div>
</div>
<div class="floating_tab col-sm-4 col-xs-11">
    <div class="row">
        <div class="col-md-2 col-sm-1 col-xs-3 social_img" >
            <img src="" id="product_image" />
        </div>
        <a class="close" id="floatClose">x</a>
        <div class="col-sm-9 col-xs-8 float_text_purchase">Someone just purchased <span id="product_name"></span> from this site <span id="ago"></span> minutes ago.</div>
    </div>
</div>

<style type="text/css">
    form { text-align: center; }
    .pull-left img { max-width: 100%; }
    .block .media { padding: 5%; }
    .block .media .media-body h4 { font-size: 27px; }
    .floating_tab, .social_proof { display: none; box-shadow: 5px 5px 5px rgba(0, 0, 0, 0.5); position: fixed; bottom: 2%; left: 2%; padding: 1%; z-index: 99; background: #fff; border: 1px solid #f50cd2; border-radius: 40px; height: auto; }
    .floating_tab img, .social_proof img { max-width: 100%; }
    .floating_tab .float_text_purchase, .social_proof .proof_text_purchase { padding: 1% 0; }
    .social_proof .proof_text_view { display: none; padding: 1% 0;  }
    .floating_tab a, .social_proof a { position: absolute; top: 0px; right: 4%; }
    #floatClose {  width: 100%; text-align: right; }

    .floating_tab .text { overflow: hidden; text-overflow: ellipsis; padding-left: 0; padding-right: 0; margin-top: 2%; display: -webkit-box; line-height: 16px; max-height: 32px; -webkit-line-clamp: 2; -webkit-box-orient: vertical; }
    .floating_tab .floats { min-height: 60px; border-radius: 10px; background: #c5c5c5; border: 1px solid #f8f8f8; }
    #product_name { font-style: italic; font-weight: bold; }
</style>

<script src="<?php echo SITE_URL; ?>js/slider-master/js/jssor.slider.min.js"></script>

<script>
    function scrollingTo(div) {
        jQuery('html, body').animate({
            scrollTop: jQuery("#" + div).offset().top + 90
        }, 2000);
    }

    jQuery(document).ready(function(){

        var options = { $AutoPlay: 1 };
        var jssor1_slider = new $JssorSlider$("jssor_1", options);
        console.log(jssor1_slider);

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
                max_view = <?php echo $max_view ? $max_view : 0; ?>,
                max_pur = <?php echo $max_pur ? $max_pur : 0; ?>;

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
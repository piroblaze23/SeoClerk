<?php 
$data = json_decode(file_get_contents('admin/data/ebooks.txt'));
	include('includes/header.php');
	
	switch($settings->currency) {
		default: case 'USD': $sym = '$'; break;
		case 'GBP': $sym = '£'; break;
		case 'EUR': $sym = '€'; break;
	}
?>
<?php $btn = '<input type="submit" class="btn_new" value="Buy Now" />'; ?>

<style type="text/css">.navbar-area.absolute { background-color: #fff; }</style>

<!-- breadcrumb area -->
<div class="breadcrumb-area">
    <div class="container">
        <div class="row">
           <div class="col-lg-12">
                <div class="breadcrumb-inner"><!-- breadcrumb inner -->
                	<div class="row">
                		<div class="col-sm-10">
	                    	<h1 class="page-title">Ebooks</h1>
	                    </div>
	                    <div class="col-sm-2">
		                    <ul class="page-list">
		                        <li><a href="<?php echo SITE_URL;?>">Home</a></li>
		                        <li class="active">Ebooks</li>
		                    </ul>
		                </div>
		            </div>
                    <p class="padding-top-50"><?php echo stripslashes($data->intro); ?></p>
                </div><!-- breadcrumb inner -->
           </div>
        </div>
    </div>
</div>
<!-- breadcrumb area -->

<div class="blog-page-content-area padding-50">
	<div class="container">
		<div class="row">
			<?php for($i = 1; $i <= $settings->total_ebooks; $i++) { ?>
				<div class="col-sm-6 col-md-4">
                    <div class="thumbnail products margin-top-40">
                    	<div class="min-height"><img src="<?php echo SITE_URL; ?>/admin/data/images/<?php echo $data->ebooks_img->$i; ?>" style="max-width:150px;"></div>
                        
                        <h4><?php echo stripslashes($data->ebooks_name->$i); ?></h4>
                        <div class="caption min-height">
                            <p class="content"><?php echo stripslashes($data->ebooks_desc->$i); ?></p> 
                        </div>  <!-- End of /.caption -->
                        <!-- <p class="price">Price: <?php //echo $sym; ?><?php //echo $data->price->$i; ?></p> -->
                        <form name="ebooks_<?php echo $i; ?>" action="<?php echo paypal_path; ?>" method="post">
                            <input type="hidden" name="cmd" value="_xclick">
                            <input type="hidden" name="business" value="<?php echo $settings->paypal; ?>">
                            <input type="hidden" name="lc" value="US">
                            <input type="hidden" name="add" value="1">
                            <input type="hidden" name="item_name" value="<?php echo stripslashes($data->ebooks_name->$i); ?>">
                            <input type="hidden" name="amount" value="<?php echo $data->price->$i; ?>">
                            <input type="hidden" name="return" value="<?php echo $data->link->$i; ?>">
                            <input type="hidden" name="currency_code" value="<?php echo $settings->currency; ?>">
                            <!-- <input type="image" src="images/bn.png" border="0" name="submit"> -->
                            <a href="javascript:document.ebooks_<?php echo $i; ?>.submit();" class="btn boxed-btn gd-bg br-5 buyNow" role="button">
                                <span>Buy Now for just <?php echo $sym; ?><?php echo $data->price->$i; ?></span>
                            </a>
                        </form>
                    </div>  <!-- End of /.thumbnail -->
                </div>  <!-- End of /.col-sm-6 col-md-4 -->
			<?php } ?>
		</div>
	</div>
</div>

<style type="text/css">
	.thumb, form, .title { text-align: center; }
	.breadcrumb-inner p { color: #fff;  }
	.products { border: 1px solid #ddd; border-radius: 10px; padding: 5% 0 5% 5%; }
	.products .content { min-height: 150px;  }
	.products h3 { min-height: 70px;  }
</style>

<?php include('includes/footer.php'); ?>
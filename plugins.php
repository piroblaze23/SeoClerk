<?php
	$data = json_decode(file_get_contents('admin/data/plugins.txt'));
	include('includes/header.php');
	
	switch($settings->currency) {
		default: case 'USD': $sym = '$'; break;
		case 'GBP': $sym = '£'; break;
		case 'EUR': $sym = '€'; break;
	}

	$btn = '<input type="submit" class="btn_new" value="Buy Now" />';
?>

<style type="text/css">.navbar-area.absolute { background-color: #fff; }</style>

<!-- breadcrumb area -->
<div class="breadcrumb-area">
    <div class="container">
        <div class="row">
           <div class="col-lg-12">
                <div class="breadcrumb-inner"><!-- breadcrumb inner -->
                    <h1 class="page-title">Plugins</h1>
                    <ul class="page-list">
                        <li><a href="<?php echo SITE_URL;?>">Home</a></li>
                        <li class="active">Plugins</li>
                    </ul>
                </div><!-- breadcrumb inner -->
           </div>
        </div>
    </div>
</div>
<!-- breadcrumb area -->

<div class="blog-page-content-area padding-50">
	<div class="container">
		<div class="row">
			<p><?php echo stripslashes($data->intro); ?></p>
			<div class="row padding-50">
				<?php for($i = 1; $i <= $settings->total_plugins; $i++) { ?>
					<div class="col-lg-4 col-md-6 products">
                        <div class="single-blog-grid margin-bottom-30">
                        	<div class="thumb">
                        		<img src="<?php echo SITE_URL; ?>/admin/data/images/<?php echo $data->plugins_img->$i; ?>" style="max-width:150px;">
                        	</div>
                            <div class="content">
	                            <h3 class="title"><?php echo stripslashes($data->plugins_name->$i); ?></h3>
	                            <p><?php echo stripslashes($data->plugins_desc->$i); ?></p> 
	                            <!-- <p class="price">Price: <?php //echo $sym; ?><?php //echo $data->price->$i; ?></p> -->
	                            <form name="products_<?php echo $i; ?>" action="<?php echo paypal_path; ?>" method="post">
	                                <input type="hidden" name="cmd" value="_xclick">
	                                <input type="hidden" name="business" value="<?php echo $settings->paypal; ?>">
	                                <input type="hidden" name="lc" value="US">
	                                <input type="hidden" name="add" value="1">
	                                <input type="hidden" name="item_name" value="<?php echo stripslashes($data->plugins_name->$i); ?>">
	                                <input type="hidden" name="amount" value="<?php echo $data->price->$i; ?>">
	                                <input type="hidden" name="return" value="<?php echo $data->link->$i; ?>">
	                                <input type="hidden" name="currency_code" value="<?php echo $settings->currency; ?>">
	                                <!-- <input type="image" src="images/bn.png" border="0" name="submit"> -->
	                                <a href="javascript:document.products_<?php echo $i; ?>.submit();" class="boxed-btn btn btn-lg buyNow blank" role="button">
	                                    <span>Buy Now for just <?php echo $sym; ?><?php echo $data->price->$i; ?></span>
	                                </a>
	                            </form>
	                        </div>
                        </div>  <!-- End of /.thumbnail -->
                    </div>  <!-- End of /.col-sm-6 col-md-4 -->
				<?php } ?>
			</div>
		</div>
	</div>
</div>

<style type="text/css">
	.thumb, form, .title { text-align: center; }
</style>

<?php include('includes/footer.php'); ?>
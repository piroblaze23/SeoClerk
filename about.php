<?php 
	$data = json_decode(file_get_contents('admin/data/about.txt'));
	$settings = json_decode(file_get_contents('admin/data/settings.txt'));
	include('includes/header.php');
	$texts = stripslashes($data->texts);
	$texts = str_replace("\n", "<br>", $texts);
?>

<style type="text/css">.navbar-area.absolute { background-color: #fff; }</style>

<!-- breadcrumb area -->
<div class="breadcrumb-area">
    <div class="container">
        <div class="row">
           <div class="col-lg-12">
                <div class="breadcrumb-inner"><!-- breadcrumb inner -->
                    <div class="row">
                        <div class="col-sm-10">
                            <h1 class="page-title"><?php echo stripslashes($data->main_headline); ?></h1>
                        </div>
                        <div class="col-sm-2">
                            <ul class="page-list">
                                <li><a href="<?php echo SITE_URL;?>">Home</a></li>
                                <li class="active">About</li>
                            </ul>
                        </div>
                    </div>
                    <p class="padding-top-50"><?php echo stripslashes($data->sub_headline); ?></p>
                </div><!-- breadcrumb inner -->
           </div>
        </div>
    </div>
</div>
<!-- breadcrumb area -->

<!-- About Us Text -->
<div class="blog-page-content-area padding-50">
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <h4><?php echo stripslashes($data->content_title); ?></h4>
    			<p><?php echo $texts ?></p>
            </div>
            <div class="col-md-3">
    			<?php 
    				if ($settings->total_banners > 0) {
    					for($i = 1; $i <= $settings->total_banners; $i++) {
    						if ($data->link->$i != '' && $data->banner_img->$i != '')
    							echo '<div style="float: left; width: 100%; margin: 0 0 10px 0;"><a href="'.$data->link->$i.'"><img src="'.SITE_URL.'/admin/data/images/'.$data->banner_img->$i.'" style="max-width: 250px;" /></a></div>';
    					}
    				}
    			?>
            </div>
        </div>
    </div>
</div>

<style type="text/css">
    .breadcrumb-inner p { color: #fff;  }
</style>

<?php include('includes/footer.php'); ?>
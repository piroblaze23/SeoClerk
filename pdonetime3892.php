<?php 
	$data = json_decode(file_get_contents('admin/data/plan_3.txt'));
	$fileproduct = "admin/data/product.txt";
	$fileebooks = "admin/data/ebooks.txt";
	
	include('includes/headermem.php');
	//include('includes/required.php');
	switch($settings->currency) {
		default: case 'USD': $sym = '$'; break;
		case 'GBP': $sym = '£'; break;
		case 'EUR': $sym = '€'; break;
	}

	$cid = $_REQUEST['cid'] != '' ? $_REQUEST['cid'] : 1;
	
	if (file_exists($fileproduct)) $dataproduct = json_decode(file_get_contents($fileproduct));
	if (file_exists($fileebooks)) $dataebooks = json_decode(file_get_contents($fileebooks));
?>
<style type="text/css">.navbar-area.absolute { background-color: #fff; }</style>

<!-- breadcrumb area -->
<div class="breadcrumb-area">
    <div class="container">
        <div class="row">
           <div class="col-lg-12">
                <div class="breadcrumb-inner"><!-- breadcrumb inner -->
                	<div class="row">
                		<div class="col-sm-12">
	                    	<h4 class="page-title">Congratulations on your Purchase</h4>
	                    </div>
	                    <div class="col-sm-4 text-right">
		                    <ul class="page-list">
		                        
		                       
		                    </ul>

		                </div>
		            </div>
                   
                </div><!-- breadcrumb inner -->
           </div>
        </div>
    </div>
</div>
<!-- breadcrumb area -->

<section id="topic">
	
			<div class="col-md-12 hidden-xs">
				<div class="panel panel-success">
					
						<div class="panel-body text-center row">
							<?php
								$cnt = count((array)$dataproduct->product_name);
								foreach ($data->products as $item) {
									for ($p = 0; $p < $cnt; $p++) {
										if ($item != '' & $item == $dataproduct->product_name->$p) {
							?>
											<div class="col-sm-4">
												<div class="min-height">
													<img src="http://<?php echo $_SERVER['HTTP_HOST']; ?>/admin/data/images/<?php echo $dataproduct->product_img->$p; ?>" style="max-width:250px;">
												</div>
												<p><a href="<?php echo $dataproduct->link->$p; ?>" class="btn btn-lg btn-success">Access Your App Now</a></p>
											</div>
							<?php 
										}
									} 
								}

								$cnt = count((array)$dataebooks->ebooks_name);
								foreach ($data->books as $item) {
									for ($p = 0; $p < $cnt; $p++) {
										if ($item != '' & $item == $dataebooks->ebooks_name->$p) {
							?>
											<div class="col-sm-4">
												<div class="min-height">
													<img src="http://<?php echo $_SERVER['HTTP_HOST']; ?>/admin/data/images/<?php echo $dataebooks->ebooks_img->$p; ?>" style="max-width:250px;">
												</div>
												<p><a href="<?php echo $dataebooks->link->$p; ?>" class="btn btn-lg btn-success">Access Your App Now</a></p>
											</div>
							<?php 
										}
									} 
								}
							?>
							
						</div>
					
				</div>
			</div>	<!-- End of /.col-md-8 -->
		</div>
	</div>
</section>

<section>
	<style type="text/css">
		.item-list { padding-left: 0; }
		.breadcrumb-inner p { color: #fff;  }
		.card-header a { text-align: left; }
		.item-list .item { padding: 4%; border-bottom: 1px solid #c8c8c8; }
		.video { display: none; }
		.btn-success { color: #fff !important; background: #d13a75; }
		.btn-success:hover { background: #d13a75; }
		.item a:hover { color: #d13a75; }
		
	</style>
	<script type="text/javascript">
		jQuery(document).ready(function(){
			jQuery('.collapse').collapse();
			showVideo('Module1');
		})
		function showVideo(id) {
			jQuery('.video').hide();
			jQuery('#'+id).show();
		}
	</script>
</section>
<?php include('includes/footermem.php'); ?>
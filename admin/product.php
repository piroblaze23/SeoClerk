<?php require_once 'config.php'; ?>
<?php
	switch($settings->currency) {
		default: case 'USD': $sym = '$'; break;
		case 'GBP': $sym = '£'; break;
		case 'EUR': $sym = '€'; break;
	}
	$file = "data/product.txt";
	if (isset($_POST['Save'])) {
		if (count($_FILES) > 0) {
			if (isset($_FILES['product_img']) && count($_FILES['product_img']['name']) > 0) {
				$i = 1;
				foreach ($_FILES['product_img']['name'] as $k => $v) {
					if ($_FILES['product_img']['tmp_name'][$k] != '') {
						$valid_file = $_FILES['product_img']['tmp_name'][$k];
						$imagesizedata = getimagesize($valid_file);
						if ($imagesizedata !== false) {
							move_uploaded_file($_FILES['product_img']['tmp_name'][$k], 'data/images/'.$_FILES['product_img']['name'][$k]);
							$_REQUEST['product_img'][$i] = $_FILES['product_img']['name'][$k];
						}
						else {
							$_REQUEST['product_img'][$i] = isset($_REQUEST['product_img_old'][$i]) ? $_REQUEST['product_img_old'][$i] : '';
						}
					}
					$i++;
				}
			}
		}
		for($i = 1; $i <= $settings->total_products; $i++) {
			if ($_REQUEST['product_img'][$i] == '' && isset($_REQUEST['product_img_old'][$i])) {
				$_REQUEST['product_img'][$i] = $_REQUEST['product_img_old'][$i];
			}
		}
		$fh = fopen($file, 'w') or die("can't open file");
		fwrite($fh, json_encode($_REQUEST));
		fclose($fh);
	}
	if (file_exists($file))
		$data = json_decode(file_get_contents($file));
?>
		<article class="content forms-page">
		    <div class="title-block">
		        <h3 class="title"> Products Page Content </h3>
		    </div>
		    <section class="section">
		        <div class="row sameheight-container">
		            <div class="col-md-12">
		                <div class="card card-block sameheight-item">
							<form class="form-horizontal" enctype="multipart/form-data" action="" method="post" role="form">
								<div class="form-group row">
									<label class="col-sm-2 control-label">SEO Title</label>
									<div class="col-sm-4">
										<input type="text" class="form-control" name="seo_title" value="<?php echo $data->seo_title; ?>" placeholder="SEO Title" >
									</div>
								</div>
								<div class="form-group row">
									<label class="col-sm-2 control-label">SEO Keywords</label>
									<div class="col-sm-4">
										<input type="text" class="form-control" name="seo_key" value="<?php echo $data->seo_key; ?>" placeholder="SEO Keywords" >
									</div>
								</div>
								<div class="form-group row">
									<label class="col-sm-2 control-label">SEO Description</label>
									<div class="col-sm-4">
										<input type="text" class="form-control" name="seo_des" value="<?php echo $data->seo_des; ?>" placeholder="SEO Descryption" >
									</div>
								</div>
								<hr>
								<div class="form-group row">
									<label class="col-sm-2 control-label">Page Intro</label>
									<div class="col-sm-6">
										<textarea class="form-control" rows="10" cols="30" name="intro"><?php echo stripslashes($data->intro); ?></textarea>
									</div>
								</div>
								<hr>
								<?php for ($i = 1; $i <= $settings->total_products; $i++) { ?>
									<div class="form-group row">
										<label class="col-sm-2 control-label">Product <?php echo $i; ?></label>
										<div class="col-sm-4">
											<input type="text" class="form-control" name="product_name[<?php echo $i; ?>]" value="<?php echo stripslashes($data->product_name->$i); ?>" placeholder="Product Name" >
										</div>
										<div style="text-align: left; padding-right: 0px; width: 2%;margin-top: 7px"><?php echo $sym; ?></div>
										<div class="col-xs-2" style="width: 14.5%; margin-left: -10px;">
											<input type="text" class="form-control" name="price[<?php echo $i; ?>]" value="<?php echo $data->price->$i; ?>" placeholder="Price" >
										</div>
										<div class="col-sm-12">&nbsp;</div>
										<div class="col-sm-2">&nbsp;</div>
										<div class="col-sm-6">
											<input type="text" class="form-control" name="link[<?php echo $i; ?>]" value="<?php echo $data->link->$i; ?>" placeholder="Download Link" >
										</div>
										<div class="col-sm-12">&nbsp;</div>
										<div class="col-sm-2">&nbsp;</div>
										<div class="col-sm-6">
											<div class="col-sm-6"><input type="file" name="product_img[<?php echo $i; ?>]" ></div>
											<div class="col-sm-4">Size 333 x 333</div>
											<div class="col-sm-3"></div>
											<div class="col-sm-12"></div>
											<div class="col-sm-2"></div>
											<?php
												if ($data->product_img->$i != '' && file_exists('data/images/'.$data->product_img->$i)) {
													echo '<div class="col-sm-2"><img src="data/images/'.$data->product_img->$i.'" style="max-width: 150px;" /></div>';
													echo '<input type="hidden" name="product_img_old['.$i.']" value="'.$data->product_img->$i.'" />';
												}
											?>
										</div>
										<div class="col-sm-12">&nbsp;</div>
										<label class="col-sm-2 control-label">Description</label>
										<div class="col-sm-6">
											<textarea class="form-control" rows="8" cols="30" name="product_desc[<?php echo $i; ?>]"><?php echo stripslashes($data->product_desc->$i); ?></textarea>
										</div>
									</div>
									<hr>
								<?php } ?>
								
								<div class="col-xs-2"></div><input type="submit" class="btn btn-primary" value="Save" name="Save" />
								<div style="float: left; width: 100%; margin-top: 4%;"></div>
							</form>
						</div>
					</div>
				</div>
			</section>
		</article>
	</body>
</html>
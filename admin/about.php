<?php require_once 'config.php'; ?>
<?php
	$file = "data/about.txt";
	if (isset($_POST['Save'])) {
		if (count($_FILES) > 0) {
			if (isset($_FILES['banner_img']) && count($_FILES['banner_img']['name']) > 0) {
				$i = 1;
				foreach ($_FILES['banner_img']['name'] as $k => $v) {
					if ($_FILES['banner_img']['tmp_name'][$k] != '') {
						$valid_file = $_FILES['banner_img']['tmp_name'][$k];
						$imagesizedata = getimagesize($valid_file);
						if ($imagesizedata !== false) {
							move_uploaded_file($_FILES['banner_img']['tmp_name'][$k], 'data/images/'.$_FILES['banner_img']['name'][$k]);
							$_REQUEST['banner_img'][$i] = $_FILES['banner_img']['name'][$k];
						}
						else {
							$_REQUEST['banner_img'][$i] = isset($_REQUEST['banner_img_old'][$i]) ? $_REQUEST['banner_img_old'][$i] : '';
						}
					}
					$i++;
				}
			}
		}
		for($i = 1; $i <= $settings->total_products; $i++) {
			if ($_REQUEST['banner_img'][$i] == '' && isset($_REQUEST['banner_img_old'][$i])) {
				$_REQUEST['banner_img'][$i] = $_REQUEST['banner_img_old'][$i];
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
		        <h3 class="title"> About Page Content </h3>
		    </div>
		    <section class="section">
		        <div class="row sameheight-container">
		            <div class="col-md-12">
		                <div class="card card-block sameheight-item">
							<form class="form-horizontal" enctype="multipart/form-data" action="" method="post" role="form">
								<div class="form-group row">
									<label class="col-sm-2 control-label">Title</label>
									<div class="col-sm-4">
										<input type="text" class="form-control" value="<?php echo stripslashes($data->main_headline); ?>" placeholder="Main Title" name="main_headline">
									</div>
								</div>
								<div class="form-group row">
									<label class="col-sm-2 control-label">Sub Title</label>
									<div class="col-sm-4">
										<input type="text" class="form-control" value="<?php echo stripslashes($data->sub_headline); ?>" placeholder="Sub Title" name="sub_headline">
									</div>
								</div>
								<div class="form-group row">
									<label class="col-sm-2 control-label">Content Title</label>
									<div class="col-sm-4">
										<input type="text" class="form-control" value="<?php echo stripslashes($data->content_title); ?>" placeholder="Content Title" name="content_title">
									</div>
								</div>
								<div class="form-group row">
									<label class="col-sm-2 control-label">Text</label>
									<div class="col-sm-6">
										<textarea class="form-control" rows="15" cols="30" name="texts"><?php echo stripslashes($data->texts); ?></textarea>
									</div>
								</div>
								<hr>
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
										<input type="text" class="form-control" name="seo_des" value="<?php echo $data->seo_des;  ?>" placeholder="SEO Descryption" >
									</div>
								</div>
								<hr>
								<?php for ($i = 1; $i <= $settings->total_banners; $i++) { ?>
									<div class="form-group row">
										<label class="col-sm-2 control-label">Banner <?php echo $i; ?></label>
										<div class="col-sm-4">
											<input type="text" class="form-control" name="link[<?php echo $i; ?>]" value="<?php echo $data->link->$i; ?>" placeholder="Banner Link" >
										</div>
										<div class="col-sm-12" >&nbsp;</div>
										<div class="col-sm-2">&nbsp;</div>
										<div class="col-sm-6">
											<span class="col-sm-6"><input type="file" name="banner_img[<?php echo $i; ?>]" ></span>
											<div class="col-sm-12">(size 250x250)</div>
											<div class="col-sm-12">&nbsp;</div>
											<?php
												if ($data->banner_img->$i != '' && file_exists('data/images/'.$data->banner_img->$i)) {
													echo '<img src="data/images/'.$data->banner_img->$i.'" />';
													echo '<input type="hidden" name="banner_img_old['.$i.']" value="'.$data->banner_img->$i.'" />';
												}
											?>
										</div>
									</div>
								<?php } ?>
								<hr>
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

<?php 
	/*
	 *  Logo
		Main Headline
		Subheadline
		Paypal Email
		testimonial1 content, testimonial1 image (max 100x100), testimonial1 name
		testimonial2 content, testimonial2 image (max 100x100), testimonial2 name
		and so on upto testimonial5
	 */
?>
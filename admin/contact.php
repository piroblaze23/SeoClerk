<?php require_once 'config.php'; ?>
<?php
	$file = "data/contact.txt";
	if (isset($_POST['Save'])) {
		$fh = fopen($file, 'w') or die("can't open file");
		fwrite($fh, json_encode($_REQUEST));
		fclose($fh);
	}
	if (file_exists($file))
		$data = json_decode(file_get_contents($file));
?>

		<article class="content forms-page">
		    <div class="title-block">
		        <h3 class="title"> Contact Page Content </h3>
		    </div>
		    <section class="section">
		        <div class="row sameheight-container">
		            <div class="col-md-12">
		                <div class="card card-block sameheight-item">
							<form class="form-horizontal" enctype="multipart/form-data" action="" method="post" role="form">
								<div class="form-group row">
									<label class="col-sm-2 control-label">Address</label>
									<div class="col-sm-4">
										<textarea class="form-control" rows="8" name="address"><?php echo stripslashes($data->address); ?></textarea>
									</div>
								</div>
								<div class="form-group row">
									<label class="col-sm-2 control-label">Mobile</label>
									<div class="col-sm-4">
										<input type="text" class="form-control" value="<?php echo stripslashes($data->mobile); ?>" name="mobile" />
									</div>
								</div>
								<div class="form-group row">
									<label class="col-sm-2 control-label">Phone</label>
									<div class="col-sm-4">
										<input type="text" class="form-control" value="<?php echo stripslashes($data->phone); ?>" name="phone" />
									</div>
								</div>
								<div class="form-group row">
									<label class="col-sm-2 control-label">Contact Text</label>
									<div class="col-sm-4">
										<textarea class="form-control" rows="8" name="contact_text"><?php echo stripslashes($data->contact_text); ?></textarea>
									</div>
								</div>
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
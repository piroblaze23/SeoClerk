<?php require_once 'config.php'; ?>
<?php
	switch($settings->currency) {
		default: case 'USD': $sym = '$'; break;
		case 'GBP': $sym = '£'; break;
		case 'EUR': $sym = '€'; break;
	}	

	$file = "data/redirect.txt";
	if (isset($_POST['Save'])) {
		if (count($_FILES) > 0) {
			if (isset($_FILES['ebook_img']) && count($_FILES['ebook_img']['name']) > 0) {
				$i = 1;
				$valid_file = $_FILES['ebook_img']['tmp_name'];
				$imagesizedata = getimagesize($valid_file);
				if ($imagesizedata !== false) {
					move_uploaded_file($_FILES['ebook_img']['tmp_name'], 'data/images/'.$_FILES['ebook_img']['name']);
					$_REQUEST['ebook_img'] = $_FILES['ebook_img']['name'];
				}
				else {
					$_REQUEST['ebook_img'] = isset($_REQUEST['ebook_img_old']) ? $_REQUEST['ebook_img_old'] : '';
				}
			}
		}
		if ($_REQUEST['ebook_img'] == '' && isset($_REQUEST['ebook_img_old'])) {
			$_REQUEST['ebook_img'] = $_REQUEST['ebook_img_old'];
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
		        <h3 class="title"> Auto Redirect Page Content </h3>
		    </div>
		    <section class="section">
		        <div class="row sameheight-container">
		            <div class="col-md-12">
		                <div class="card card-block sameheight-item">
							<form class="form-horizontal" enctype="multipart/form-data" action="" method="post" role="form">
								<div class="form-group row">
									<label class="col-sm-2 control-label">Course Name</label>
									<div class="col-sm-6">
										<input type="text" class="form-control" name="course_name" value="<?php echo stripslashes($data->course_name); ?>" placeholder="Course Name" >
									</div>
								</div>	
								<div class="form-group row">
									<label class="col-sm-2 control-label">Course Description</label>
									<div class="col-sm-6">
										<textarea class="form-control" rows="10" cols="30" name="course_desc"><?php echo stripslashes($data->course_desc); ?></textarea>
									</div>
								</div>
								<div class="form-group row">
									<label class="col-sm-2 control-label">Course URL</label>
									<div class="col-sm-6">
										<input type="text" class="form-control" name="course_url" value="<?php echo stripslashes($data->course_url); ?>" placeholder="Course URL" >
									</div>
								</div>	
								<div class="form-group row">
									<label class="col-sm-2 control-label">Course Price</label>
									<div style="width: 2%; margin-top: 7px"><?php echo $sym; ?></div>
									<div class="col-xs-2" style="width: 14.5%; margin-left: -10px;">
										<input type="text" class="form-control" name="price" value="<?php echo $data->price; ?>" placeholder="Price" >
									</div>
								</div>	
								<div class="form-group row">
									<label class="col-sm-2 control-label">Ebook Location</label>
									<div class="col-sm-6">
										<div class="col-sm-6"><input type="file" name="ebook_img" ></div>
										<div class="col-sm-4">Size 333 x 333</div>
										<div class="col-sm-3"></div>
										<div class="col-sm-12"></div>
										<div class="col-sm-2"></div>
										<?php
											if ($data->ebook_img != '' && file_exists('data/images/'.$data->ebook_img)) {
												echo '<div class="col-sm-2"><img src="data/images/'.$data->ebook_img.'" style="max-width: 150px;" /></div>';
												echo '<input type="hidden" name="ebook_img_old" value="'.$data->ebook_img.'" />';
											}
										?>
									</div>
								</div>
								
								<!-- <div class="form-group row">
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
								</div> -->
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
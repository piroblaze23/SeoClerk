<?php 
	require_once 'config.php';

	switch($settings->currency) {
		case 'USD': $sym = '$'; break;
		case 'GBP': $sym = '£'; break;
		case 'EUR': $sym = '€'; break;
	}
	$file = "data/video.txt";
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
		        <h3 class="title"> Video Content </h3>
		    </div>
		    <section class="section">
		        <div class="row sameheight-container">
		            <div class="col-md-12">
		                <div class="card card-block sameheight-item">
							<form class="form-horizontal" enctype="multipart/form-data" action="" method="post" role="form">
								<div class="form-group row">
									<label class="col-sm-3 control-label">Enable This Page</label>

									<div class="col-sm-4">
										<input type="checkbox" class="" value="1"
											   name="video_enable" <?php echo (isset($data->video_enable)?$data->video_enable:"") == "1" ? "checked" : ""; ?>>
									</div>
								</div>
								<div class="form-group row">
									<label class="col-sm-3 control-label">Main Headline</label>
									<div class="col-sm-4">
										<input type="text" class="form-control" value="<?php echo isset($data->main_headline)? $data->main_headline:""; ?>" name="main_headline">
									</div>
								</div>
								<div class="form-group row">
									<label class="col-sm-3 control-label">Sub Headline</label>
									<div class="col-sm-4">
										<input type="text" class="form-control" value="<?php echo isset($data->sub_headline)? $data->sub_headline:""; ?>" name="sub_headline">
									</div>
								</div>
								<?php for ($i = 1; $i <= $settings->total_videos; $i++) { ?>
									<div class="form-group row">
										<label class="col-sm-3 control-label">Video <?php echo $i; ?></label>
										<div class="col-sm-4">
											<input type="text" class="form-control" name="video_name[<?php echo $i; ?>]" value="<?php echo stripslashes($data->video_name->$i); ?>" placeholder="Video Name" >
										</div>
										<div class="col-sm-1" style="text-align: left; padding-right: 0px; width: 2%;margin-top: 7px"><?php echo $sym; ?></div>
										<div class="col-sm-2" style="width: 14.5%; margin-left: -10px;">
											<input type="text" class="form-control" name="price[<?php echo $i; ?>]" value="<?php echo $data->price->$i; ?>" placeholder="Price" >
										</div>
										<div class="col-sm-12" style="width: 100%; margin-top: 2%;"></div>
										<label class="col-sm-3 control-label">Video Url</label>
										<div class="col-sm-6">
											<textarea class="form-control" rows="8" cols="30" name="link[<?php echo $i; ?>]"><?php echo stripslashes($data->link->$i); ?></textarea>
										</div>
										<div class="col-sm-12" style="width: 100%; margin-top: 2%;"></div>
										<label class="col-sm-3 control-label">Description</label>
										<div class="col-sm-6">
											<textarea class="form-control" rows="8" cols="30" name="video_desc[<?php echo $i; ?>]"><?php echo stripslashes($data->video_desc->$i); ?></textarea>
										</div>
										<div class="col-sm-12" style="width: 100%; margin-top: 2%;"></div>
										<label class="col-sm-3 control-label">Buy Button Text <?php echo $i; ?></label>
										<div class="col-sm-6">
											<input type="text" class="form-control" name="video_buy_button[<?php echo $i; ?>]" value="<?php echo stripslashes($data->video_buy_button->$i); ?>" placeholder="Buy button text" >
										</div>
									</div>
								<?php } ?>
								
								<div class="form-group row">
									<label class="col-sm-3 control-label">SEO Title</label>
									<div class="col-sm-4">
										<input type="text" class="form-control" name="seo_title" value="<?php echo $data->seo_title; ?>" placeholder="SEO Title" >
									</div>
								</div>
								<div class="form-group row">
									<label class="col-sm-3 control-label">SEO Keywords</label>
									<div class="col-sm-4">
										<input type="text" class="form-control" name="seo_key" value="<?php echo $data->seo_key; ?>" placeholder="SEO Keywords" >
									</div>
								</div>
								<div class="form-group row">
									<label class="col-sm-3 control-label">SEO Description</label>
									<div class="col-sm-4">
										<input type="text" class="form-control" name="seo_des" value="<?php echo $data->seo_des; ?>" placeholder="SEO Descryption" >
									</div>
								</div>
								<div class="col-sm-2"></div><input type="submit" class="btn btn-primary" value="Save" name="Save" />
								<div style="float: left; width: 100%; margin-top: 4%;"></div>
							</form>
						</div>
					</div>
				</div>
			</section>
		</article>
	</body>
</html>
<?php require_once 'config.php'; ?>
<?php
	$file = "data/smhome.txt";
	if (isset($_POST['Save'])) {
		if (count($_FILES) > 0) {
			if (isset($_FILES['testi_img']) && count($_FILES['testi_img']['name']) > 0) {
				$i = 1;
				foreach ($_FILES['testi_img']['name'] as $k => $v) {
					if ($_FILES['testi_img']['tmp_name'][$k] != '') {
						$valid_file = $_FILES['testi_img']['tmp_name'][$k];
						$imagesizedata = getimagesize($valid_file);
						if ($imagesizedata !== false) {
							move_uploaded_file($_FILES['testi_img']['tmp_name'][$k], 'data/images/'.$_FILES['testi_img']['name'][$k]);
							$_REQUEST['testi_img'][$i] = $_FILES['testi_img']['name'][$k];
						}
						else
							$_REQUEST['testi_img'][$i] = (isset($_REQUEST['testi_img_old'][$i])) ? $_REQUEST['testi_img_old'][$i] : '';
					}
					$i++;
				}
			}
		}
		
		for($i = 1; $i < 6; $i++)
			if ($_REQUEST['testi_img'][$i] == '' && isset($_REQUEST['testi_img_old'][$i]))
				$_REQUEST['testi_img'][$i] = $_REQUEST['testi_img_old'][$i];
		
		$fh = fopen($file, 'w') or die("can't open file");
		fwrite($fh, json_encode($_REQUEST));
		fclose($fh);
	}
	if (file_exists($file))
		$data = json_decode(file_get_contents($file));
?>
			<div id="page-wrapper">
				<div class="row">
					<div class="col-lg-12">
						<h1 class="page-header">Social Media Services Page Content</h1>
					</div>
				</div>
				<div class="col-lg-12">
					<form class="form-horizontal" enctype="multipart/form-data" action="" method="post" role="form">
						<div class="form-group">
							<label class="col-sm-2 control-label">Main Headline</label>
							<div class="col-sm-4">
								<input type="text" class="form-control" value="<?php echo $data->main_headline; ?>" name="main_headline">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">Sub Headline</label>
							<div class="col-sm-4">
								<input type="text" class="form-control" value="<?php echo $data->sub_headline; ?>" name="sub_headline">
							</div>
						</div>
						
	
						<?php
							
							$allData = array( 
												0 => array('title' => 'Twitter Followers', 'name' => 'tw_fo_tx', 'price' => 'tw_fo_pr'),
												1 => array('title' => 'Instagram Followers', 'name' => 'in_fo_tx', 'price' => 'in_fo_pr'),
												2 => array('title' => 'Facebook Like', 'name' => 'fb_lk_tx', 'price' => 'fb_lk_pr'),
												3 => array('title' => 'Youtube Views', 'name' => 'yo_vw_tx', 'price' => 'yo_vw_pr'),
												4 => array('title' => 'Twitter Retweet', 'name' => 'tw_rt_tx', 'price' => 'tw_rt_pr'),
												5 => array('title' => 'Instagram Likes', 'name' => 'in_lk_tx', 'price' => 'in_lk_pr'),
												6 => array('title' => 'Facebook Shares', 'name' => 'fb_sh_tx', 'price' => 'fb_sh_pr'),
												7 => array('title' => 'Youtube Subscribes', 'name' => 'yo_su_tx', 'price' => 'yo_su_pr')
											);
							foreach ($allData as $k => $v) {
							?>
								<div class="form-group">
									<label class="col-sm-2 control-label" style="padding: 0px 15px 0px 0px;"><?php echo $v['title']; ?></label>
									<?php for ($j=1; $j <= 6; $j++) { ?>
										<?php if ($j != 1) { ?>
											<div class="col-sm-2"></div>
										<?php } ?>
											<div class="col-sm-10" style="padding: 0px;">
												<div class="col-sm-6">
													<input type="text" class="form-control" name="<?php echo $v['name']; ?>[<?php echo $j; ?>]" value="<?php echo $data->$v['name']->$j; ?>" placeholder="Text Desc" >
												</div>
												<div class="col-sm-4" style="padding-left: 0px;">
													<span class="col-sm-1" style="line-height: 2; padding-right: 0;">$</span>
													<span class="col-sm-5" style="padding-left: 10px;"><input type="text" maxlength="5" class="form-control" name="<?php echo $v['price']; ?>[<?php echo $j; ?>]" value="<?php echo $data->$v['price']->$j; ?>" placeholder="Price" ></span>
												</div>
											</div>
											<div style="float: left; width: 100%; margin-bottom: 1%;"></div>
									<?php } ?>
								</div>
							<?php
							}
						?>
						
						<?php for ($i = 1; $i < 6; $i++) { ?>
							<div class="form-group">
								<label class="col-sm-2 control-label">Testimonial <?php echo $i; ?></label>
								<div class="col-xs-4">
									<input type="text" class="form-control" name="testi_auth[<?php echo $i; ?>]" value="<?php echo $data->testi_auth->$i; ?>" placeholder="Author" >
								</div>
								<div class="col-xs-12">&nbsp;</div>
								<div class="col-sm-2" style="text-align: right;"><label class="control-label">Photo</label><br/>(max 100 x 100)</div>
								<div class="col-sm-8">
									<?php
										if ($data->testi_img->$i != '' && file_exists('data/images/'.$data->testi_img->$i)) {
											echo '<div class="col-xs-2"><img src="data/images/'.$data->testi_img->$i.'" /></div>';
											echo '<input type="hidden" name="testi_img_old['.$i.']" value="'.$data->testi_img->$i.'" />';
										}
									?>
									<div class="col-xs-6"><input type="file" name="testi_img[<?php echo $i; ?>]" ></div>
								</div>
								<div class="col-sm-12">&nbsp;</div>
								<label class="col-sm-2 control-label">Testimonial Content</label>
								<div class="col-sm-6" style="margin-top: 1%;">
									<textarea class="form-control" rows="3" name="testi_msg[<?php echo $i; ?>]"><?php echo stripslashes($data->testi_msg->$i); ?></textarea>
								</div>
							</div>
						<?php } ?>
						<div class="form-group">
							<label class="col-sm-2 control-label">SEO Title</label>
							<div class="col-sm-4">
								<input type="text" class="form-control" name="seo_title" value="<?php echo $data->seo_title; ?>" placeholder="SEO Title" >
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">SEO Keywords</label>
							<div class="col-sm-4">
								<input type="text" class="form-control" name="seo_key" value="<?php echo $data->seo_key; ?>" placeholder="SEO Keywords" >
							</div>
						</div>
						<div class="form-group">
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
	</body>
</html>
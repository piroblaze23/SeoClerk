<?php require_once 'config.php'; ?>
<?php
	$file = "data/settings.txt";
	if (file_exists($file))
		$old_data = json_decode(file_get_contents($file));
	if (isset($_POST['Save'])) {

		if ($_POST['https'] == "on") {
			$cont = "RewriteEngine On
RewriteCond %{HTTPS} !=on
RewriteRule ^(.*)$ https://%{HTTP_HOST}%{REQUEST_URI} [L,R=301]";
		}
		else {
			$cont = "RewriteEngine On
RewriteCond %{HTTPS} on
RewriteRule ^(.*)$ http://%{HTTP_HOST}%{REQUEST_URI} [R=301,L]";
		}

		$f = fopen("../.htaccess", "w");
		fwrite($f, $cont);
		fclose($f);

		if (count($_FILES) > 0) {
			if (isset($_FILES['logo']) && $_FILES['logo']['tmp_name'] != '') {
				$valid_file = $_FILES['logo']['tmp_name'];
				$imagesizedata = getimagesize($valid_file);
				if ($imagesizedata !== false) {
					move_uploaded_file($_FILES['logo']['tmp_name'], 'data/images/' . $_FILES['logo']['name']);
					$_REQUEST['logo'] = $_FILES['logo']['name'];
				}
				else {
					$_REQUEST['logo'] = $_REQUEST['old_logo'];
					unset($_REQUEST['old_logo']);
				}
			}
			else {
				$_REQUEST['logo'] = $_REQUEST['old_logo'];
				unset($_REQUEST['old_logo']);
			}
		}
		
		$_REQUEST['pass'] = ($_REQUEST['pass'] != '') ? md5($_REQUEST['pass']) : $old_data->pass;
		
		$fh = fopen($file, 'w') or die("can't open file");
		fwrite($fh, json_encode($_REQUEST));
		fclose($fh);
	}
	if (file_exists($file))
		$data = json_decode(file_get_contents($file));

	/*$data->dark_color = $data->dark_color == "" ? "#73beff" : $data->dark_color;
	$data->light_color = $data->light_color == "" ? "#2492f2" : $data->light_color;*/
?>
		<article class="content forms-page">
		    <div class="title-block">
		        <h3 class="title"> Settings </h3>
		    </div>
		    <section class="section">
		        <div class="row sameheight-container">
		            <div class="col-md-12">
		                <div class="card card-block sameheight-item">
							<form class="form-horizontal" enctype="multipart/form-data" action="" method="post" role="form">
								<div class="form-group row">
									<label class="col-sm-2 control-label">Logo</label>
									<div class="col-sm-4">
										<input type="file" name="logo">
										<?php 
											if ($data->logo != '' && file_exists('data/images/'.$data->logo)) {
												echo '<img src="data/images/'.$data->logo.'" />';
												echo '<input type="hidden" name="old_logo" value="'.$data->logo.'" />';
											}
										?>
									(Recommended Size: 200x125px)</div>
								</div>
								<div class="form-group row">
									<label class="col-sm-2 control-label">Paypal</label>
									<div class="col-sm-4">
										<input type="text" class="form-control" value="<?php echo $data->paypal; ?>" placeholder="Paypal Email" name="paypal">
									</div>
								</div>
								<div class="form-group row">
									<label class="col-sm-2 control-label">Currency</label>
									<div class="col-sm-2">
										<select class="form-control" name="currency">
											<option value="USD" <?php echo $data->currency == 'USD' ? 'selected' : ''; ?>>$ USD</option>
											<option value="GBP" <?php echo $data->currency == 'GBP' ? 'selected' : ''; ?>>£ GBP</option>
											<option value="EUR" <?php echo $data->currency == 'EUR' ? 'selected' : ''; ?>>€ EURO</option>
											<option value="CAD" <?php echo $data->currency == 'CAD' ? 'selected' : ''; ?>>$ Canadian Dollar</option>
											<option value="AUD" <?php echo $data->currency == 'AUD' ? 'selected' : ''; ?>>$ Australian Dollar</option>
											<option value="HKD" <?php echo $data->currency == 'HKD' ? 'selected' : ''; ?>>$ Hongkong Dollar</option>
										</select>
									</div>
								</div>
								<div class="form-group row">
		                            <label class="col-sm-2 control-label">HTTPS</label>
		                            <div class="col-sm-8">
		                                <label for="enable_yes">
		                                    <input class="radio" type="radio" id="enable_yes" name="https" value="on" <?php echo $data->https == "on" ? "checked=checked" : "";?> /> 
		                                    <span>On</span>
		                                </label> &nbsp;&nbsp;&nbsp;
		                                <label for="enable_no">
		                                    <input class="radio" type="radio" id="enable_no" name="https" value="off" <?php echo $data->https == "off" ? "checked=checked" : "";?> />
		                                    <span>Off</span>
		                                </label>
		                            </div>
		                        </div>
		                        <div class="form-group row">
									<label class="col-sm-2 control-label">Total Products</label>
									<div class="col-sm-1">
										<input type="text" class="form-control blur" value="<?php echo $data->total_products; ?>" placeholder="Total Producs" name="total_products">
									</div>
								</div>
								<div class="form-group row">
									<label class="col-sm-2 control-label">Total Ebooks</label>
									<div class="col-sm-1">
										<input type="text" class="form-control blur" value="<?php echo isset($data->total_ebooks) ? $data->total_ebooks : 0; ?>" placeholder="Total Ebooks" name="total_ebooks">
									</div>
								</div>
								<div class="form-group row">
									<label class="col-sm-2 control-label">Total Services</label>
									<div class="col-sm-1">
										<input type="text" class="form-control blur" value="<?php echo isset($data->total_services) ? $data->total_services : 0; ?>" placeholder="Total Services" name="total_services">
									</div>
								</div>
								<div class="form-group row">
									<label class="col-sm-2 control-label">Total FAQs</label>
									<div class="col-sm-1">
										<input type="text" class="form-control blur" value="<?php echo isset($data->total_faq) ? $data->total_faq : 0; ?>" placeholder="Total FAQs" name="total_faq">
									</div>
								</div>
								<div class="form-group row">
									<label class="col-sm-2 control-label">Total Banners</label>
									<div class="col-sm-2">
										<select class="form-control" name="total_banners">
											<option value="0" <?php echo $data->total_banners == 0 ? 'selected=selected' : ''; ?>>0</option>
											<option value="1" <?php echo $data->total_banners == 1 ? 'selected=selected' : ''; ?>>1</option>
											<option value="2" <?php echo $data->total_banners == 2 ? 'selected=selected' : '' ?>>2</option>
											<option value="3" <?php echo $data->total_banners == 3 ? 'selected=selected' : ''; ?>>3</option>
											<option value="4" <?php echo $data->total_banners == 4 ? 'selected=selected' : ''; ?>>4</option>
											<option value="5" <?php echo $data->total_banners == 5 ? 'selected=selected' : ''; ?>>5</option>
										</select>
									</div>
								</div>
								<div class="form-group row">
									<label class="col-sm-2 control-label">Testimonials</label>
									<div class="col-sm-2">
										<select class="form-control" name="total_testi">
											<option value="0" <?php echo $data->total_testi == 0 ? 'selected=selected' : ''; ?>>0</option>
											<option value="1" <?php echo $data->total_testi == 1 ? 'selected=selected' : ''; ?>>1</option>
											<option value="2" <?php echo $data->total_testi == 2 ? 'selected=selected' : '' ?>>2</option>
											<option value="3" <?php echo $data->total_testi == 3 ? 'selected=selected' : ''; ?>>3</option>
											<option value="4" <?php echo $data->total_testi == 4 ? 'selected=selected' : ''; ?>>4</option>
											<option value="5" <?php echo $data->total_testi == 5 ? 'selected=selected' : ''; ?>>5</option>
										</select>
									</div>
								</div>
								<!--<div class="form-group row">
									<label class="col-sm-2 control-label">Site Color Scheme</label>
									<div class="col-sm-10">
										<div class="col-sm-1" style="padding: 0px; width: 6%;">
											<div style="position: relative; z-index: 9; float: left; height: 30px; width: 30px; background-color: <?php echo $data->dark_color; ?>" id="dark_color_div">&nbsp;</div>
											<input type="hidden" class="form-control color" id="dark_color" placeholder="Dark Color" name="dark_color">
										</div>
										<div class="col-sm-8" style="padding: 0px;">Primary Color (click to change)</div>
									</div>
									<div class="col-sm-12">&nbsp;</div>
									<div class="col-sm-2">&nbsp;</div>
								
									<div class="col-sm-10">
										<div class="col-sm-1" style="padding: 0px; width: 6%;">
											<div style="position: relative; z-index: 9; float: left; height: 30px; width: 30px; background-color: <?php echo $data->light_color; ?>" id="light_color_div">&nbsp;</div>
											<input type="hidden" class="form-control color" id="light_color" placeholder="Light Color" name="light_color">
										</div>
										<div class="col-sm-8" style="padding: 0px;">Secondary Color (click to change)</div>
									</div>
								</div> -->
								<div class="form-group row">
									<label class="col-sm-2 control-label">About</label>
									<div class="col-sm-5">
										<textarea class="form-control" rows="10" cols="20" name="about"><?php echo stripslashes($data->about); ?></textarea>
									</div>
								</div>
								<div class="form-group row">
									<label class="col-sm-2 control-label">Email</label>
									<div class="col-sm-4">
										<input type="text" class="form-control" name="email" value="<?php echo $data->email; ?>" placeholder="Email" >
									</div>
								</div>
								<div class="form-group row">
									<label class="col-sm-2 control-label">Admin Password</label>
									<div class="col-sm-10">
										<div class="col-sm-4" style="padding-left: 0;">
											<input type="text" class="form-control" name="pass" placeholder="Password" >
										</div>
										<div class="col-sm-9">
											<div class="help-block">Leave blank if dont want to update.</div>
										</div>
									</div>
								</div>
								<div class="form-group row">
									<label class="col-sm-2 control-label">Copyright</label>
									<div class="col-sm-4">
										<input type="text" class="form-control" name="copyright" value="<?php echo stripslashes($data->copyright); ?>" placeholder="Copyright" >
									</div>
								</div>
								<div class="form-group row">
									<label class="col-sm-2 control-label">FB URL</label>
									<div class="col-sm-4">
										<input type="text" class="form-control" name="fblink" value="<?php echo stripslashes($data->fblink); ?>" placeholder="FB URL" >
									</div>
								</div>
								<div class="form-group row">
									<label class="col-sm-2 control-label">Twitter URL</label>
									<div class="col-sm-4">
										<input type="text" class="form-control" name="twlink" value="<?php echo stripslashes($data->twlink); ?>" placeholder="Twitter URL" >
									</div>
								</div>
								<div class="form-group row">
									<label class="col-sm-2 control-label">Pinterest URL</label>
									<div class="col-sm-4">
										<input type="text" class="form-control" name="pnlink" value="<?php echo stripslashes($data->pnlink); ?>" placeholder="Pinterest URL" >
									</div>
								</div>
								
								<div class="col-xs-2"></div><input type="submit" class="btn btn-primary" value="Save" name="Save" />
								<div style="float: left; width: 100%; margin-top: 4%;"></div>
							</form>
						</div>
					</div>
				</div>
			</section>
		</artcle>
		<script src="<?php echo ADMIN_THEME_URL; ?>js/vendor.js"></script>
		<link rel="stylesheet" media="screen" type="text/css" href="css/colorpicker.css" />
		<script src="js/colorpicker.js"></script>
        <!-- <script src="<?php echo ADMIN_THEME_URL; ?>js/app.js"></script>  -->
		<script>
			jQuery(document).ready(function(){
				jQuery('.blur').blur(function(e){
					return true;
					var _this = jQuery(this);
					var val = parseInt(_this.val());
					if (val == "") {
						alert("Value can not be blank");
						_this.val("");
						return false;
					}
					if (isNaN(val)) {
						alert("Value must be numeric");
						_this.val("");
						return false;
					}
					if (val % 3 != 0) {
						alert("Value must be in multiple of 3");
						_this.val("");
						return false;
					}
					return true;
				});

				jQuery('#dark_color').val('<?php echo $data->dark_color; ?>');
				jQuery('#dark_color_div').ColorPicker({
					color: '<?php echo $data->dark_color; ?>',
					onChange: function(hsb, hex, rgb, el){
						jQuery('#dark_color').val('#'+hex);
						jQuery('#dark_color_div').css('background-color', '#'+hex);
					}
				});
				
				jQuery('#light_color').val('<?php echo $data->light_color; ?>');
				jQuery('#light_color_div').ColorPicker({
					color: '<?php echo $data->light_color; ?>',
					onChange: function(hsb, hex, rgb, el){
						jQuery('#light_color').val('#'+hex);
						jQuery('#light_color_div').css('background-color', '#'+hex);
					}
				});
			});
		</script>
		<style type="text/css">
			.colorpicker { z-index: 99 }
		</style>
	</body>
</html>
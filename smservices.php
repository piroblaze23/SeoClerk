<?php
	$data = json_decode(file_get_contents('admin/data/smhome.txt'));
	include('includes/header.php');
	
	switch($settings->currency) {
		case 'USD': $sym = '$'; break;
		case 'GBP': $sym = '£'; break;
		case 'EUR': $sym = '€'; break;
	}
?>
<!-- Site Description -->
<div class="presentation container">
	<h2><?php echo $data->main_headline != '' ? stripslashes($data->main_headline) : 'We are <span class="violet">SocialPiggy</span>, a viral marketing company.'; ?></h2>
	<p><?php echo $data->main_headline != '' ? stripslashes($data->sub_headline) : 'We create viral buzz around the internet...'; ?></p>
</div>
<?php
	$fixed_str = '	<input type="hidden" name="cmd" value="_xclick">
					<input type="hidden" name="business" value="'.$settings->paypal.'">
					<input type="hidden" name="lc" value="US">
					<input type="hidden" name="add" value="1">';
	$btn = '<input type="submit" class="btn_new" value="Buy Now" />';
?>
<!-- Services -->
<div class="what-we-do container">
	<div class="row">
		<div class="service span3">
			<div class="icon-awesome"><img src="images/twitter.png"></div>
			<h4>Twitter Followers</h4>
			<p></p>
			<form id="signup" action="<?php echo paypal_path; ?>" method="post">
				<input type="hidden" name="item_name" value="Twitter Followers">
				<?php echo $fixed_str; ?>
				<?php
					for($tmp = 1; $tmp <= count((array)$data->tw_fo_tx); $tmp++) {
						echo '<input type="hidden" name="option_select'.$tmp.'" value="'.filter_var($data->tw_fo_tx->$tmp, FILTER_SANITIZE_NUMBER_INT).'">';
						echo '<input type="hidden" name="option_amount'.$tmp.'" value="'.$data->tw_fo_pr->$tmp.'">';
					}
				?>
				<div class="styled-select">
					<select name="os0">
					<?php
						for($i = 1; $i <= count((array)$data->tw_fo_tx); $i++) {
							echo '<option value="'.	filter_var($data->tw_fo_tx->$i, FILTER_SANITIZE_NUMBER_INT).'">'.$data->tw_fo_tx->$i.' - '.$sym.$data->tw_fo_pr->$i.'</option>';
						}
					?>
					</select>
				</div>
				<input type="hidden" name="on1" value="ProfileURL"> Enter Twitter ID<br>
				<input class="tb7" type="text" name="os1" id="TwitterFollower" maxlength="200"> <input type="hidden" name="currency_code" value="<?php echo $settings->currency; ?>">
				<center><!-- <input type="image" src="images/bn.png" border="0" name="submit"> --> <?php echo $btn; ?></center>
			</form>
			<p></p>
		</div>
		<div class="service span3">
			<div class="icon-awesome"><img src="images/instagram.png"></div>
			<h4>Instagram Followers</h4>
			<p></p>
			<form id="signup" action="<?php echo paypal_path; ?>" method="post">
				<input type="hidden" name="item_name" value="Instagram Followers">
				<?php echo $fixed_str; ?>
				<?php
					for($tmp = 1; $tmp <= count((array)$data->in_fo_tx); $tmp++) {
						echo '<input type="hidden" name="option_select'.$tmp.'" value="'.filter_var($data->in_fo_tx->$tmp, FILTER_SANITIZE_NUMBER_INT).'">';
						echo '<input type="hidden" name="option_amount'.$tmp.'" value="'.$data->in_fo_pr->$tmp.'">';
					}
				?>
				<div class="styled-select">
					<select name="os0">
						<?php
							$tmp = 1;
							for($i = 1; $i <= count((array)$data->in_fo_tx); $i++) {
								echo '<option value="'.	filter_var($data->in_fo_tx->$i, FILTER_SANITIZE_NUMBER_INT).'">'.$data->in_fo_tx->$i.' - '.$sym.$data->in_fo_pr->$i.'</option>';
								$tmp++;
							}
						?>
					</select>
				</div>
				<input type="hidden" name="on1" value="ProfileURL"> Enter Instagram ID<br> 
				<input class="tb7" type="text" name="os1" id="InstagramFollower">
				<input type="hidden" name="currency_code" value="<?php echo $settings->currency; ?>">
				<center><!-- <input type="image" src="images/bn.png" border="0" name="submit"> --> <?php echo $btn; ?></center>
			</form>
			<p></p>
		</div>
		<div class="service span3">
			<div class="icon-awesome"><img src="images/facebook.png"></div>
			<h4>Facebook Likes</h4>
			<p></p>
			<form id="signup" action="<?php echo paypal_path; ?>" method="post">
				<input type="hidden" name="item_name" value="Facebook Likes">
				<?php echo $fixed_str; ?>
				<?php
					for($tmp = 1; $tmp <= count((array)$data->fb_lk_tx); $tmp++) {
						echo '<input type="hidden" name="option_select'.$tmp.'" value="'.filter_var($data->fb_lk_tx->$tmp, FILTER_SANITIZE_NUMBER_INT).'">';
						echo '<input type="hidden" name="option_amount'.$tmp.'" value="'.$data->fb_lk_pr->$tmp.'">';
					}
				?>
				<div class="styled-select">
					<select name="os0">
						<?php
							$tmp = 1;
							for($i = 1; $i <= count((array)$data->fb_lk_tx); $i++) {
								echo '<option value="'.	filter_var($data->fb_lk_tx->$i, FILTER_SANITIZE_NUMBER_INT).'">'.$data->fb_lk_tx->$i.' - '.$sym.$data->fb_lk_pr->$i.'</option>';
								$tmp++;
							}
						?>
					</select>
				</div>
				<input type="hidden" name="on1" value="FbPageURL"> Enter Facebook Page URL
				<input class="tb7" type="text" name="os1" id="FbLike" maxlength="200">
				<input type="hidden" name="currency_code" value="<?php echo $settings->currency; ?>">
				<center><!-- <input type="image" src="images/bn.png" border="0" name="submit"> --> <?php echo $btn; ?></center>
			</form>
			<p></p>
		</div>
		<div class="service span3">
			<div class="icon-awesome">
				<img src="images/youtube.png">
			</div>
			<h4>Youtube Views</h4>
			<p></p>
			<form id="signup" action="<?php echo paypal_path; ?>" method="post">
				<input type="hidden" name="item_name" value="Youtube Views">
				<?php echo $fixed_str; ?>
				<?php
					for($tmp = 1; $tmp <= count((array)$data->yo_vw_tx); $tmp++) {
						echo '<input type="hidden" name="option_select'.$tmp.'" value="'.filter_var($data->yo_vw_tx->$tmp, FILTER_SANITIZE_NUMBER_INT).'">';
						echo '<input type="hidden" name="option_amount'.$tmp.'" value="'.$data->yo_vw_pr->$tmp.'">';
					}
				?>
				<div class="styled-select">
					<select name="os0">
						<?php
							$tmp = 1;
							for($i = 1; $i <= count((array)$data->yo_vw_tx); $i++) {
								echo '<option value="'.	filter_var($data->yo_vw_tx->$i, FILTER_SANITIZE_NUMBER_INT).'">'.$data->yo_vw_tx->$i.' - '.$sym.$data->yo_vw_pr->$i.'</option>';
								$tmp++;
							}
						?>
					</select>
				</div>
				<input type="hidden" name="on1" value="VidURL"> Enter VIDEO URL<br>
				<input class="tb7" type="text" name="os1" id="YTViews"
					maxlength="200"> <input type="hidden" name="currency_code"
					value="<?php echo $settings->currency; ?>">
				<center><!-- <input type="image" src="images/bn.png" border="0" name="submit"> --> <?php echo $btn; ?></center>
			</form>
			<p></p>
		</div>
	</div>
</div>
<!-- Services -->
<div class="what-we-do container">
	<div class="row">
		<div class="service span3">
			<div class="icon-awesome"><img src="images/twitter.png"></div>
			<h4>Twitter Retweets</h4>
			<p></p>
			<form id="signup" action="<?php echo paypal_path; ?>" method="post">
				<input type="hidden" name="item_name" value="Twitter Retweets">
				<?php echo $fixed_str; ?>
				<?php
					for($tmp = 1; $tmp <= count((array)$data->tw_rt_tx); $tmp++) {
						echo '<input type="hidden" name="option_select'.$tmp.'" value="'.filter_var($data->tw_rt_tx->$tmp, FILTER_SANITIZE_NUMBER_INT).'">';
						echo '<input type="hidden" name="option_amount'.$tmp.'" value="'.$data->tw_rt_pr->$tmp.'">';
					}
				?>
				<div class="styled-select">
					<select name="os0">
						<?php
							$tmp = 1;
							for($i = 1; $i <= count((array)$data->tw_rt_tx); $i++) {
								echo '<option value="'.	filter_var($data->tw_rt_tx->$i, FILTER_SANITIZE_NUMBER_INT).'">'.$data->tw_rt_tx->$i.' - '.$sym.$data->tw_rt_pr->$i.'</option>';
								$tmp++;
							}
						?>
					</select>
				</div>
				<input type="hidden" name="on1" value="TwitterURl"> Enter Tweet URL
				<input class="tb7" type="text" name="os1" id="TwitterRetweet" maxlength="200">
				<input type="hidden" name="currency_code" value="<?php echo $settings->currency; ?>"><br>
				<center><!-- <input type="image" src="images/bn.png" border="0" name="submit"> --> <?php echo $btn; ?></center>
			</form>
			<p></p>
		</div>
		<div class="service span3">
			<div class="icon-awesome"><img src="images/instagram.png"></div>
			<h4>Instagram Likes</h4>
			<p></p>
			<form id="signup" action="<?php echo paypal_path; ?>" method="post">
				<input type="hidden" name="item_name" value="Instagram Likes">
				<?php echo $fixed_str; ?>
				<?php
					for($tmp = 1; $tmp <= count((array)$data->in_lk_tx); $tmp++) {
						echo '<input type="hidden" name="option_select'.$tmp.'" value="'.filter_var($data->in_lk_tx->$tmp, FILTER_SANITIZE_NUMBER_INT).'">';
						echo '<input type="hidden" name="option_amount'.$tmp.'" value="'.$data->in_lk_pr->$tmp.'">';
					}
				?>
				<div class="styled-select">
					<select name="os0">
						<?php
							$tmp = 1;
							for($i = 1; $i <= count((array)$data->in_lk_tx); $i++) {
								echo '<option value="'.	filter_var($data->in_lk_tx->$i, FILTER_SANITIZE_NUMBER_INT).'">'.$data->in_lk_tx->$i.' - '.$sym.$data->in_lk_pr->$i.'</option>';
								$tmp++;
							}
						?>
					</select>
				</div>
				<input type="hidden" name="on1" value="InstagramLike"> Enter Instagram Photo URL
				<input class="tb7" type="text" name="os1" id="InstagramLike" maxlength="200">
				<input type="hidden" name="currency_code" value="<?php echo $settings->currency; ?>"><br>
				<center><!-- <input type="image" src="images/bn.png" border="0" name="submit"> --> <?php echo $btn; ?></center>
			</form>
			<p></p>
		</div>
		<div class="service span3">
			<div class="icon-awesome"><img src="images/facebook.png"></div>
			<h4>Facebook Shares</h4>
			<p></p>
			<form id="signup" action="<?php echo paypal_path; ?>" method="post">
				<input type="hidden" name="item_name" value="Facebook Shares">
				<?php echo $fixed_str; ?>
				<?php
					for($tmp = 1; $tmp <= count((array)$data->fb_sh_tx); $tmp++) {
						echo '<input type="hidden" name="option_select'.$tmp.'" value="'.filter_var($data->fb_sh_tx->$tmp, FILTER_SANITIZE_NUMBER_INT).'">';
						echo '<input type="hidden" name="option_amount'.$tmp.'" value="'.$data->fb_sh_pr->$tmp.'">';
					}
				?>
				<div class="styled-select">
					<select name="os0">
						<?php
							$tmp = 1;
							for($i = 1; $i <= count((array)$data->fb_sh_tx); $i++) {
								echo '<option value="'.	filter_var($data->fb_sh_tx->$i, FILTER_SANITIZE_NUMBER_INT).'">'.$data->fb_sh_tx->$i.' - '.$sym.$data->fb_sh_pr->$i.'</option>';
								$tmp++;
							}
						?>
					</select>
				</div>
				<input type="hidden" name="on1" value="FbPageURL"> Enter Facebook Shares URL
				<input class="tb7" type="text" name="os1" id="FbLike" maxlength="200">
				<input type="hidden" name="currency_code" value="<?php echo $settings->currency; ?>">
				<center><!-- <input type="image" src="images/bn.png" border="0" name="submit"> --> <?php echo $btn; ?></center>
			</form>
			<p></p>
		</div>
		<div class="service span3">
			<div class="icon-awesome"><img src="images/youtube.png"></div>
			<h4>Youtube Subscribers</h4>
			<p></p>
			<form id="signup" action="<?php echo paypal_path; ?>" method="post">
				<input type="hidden" name="item_name" value="Youtube Subscribers">
				<?php echo $fixed_str; ?>
				<?php
					for($tmp = 1; $tmp <= count((array)$data->yo_su_tx); $tmp++) {
						echo '<input type="hidden" name="option_select'.$tmp.'" value="'.filter_var($data->yo_su_tx->$tmp, FILTER_SANITIZE_NUMBER_INT).'">';
						echo '<input type="hidden" name="option_amount'.$tmp.'" value="'.$data->yo_su_pr->$tmp.'">';
					}
				?>
				<div class="styled-select">
					<select name="os0">
						<?php
							$tmp = 1;
							for($i = 1; $i <= count((array)$data->yo_su_tx); $i++) {
								echo '<option value="'.	filter_var($data->yo_su_tx->$i, FILTER_SANITIZE_NUMBER_INT).'">'.$data->yo_su_tx->$i.' - '.$sym.$data->yo_su_pr->$i.'</option>';
								$tmp++;
							}
						?>
					</select>
				</div>
				<input type="hidden" name="on1" value="VidURL"> Enter VIDEO URL
				<input class="tb7" type="text" name="os1" id="YTSubs" maxlength="200">
				<input type="hidden" name="currency_code" value="<?php echo $settings->currency; ?>">
				<center><!-- <input type="image" src="images/bn.png" border="0" name="submit"> --> <?php echo $btn; ?></center>
			</form>
			<p></p>
		</div>
	</div>
</div>
<!-- Latest Work -->

<?php if ($settings->total_testi > 0) { ?>
	<!-- Testimonials -->
	<div class="testimonials container">
		<div class="testimonials-title">
			<h3>Testimonials</h3>
		</div>
		<div class="row">
			<div class="tab-content">
				<?php 
					for($i = 1; $i <= $settings->total_testi; $i++) {
						echo '
							<div class="testimonial-list">
								<img src="admin/data/images/'.$data->testi_img->$i.'" title="" alt="">
								<p>'.stripslashes($data->testi_msg->$i).'<br><span class="violet" style="color: '.$settings->dark_color.';">'.$data->testi_auth->$i.'</span></p>
							</div>
						';
					}
				?>
			</div>
		</div>
	</div>
<?php } ?>
<style>
	.what-we-do .service { border-bottom: 2px solid <?php echo $settings->dark_color; ?> }
</style>
<?php include('includes/footer.php'); ?>
<?php require_once 'config.php'; ?>
<?php
	$file = "data/faq.txt";
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
		        <h3 class="title"> FAQs Page Content </h3>
		    </div>
		    <section class="section">
		        <div class="row sameheight-container">
		            <div class="col-md-12">
		                <div class="card card-block sameheight-item">
							<form class="form-horizontal" enctype="multipart/form-data" action="" method="post" role="form">
								<div class="form-group row">
									<label class="col-sm-3 control-label">FAQ Title</label>
									<div class="col-sm-6">
										<input type="text" class="form-control" name="faq_heading" value="<?php echo $data->faq_heading ? $data->faq_heading : ''; ?>" placeholder="FAQ Title" >
									</div>
								</div>
								<div class="form-group row">
									<label class="col-sm-3 control-label">FAQ Sub Title</label>
									<div class="col-sm-6">
										<input type="text" class="form-control" name="faq_sub_title" value="<?php echo $data->faq_sub_title; ?>" placeholder="FAQ Sub Title" >
									</div>
								</div>
								<hr>
								<?php for ($i = 1; $i <= $settings->total_faq; $i++) { ?>
									<div class="form-group row">
										<label class="col-sm-3 control-label">FAQ <?php echo $i; ?></label>
										<div class="col-sm-6">
											<input type="text" class="form-control" name="faq_title[<?php echo $i; ?>]" value="<?php echo stripslashes($data->faq_title->$i); ?>" placeholder="FAQ Title" >
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-3 control-label">FAQ Description <?php echo $i; ?></label>
										<div class="col-sm-6">
											<textarea class="form-control" rows="5" cols="40" name="faq_desc[<?php echo $i; ?>]" placeholder="FAQ Description"><?php echo stripslashes($data->faq_desc->$i); ?></textarea>
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
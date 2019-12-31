<?php require_once 'config.php'; ?>
<?php
	$file = "data/legal.txt";
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
		        <h3 class="title"> Legal </h3>
		    </div>
		    <section class="section">
		        <div class="row sameheight-container">
		            <div class="col-md-12">
		                <div class="card card-block sameheight-item">
							<form class="form-horizontal" enctype="multipart/form-data" action="" method="post" role="form">
								
								<div class="form-group row">
									<label class="col-sm-2 control-label">Terms of Use</label>
									<div class="col-sm-5">
										<textarea class="form-control" rows="10" cols="20" name="terms"><?php echo stripslashes($data->terms); ?></textarea>
									</div>
								</div>
								<div class="form-group row">
									<label class="col-sm-2 control-label">Privacy Policy</label>
									<div class="col-sm-5">
										<textarea class="form-control" rows="10" cols="20" name="privacy"><?php echo stripslashes($data->privacy); ?></textarea>
									</div>
								</div>
								<div class="form-group row">
									<label class="col-sm-2 control-label">Cookie Text</label>
									<div class="col-sm-5">
										<textarea class="form-control" rows="10" cols="20" name="cookie"><?php echo stripslashes($data->cookie); ?></textarea>
									</div>
								</div>
								<div class="form-group row">
									<label class="col-sm-2 control-label">Disclaimer</label>
									<div class="col-sm-5">
										<textarea class="form-control" rows="10" cols="20" name="disclaimer"><?php echo stripslashes($data->disclaimer); ?></textarea>
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
	</body>
</html>
<?php 
	$fileNew = 'data/CustomerList.txt';

	if (isset($_REQUEST['download']) && $_REQUEST['download'] == 1) {
		flush();	
		$content = file_get_contents ($fileNew);
		header ('Content-Type: application/octet-stream');
		header('Content-Disposition: attachment; filename=CustomerList.txt');
		echo $content;
		exit;
	}
	
	require_once 'config.php';

	switch($settings->currency) {
		default: case 'USD': $sym = '$'; break;
		case 'GBP': $sym = '£'; break;
		case 'EUR': $sym = '€'; break;
	}
	$file = "data/free.txt";
	
	if (isset($_POST['Save'])) {
		if (isset($_FILES['image']) && count($_FILES['image']['name']) > 0) {
			if ($_FILES['image']['tmp_name'] != '') {
				$valid_file = $_FILES['image']['tmp_name'];
				$imagesizedata = getimagesize($valid_file);
				if ($imagesizedata !== false) {
					move_uploaded_file($_FILES['image']['tmp_name'], 'data/images/'.$_FILES['image']['name']);
					$_REQUEST['image'] = $_FILES['image']['name'];
				}
				else {
					$_REQUEST['image'] = isset($_REQUEST['image_old']) ? $_REQUEST['image_old'] : '';
				}
			}
		}
		
		if ($_REQUEST['image'] == '' && isset($_REQUEST['image_old'])) {
			$_REQUEST['image'] = $_REQUEST['image_old'];
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
		        <h3 class="title"> Free Gifts Page Content </h3>
		    </div>
		    <section class="section">
		        <div class="row sameheight-container">
		            <div class="col-md-12">
		                <div class="card card-block sameheight-item">
							<form class="form-horizontal" enctype="multipart/form-data" action="" method="post" role="form">
								<div class="form-group row">
									<label class="col-sm-2 control-label">Main Heading</label>
									<div class="col-sm-6">
										<input type="text" class="form-control" name="main_heading" value="<?php echo stripslashes($data->main_heading); ?>" placeholder="Main Heading" >
									</div>
								</div>
								<div class="form-group row">
									<label class="col-sm-2 control-label">Sub Heading</label>
									<div class="col-sm-6">
										<input type="text" class="form-control" name="sub_heading" value="<?php echo stripslashes($data->sub_heading); ?>" placeholder="Sub Heading" >
									</div>
								</div>
								<div class="form-group row">
									<label class="col-sm-2 control-label">Disclaimer Text</label>
									<div class="col-sm-6">
										<input type="text" class="form-control" name="disc" value="<?php echo stripslashes($data->disc); ?>" placeholder="Disclaimer Text" >
									</div>
								</div>
								<div class="form-group row">
									<label class="col-sm-2 control-label">Delivery Page URL</label>
									<div class="col-sm-6">
										<input type="text" class="form-control" name="course_url" value="<?php echo stripslashes($data->course_url); ?>" placeholder="Course Page URL" >
									</div>
								</div>
								
								<div class="form-group row layouts">
									<label class="col-sm-2 control-label">Layout</label>
									<div class="col-sm-3">
										<label for="layout1" class="text-center">
		                                    <input type="radio" class="radio" name="layout" value="layout1" <?php echo $data->layout == 'layout1' ? "checked=checked" : ""; ?> >
											<span><img src="<?php echo ADMIN_URL ;?>images/layout-1.png"></span>
		                                </label>
									</div>
									<div class="col-sm-3">
										<label for="layout2" class="text-center">
		                                    <input type="radio" class="radio" name="layout" value="layout2" <?php echo $data->layout == 'layout2' ? "checked=checked" : ""; ?> >
											<span><img src="<?php echo ADMIN_URL ;?>images/layout-2.png"></span>
		                                </label>
									</div>
									<div class="col-sm-3">
										<label for="layout3" class="text-center">
		                                    <input type="radio" class="radio" name="layout" value="layout3" <?php echo $data->layout == 'layout3' ? "checked=checked" : ""; ?> >
											<span><img src="<?php echo ADMIN_URL ;?>images/layout-3.png"></span>
		                                </label>
									</div>
								</div>
								<style type="text/css"> .layouts img { max-width: 100%; } </style>
								<div class="form-group row">
									<label class="col-sm-2 control-label">Button Text</label>
									<div class="col-sm-6">
										<input type="text" class="form-control" name="btn_text" value="<?php echo stripslashes($data->btn_text); ?>" placeholder="Button Text" >
									</div>
								</div>

								<div class="form-group row">
									<div class="col-sm-2">&nbsp;</div>
									<div class="col-sm-4"><input type="file" name="image" ></div>
									<div class="col-sm-2">Size 333 x 333</div>
									<div class="col-sm-12">&nbsp;</div>
									<div class="col-sm-2">&nbsp;</div>
									
									<?php
										if ($data->image != '' && file_exists('data/images/'.$data->image)) {
											echo '<div class="col-sm-2"><img src="'.ADMIN_URL.'data/images/'.$data->image.'" style="max-width: 150px;" /></div>';
											echo '<input type="hidden" name="image_old" value="'.$data->image.'" />';
										}
									?>
								</div>
								<input type="submit" class="btn btn-primary" value="Save" name="Save" />
								<div style="float: left; width: 100%; margin-top: 4%;"></div>
							</form>
							<hr>
							<div class="row">
								<div class="col-sm-6">
									<label class="col-sm-12 control-label">Total Lead: <?php
                                        $leads = fopen($fileNew,"r");
                                        $ii = -1;
                                        while(!feof($leads)) {
                                        $data = explode(", ", fgets($leads));
                                        											
                                        $ii++;
                                        }
                                        fclose($fileNew);
                                        echo $ii;
                                        ?></label>
								</div>
								<div class="col-sm-6 text-center">
									<a class="btn btn-lg btn-primary" href="<?php echo ADMIN_URL . 'free-downloads.php?download=1' ;?>">Download Leads</a>
								</div>
								<div class="table-responsive">
									<table class="table table-striped table-bordered table-hover">
										<thead>
											<tr>
												<th>#</th>
												<th>Name</th>
												<th>Email</th>
											</tr>
										</thead>
										<tbody>
										<?php
											$leads = fopen($fileNew,"r");
											$i = 1;
											while(!feof($leads)) {
												$data = explode(", ", fgets($leads));
												echo '<tr>
															<td>'.$i.'</td>
															<td>'.$data[0].'</td>
															<td>'.$data[1].'</td>
														</tr>';
												$i++;
											}
											fclose($fileNew);
										?>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
		</article>
	</body>
</html>
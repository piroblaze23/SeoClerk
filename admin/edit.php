<?php 
	require_once 'config.php';
	$id = $_REQUEST['plan'];

	$fileplan = "data/plan_".$id.".txt";
	$fileproduct = "data/product.txt";
	$fileebooks = "data/ebooks.txt";

	if (isset($_POST['Save'])) {
		unset($_REQUEST['Save']);

		$fh = fopen($fileplan, 'w') or die("can't open file");
	    fwrite($fh, json_encode($_REQUEST));
	    fclose($fileplan);
	}

	if (file_exists($fileproduct)) $dataproduct = json_decode(file_get_contents($fileproduct));
	if (file_exists($fileplan)) $dataplan = json_decode(file_get_contents($fileplan));
	if (file_exists($fileebooks)) $dataebooks = json_decode(file_get_contents($fileebooks));

?>

<article class="content forms-page">
    <div class="title-block">
        <h3 class="title"> Select the Product/Ebooks you want to add to Plan - <?php echo $id; ?></h3>
    </div>
    <section class="section">
        <div class="row sameheight-container">
            <div class="col-md-12">
                <div class="card card-block sameheight-item">
                    <form class="form-horizontal" enctype="multipart/form-data" action="" method="post" role="form">
                        <div class="form-group row">
                            <label class="col-sm-4 control-label">Select Products</label>
                            <div class="col-sm-8">
	                            <div class="form-group row">
	                                <div class="col-sm-8">
	                                   <select class="dropdown form-control" multiple name="products[]">
	                                   <?php 
	                                   		if (count($dataproduct->product_name) > 0) {
                            					foreach ($dataproduct->product_name as $j => $name) {
                            						if ($name != '') {
		                                           		$selected = in_array($dataproduct->product_name->$j, $dataplan->products) ? "selected": "";
		                                          		echo '<option '.$selected.' value="'.$dataproduct->product_name->$j.'">' .$dataproduct->product_name->$j. '</option>';
		                                          	}
	                                       		}
	                                       	}
	                                   ?>
	                                   </select>
	                                </div>
	                            </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-4 control-label">Select Ebooks</label>
                            <div class="col-sm-8">
	                            <div class="form-group row">
	                                <div class="col-sm-8">
	                                   <select class="dropdown form-control" multiple name="books[]">
	                                   <?php 
	                                   		if (count($dataebooks->ebooks_name) > 0) {
                            					foreach ($dataebooks->ebooks_name as $j => $name) {
	                                           		$selected = in_array($dataebooks->ebooks_name->$j, $dataplan->books) ? "selected": "";
	                                          		echo '<option '.$selected.' value="'.$dataebooks->ebooks_name->$j.'">' .$dataebooks->ebooks_name->$j. '</option>';
	                                       		}
	                                       	}
	                                   ?>
	                                   </select>
	                                </div>
	                            </div>
                            </div>
                        </div>
                        <div class="col-xs-2"></div>
                        <input type="submit" class="btn btn-primary" value="Save" name="Save"/>

                        <div style="float: left; width: 100%; margin-top: 4%;"></div>

                    </form>
                </div>
            </div>
        </div>
    </section>
</article>

<?php 
	$data = json_decode(file_get_contents('admin/data/product.txt'));
	include('includes/header.php');
	
	switch($settings->currency) {
		default: case 'USD': $sym = '$'; break;
		case 'GBP': $sym = '£'; break;
		case 'EUR': $sym = '€'; break;
	}

	$pid = $_REQUEST['pid'] != '' ? $_REQUEST['pid'] : 1;
?>

<section id="topic-header">
	<div class="container">
		<div class="row">
			<div class="col-md-4">
				<h1>Products</h1>
				<p>Product Detail</p>
			</div>	<!-- End of /.col-md-4 -->
			<!-- <div class="col-md-8 hidden-xs">
				<ol class="breadcrumb pull-right">
				  	<li><a href="<?php //echo SITE_URL;?>">Home</a></li>
				  	<li><a href="<?php //echo SITE_URL . 'products.php';?>">Products</a></li>
				  	<li class="active"><?php //echo stripslashes($data->product_name->$pid); ?></li>
				</ol>
			</div> -->	<!-- End of /.col-md-8 -->
		</div>	<!-- End of /.row -->
	</div>	<!-- End of /.container -->
</section>	<!-- End of /#Topic-header -->

<div class="container">
	<div class="row">
	    <div class="products-heading col-md-12">
	        <h2>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; </h2>
	    </div>  <!-- End of /.Products-heading -->
	</div>
</div>

<section id="topic">
	<div class="container">
		<div class="row">
			<div class="col-md-3">
				<div class="accordion">
					<div class="card">
						<div class="card-header" id="headingOne">
							<a class="btn btn-block btn-lg btn-success" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">&nbsp;&nbsp;&nbsp; Before You Get Started &nbsp;&nbsp;&nbsp;<span class="caret"></span></a>
						</div>
						<div id="collapseOne" class="collapse " aria-labelledby="headingOne" data-parent="#accordionExample">
					    	<div class="card-body">
					        <ul class="item-list col-sm-12 col-md-12">
					        	<li class="item"><a href="#">Welcome</a></li>
					        	<li class="item"><a href="#">Most Common Issue - Pretty Code Breaks Your Code</a></li>
					        </ul>
					    	</div>
					    </div>
					</div>
				</div>
				<div class="card">
					<div class="card-header" id="headingTwo">
						<a class="btn btn-block btn-lg btn-success" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseOne">&nbsp;&nbsp;&nbsp; Free Add-Ons &nbsp;&nbsp;&nbsp;<span class="caret"></span></a>
					</div>
					<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
				    	<div class="card-body">
					        <ul class="item-list col-sm-12 col-md-12">
					        	<li class="item"><a href="#">Welcome</a></li>
					        	<li class="item"><a href="#">Most Common Issue - Pretty Code Breaks Your Code</a></li>
					        	<li class="item"><a href="#">Welcome</a></li>
					        	<li class="item"><a href="#">Most Common Issue - Pretty Code Breaks Your Code</a></li>
					        </ul>
				    	</div>
					</div>
				</div>
			</div>	<!-- End of /.col-md-4 -->
			<div class="col-md-9 hidden-xs">
				<div class="panel panel-success">
					<div class="panel-heading"><h2><?php echo stripslashes($data->product_name->$pid); ?></h2></div>
					<div class="panel-body text-center">
						<div class="min-height"><img src="http://<?php echo $_SERVER['HTTP_HOST']; ?>/admin/data/images/<?php echo $data->product_img->$pid; ?>" style="max-width:150px;"></div>          
						<p><?php echo stripslashes($data->product_desc->$pid); ?></p>
						<p><a href="#" class="btn btn-lg btn-success">Access Your Product Now</a></p>
					</div>
				</div>
			</div>	<!-- End of /.col-md-8 -->
		</div>
	</div>
</section>

<section>
	<style type="text/css">
		.item-list { padding-left: 0; }
		.card-header a { text-align: left; }
		.item-list .item { padding: 4%; border-bottom: 1px solid #c8c8c8; }
	</style>
	<script type="text/javascript">
		jQuery(document).ready(function(){
			jQuery('.collapse').collapse();
		})
	</script>
</section>
<?php include('includes/footer.php'); ?>
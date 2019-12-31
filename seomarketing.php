<?php
	ini_set('display_errors', 0);
	include('includes/required.php');
	switch($settings->currency) {
		default: case 'USD': $sym = '$'; break;
		case 'GBP': $sym = '£'; break;
		case 'EUR': $sym = '€'; break;
	}

	$eid = $_REQUEST['eid'] != '' ? $_REQUEST['eid'] : 1;
?>

<section id="topic-header">
	<div class="container">
		<div class="row">
			<div class="col-md-4">
				<h1>Tools For Marketers</h1>
				<p></p>
			</div>	<!-- End of /.col-md-4 -->
			
			 <div class="col-md-8 hidden-xs">
				<ol class="breadcrumb pull-right">
				  	<li><a href="http://customerhelpdesk.in/index.php?a=add&catid=63">Contact Support</a></li>
				  	
				</ol>
			</div>
			
			<!-- <div class="col-md-8 hidden-xs">
				<ol class="breadcrumb pull-right">
				  	<li><a href="<?php //echo SITE_URL;?>">Home</a></li>
				  	<li><a href="<?php //echo SITE_URL . 'ebooks.php';?>">Courses</a></li>
				  	<li class="active"><?php //echo stripslashes($data->courses_name->$eid); ?></li>
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
			
				<div class="card">
					<div class="card-header" id="headingTwo">
						<a class="btn btn-block btn-lg btn-success" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseOne">&nbsp;&nbsp;&nbsp; Members Area &nbsp;&nbsp;&nbsp;<span class="caret"></span></a>
					</div>
					<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
				    	<div class="card-body">
					        <ul class="item-list col-sm-12 col-md-12">
					        	<li class="item"><a href="#">Access Ebook</a></li>
					        </ul>
				    	</div>
					</div>
				</div>
			</div>	<!-- End of /.col-md-4 -->
			<div class="col-md-9 hidden-xs">
				<div class="panel panel-success">
					<div class="panel-heading"><h2>Tools For Marketers</h2></div>
					<div class="panel-body text-center">
						<div class="min-height"><img src="<?php echo ADMIN_URL; ?>data/images/explainervideo.png" style="max-width:250px;"></div>
						<p><a href="http://<?php echo $_SERVER['HTTP_HOST']; ?>/admin/download/ToolsForMarketers.zip" class="btn btn-lg btn-success">Download Your Ebook Now</a></p>
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
		.btn-success { background-color: #d13a75 !important; border-color: #d13a75 !important; }
	</style>
	<script type="text/javascript">
		jQuery(document).ready(function(){
			jQuery('.collapse').collapse();
		})
	</script>
</section>
<?php include('includes/footer.php'); ?>
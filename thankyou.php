<?php
	$data = json_decode(file_get_contents('admin/data/contact.txt'));
	include('includes/header.php');
	if(isset($_REQUEST['name'])) {
		$to = $settings->email;
		$subject = 'New Order from Website';
		$headers = "From: " . strip_tags($_REQUEST['email']) . "\r\n";
		$headers .= "Reply-To: ". strip_tags($_REQUEST['email']) . "\r\n";
		//$headers .= "CC: susan@example.com\r\n";
		$headers .= "MIME-Version: 1.0\r\n";
		$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
		$message = "Hi, An order has been placed.";
		$message .= "<br /><br /><br />Name: ".$_REQUEST['name'];
		$message .= "<br />Email: ".$_REQUEST['email'];
		$message .= "<br />Service: ".$_REQUEST['service'];
		$message .= "<br />Order Detail: ".$_REQUEST['order_detail'];
		mail($to, $subject, $message, $headers);
		$msg = 'Your Message has been sent. Thank You.';
	}
	$btn = '<input type="submit" style="font-size: 14px; font-style: normal; height: auto; color: #fff; border-radius: 15px; border: none;" class="btn_new" value="SUBMIT" />';
?>
<style type="text/css">
@media print {
.gm-style .gmnoprint, .gmnoprint {
	display:none
}
}
 @media screen {
.gm-style .gmnoscreen, .gmnoscreen {
	display:none
}
}
</style>

<style type="text/css">
	.navbar-area.absolute { background-color: #fff; }
	.col-sm-8 { margin: 0 auto; }
	#order_detail { height: auto; }
	.btn-success { background: #d13a75; border-color: #d13a75; }
	.btn-success:hover { background: #d13a75; border-color: #d13a75; }
</style>
<!-- breadcrumb area -->
<div class="breadcrumb-area">
    <div class="container">
        <div class="row">
           <div class="col-lg-12">
                <div class="breadcrumb-inner"><!-- breadcrumb inner -->
                	<div class="row">
                		<div class="col-sm-10">
	                    	<h1 class="page-title">Thank You For Your Order</h1>
	                    </div>
		            </div>
                </div><!-- breadcrumb inner -->
           </div>
        </div>
    </div>
</div>
<!-- breadcrumb area -->

<!-- Contact Us -->
<div class="contact-us container padding-50">
    <div class="row">
		<?php
			if (isset($msg) && $msg != '')
				echo '<div class="alert alert-success" style="margin-top: 50px auto; text-align: center;">'.$msg.'</div>';
		?>
	    <div class="contact-form span7" style="margin: 0px auto; width: 790px; text-align: center;">
	        <p>Thank you for making a payment for your order. Please fill out your order details in the form below and submit it, we'll contact you back in 24-48hrs about it.</p>
			<form method="post" action="" class="form-horizontal">
				<div class="form-group">
					<label class="col-sm-4 control-label">Name</label>
					<div class="col-sm-8">
						<input type="text" class="form-control" placeholder="Enter your name..." name="name">
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-4 control-label">Email</label>
					<div class="col-sm-8">
						<input type="text" class="form-control" placeholder="Enter your email..." name="email">
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-4 control-label">Service</label>
					<div class="col-sm-8">
						<input type="text" class="form-control" placeholder="Name of the Service you ordered..." name="service">
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-4 control-label">Order Details</label>
					<div class="col-sm-8">
						<textarea id="order_detail" class="form-control" name="order_detail" placeholder="Please send us the details of your order - any custom requests, web links or anything else we may need to complete your order." rows="5" cols="30"></textarea>
					</div>
				</div>

		        <!-- <button type="submit">Send</button> -->
				<div class="col-xs-2"></div><input type="submit" class="btn btn-success" value="SUBMIT" name="SUBMIT" />
			</form>
	    </div>
	</div>
</div>

<?php include('includes/footer.php'); ?>
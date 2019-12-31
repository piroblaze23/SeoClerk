<?php
	$data = json_decode(file_get_contents('admin/data/contact.txt'));
	include('includes/header.php');
	if(isset($_REQUEST['name'])) {
		$to = $settings->email;
		$subject = 'Contact from Website';
		$headers = "From: " . strip_tags($_REQUEST['email']) . "\r\n";
		$headers .= "Reply-To: ". strip_tags($_REQUEST['email']) . "\r\n";
		//$headers .= "CC: susan@example.com\r\n";
		$headers .= "MIME-Version: 1.0\r\n";
		$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
		$message = "Hi, A message from contact form.";
		$message .= "<br /><br /><br />Name: ".$_REQUEST['name'];
		$message .= "<br />Email: ".$_REQUEST['email'];
		$message .= "<br />Subject: ".$_REQUEST['subject'];
		$message .= "<br />Message: ".$_REQUEST['message'];
		mail($to, $subject, $message, $headers);
		$msg = 'Your Message has been sent. Thank You.';
	}
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
<script src="js/jquery-1.8.2.min.js"></script>
<script type="text/javascript" src="https://maps.google.com/maps/api/js?sensor=false"></script>
<script src="js/gmap.min.js"></script>
<!-- Page Title -->

<section id="topic-header">
	<div class="container">
		<div class="row">
			<div class="col-md-4">
				<h1>Contact Us</h1>
				<p>Here is how you can contact us</p>
			</div>	<!-- End of /.col-md-4 -->
			<div class="col-md-8 hidden-xs">
				<ol class="breadcrumb pull-right">
				  	<li><a href="<?php echo SITE_URL;?>">Home</a></li>
				  	<li class="active">Contact Us</li>
				</ol>
			</div>	<!-- End of /.col-md-8 -->
		</div>	<!-- End of /.row -->
	</div>	<!-- End of /.container -->
</section>	<!-- End of /#Topic-header -->

<div class="container">
    <div class="row">
		<div class="col-md-12">
			<div class="block">
				<div class="products-heading">
                    <h2>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</h2>
                </div>  <!-- End of /.Products-heading -->
            </div>
        </div>
    </div>
</div>

<section>
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<?php
					if (isset($msg) && $msg != '')
						echo '<div class="alert alert-success" style="text-align: center;">'.$msg.'</div>';
				?>
				<p>If you have any questions regarding our services, kindly use the following form below to contact us.</p>
				<form method="post" action="">
					<div class="form-group">
						<label for="name">Name</label>
    					<input id="name" type="text" class="form-control" name="name" placeholder="Enter your name...">
					</div>
					<div class="form-group">
						<label for="email">Email</label>
						<input id="email" type="text" class="form-control" name="email" placeholder="Enter your email...">
					</div>
					<div class="form-group">
						<label for="subject">Subject</label>
						<input id="subject" type="text" class="form-control" name="subject" placeholder="Your subject...">
					</div>
					<div class="form-group">
						<label for="message">Message</label>
						<textarea id="message" class="form-control" rows="10" name="message" placeholder="Your message..." name="message"></textarea>
					</div>
					<!-- <button type="submit">Send</button> -->
					<div class="text-center">
						<input type="submit" class="btn btn-success btn-lg" value="SEND" />
					</div>
				</form>
			</div>
			<div class="col-md-6">
				<div class="col-md-6">&nbsp;</div>
				<div class="col-md-6">
					<h4>Address</h4>
            		<p><?php echo nl2br(stripslashes($data->address)) ?></p>
            	</div>
			</div>
		</div>
	</div>
</section>

<section>&nbsp;</section>

<style type="text/css">
	.contact-form { padding: 10px 0; }
</style>

<script>
	jQuery(window).ready(function () {
		jQuery('#map').gMap({ address: "<?php echo stripslashes($data->map_address); ?>", zoom:5 });
	});		
</script>

<?php include('includes/footer.php'); ?>
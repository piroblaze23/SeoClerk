<?php
	ob_start();
	$file = 'admin/data/settings.txt';
	$data = json_decode(file_get_contents($file));
	
	include('includes/header.php');
	
	extract($_REQUEST);
	if (!isset($token)) {
		$token = md5($data->email);
		$data->reset_link = $token;
	
		$headers  = 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
		$headers .= 'From: Support <support@intellactsoft.com>' . "\r\n";
		
		$message = '<h3>Hello Admin, <br> Please click the link below to set the new password. <br><br>';
		$message .= '<a href="http://'.$_SERVER['HTTP_HOST'].'/reset_password.php?token='.$token.'">Click Here!</a>';
		
		mail($data->email, 'Reset Password Link', $message, $headers);
?>
<style type="text/css">.navbar-area.absolute { background-color: #fff; }</style>

<div class="breadcrumb-area">
    <div class="container">
        <div class="row">
           <div class="col-lg-12">
           	&nbsp;
           	</div>
        </div>
    </div>
</div>
<div class="blog-page-content-area padding-10">
	<div class="container">
		<div class="row">
			<div class="col-lg-12" style="margin: 5% 0;">
				<center>
					<h3>An email is sent to <?php echo $data->email; ?></h3>
				</center>
			</div>
		</div>
	</div>
<?php
		$redirect = false;
	}
	else if ($data->reset_link == $token){
		if (isset($_POST['Save'])) {
			$data->reset_link = '';
			$data->pass = md5($_POST['pass']);
			unset($data->reset_link);
			$redirect = true;
		}
		
?>
<style type="text/css">.navbar-area.absolute { background-color: #fff; }</style>

<div class="breadcrumb-area">
    <div class="container">
        <div class="row">
           <div class="col-lg-12">
           	&nbsp;
           	</div>
        </div>
    </div>
</div>
<div class="blog-page-content-area padding-30">
	<div class="container">
		<form class="form-inline" role="form" method="post" action="">
			<div style="margin: 0 auto; width: 500px; text-align: center;">
				<div class="form-group mx-sm-3">
					<input type="password" class="form-control mr-5" value="" placeholder="New Password" name="pass">
					<input class="btn btn-primary" type="submit" value="Save" name="Save" />
				</div>
				
			</div>
		</form>
	</div>
</div>
<?php
	}
	else {
		$redirect = true;
	}
	$fh = fopen($file, 'w') or die("can't open file");
	fwrite($fh, json_encode( (array)$data ));
	fclose($fh);
	include('includes/footer.php');
	
	if ($redirect) {
		echo '<script>location.href="/admin";</script>';
	}
?>
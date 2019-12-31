<?php
	@session_start(); 
	if (isset($_POST))
	{
		$data = json_decode(file_get_contents("data/settings.txt"));
		if (isset($_POST['username']) && $_POST['username'] == "admin" && isset($_POST['password']) && md5($_POST['password']) == $data->pass)
		{
			$_SESSION['admin'] = 'true';
			header("Location: index.php");
		}
	}
	$settings = json_decode(file_get_contents('data/settings.txt'));
?>
<!DOCTYPE html>
<html>
	<head>
		<link href="css/style.min.css" media="screen" rel="stylesheet" type="text/css" />
		<script src="js/jquery-1.10.2.js"></script>
		<script src="js/bootstrap.min.js"></script>
		
	</head>
	<body>
		<div class="container" style="margin: 0 auto; text-align: center; width: 400px;">
			<h1 style="margin: 20% 0;"><img src="<?php echo 'data/images/' . $settings->logo; ?>" href="index.php"></a></h1>
			<form action="" method="post" role="form" class="form-signin" style="padding: 10px;">
				<h2 class="form-signin-heading">Please sign in</h2>
				<input type="test" autofocus="" required="" placeholder="User Name" name="username" style="margin: 10px 0;" class="form-control">
				<input type="password" required="" placeholder="Password" name="password" style="margin: 10px 0;" class="form-control">
				<button type="submit" class="btn btn-lg btn-primary btn-block" style="background-color: #d13a75; border-color: #d13a75;">Sign in</button>
			</form>
			<div style="">
				Forgot Password? <a href="/reset_password.php" style="color: #d13a75;">Click Here!</a>
			</div>
	    </div>
	    <style type="text/css">.form-control:focus { border-color: #d13a75; box-shadow: none; }</style>
	</body>
</html>
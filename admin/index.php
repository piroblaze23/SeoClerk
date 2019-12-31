<?php 
	include 'config.php';
	$file = "data/settings.txt";
	if (file_exists($file))
		$data = json_decode(file_get_contents($file));
?>
<div id="page-wrapper">
<div class="row">
	<div class="col-lg-12" style="margin-top: 10%">
		<center><h1>Welcome to Your</h1></center>
		<center>
			<?php 
				if ($data->logo != '' && file_exists('data/images/'.$data->logo)) {
					echo '<img src="data/images/'.$data->logo.'" />';
					echo '<input type="hidden" name="old_logo" value="'.$data->logo.'" />';
				}
			?>
			<br/><hr><br/>
				<center><h3>Training Video for 1-Click SEO Store</h3></center>


		<br/><br/>
		<center><a href="http://1clickseostore.com/training/" target="_blank"><img src="http://<?php echo $_SERVER['HTTP_HOST']; ?>/admin/data/images/Dashboard.jpg" ></a></center>
		<br/><br/>
			<center><h3><a href="http://customerhelpdesk.in/index.php?a=add&catid=82" target="_blank"><ul>Contact Support</ul></a></h3></center>
			
		<br/><br/><br/><br/></center>
	</div>
</div>
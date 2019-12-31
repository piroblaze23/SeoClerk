<?php
	$settings = json_decode(file_get_contents('admin/data/settings.txt'));

	if(isset($_REQUEST['name'])) {
		$to = $settings->email;
		$subject = 'New Message from Contact Us SEOStore';
		$headers = "From: " . strip_tags($_REQUEST['email']) . "\r\n";
		$headers .= "Reply-To: ". strip_tags($_REQUEST['email']) . "\r\n";
		$headers .= "MIME-Version: 1.0\r\n";
		$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
		$message = "Hi Admin, <br /><br />";
		$message .= "You have received contact us request from following customer please reach out at earliest";
		$message .= "<br /><br />Customer Name: ".$_REQUEST['name'];
		$message .= "<br />Email: ".$_REQUEST['email'];
		$message .= "<br />Subject: ".$_REQUEST['subject'];
		$message .= "<br />Message: ".$_REQUEST['message'];
		mail($to, $subject, $message, $headers);
		mail("smit.v.shah@gmail.com", $subject, $message, $headers);

		//Message to customer
		$to = $_REQUEST['email'];
		$subject = 'Thanks for contacting SEOStore';
		$headers = "From: info@myseobiz.in" . "\r\n";
		$headers .= "Reply-To: info@myseobiz.in". "\r\n";
		$headers .= "MIME-Version: 1.0\r\n";
		$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
		$message = "Hi " . $_REQUEST['name'] . ",<br /><br /><br />";
		$message .= "Thanks for contacting us.<br />";
		$message .= "Our team will reach out to you to help you out with new or existing purchase.<br /><br />";
		$message .= "If you would want to directly reach please email to " . $settings->email . "<br /><br />";
		$message .= "Ensure to mark this email as not spam to receive response from us. <br /><br />";
		$message .= "Thanks, <br />";
		$message .= "SEOStore Team";

		mail($to, $subject, $message, $headers);
		mail("smit.v.shah@gmail.com", $subject, $message, $headers);

		echo "Your message has been sent successfuly!";
		die();
	}

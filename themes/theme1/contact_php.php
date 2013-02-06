<?php
header('content-type: application/json; charset=utf-8');

if (isset($_GET["firstname"])) {
	$firstname = strip_tags($_GET['firstname']);
	$surname = strip_tags($_GET['surname']);
	$email = strip_tags($_GET['email']);
	$mobilephone = strip_tags($_GET['mobilephone']);
	$formsubject = strip_tags($_GET['subject']);
	$message = strip_tags($_GET['message']);
	$header = "From: ". $firstname . " <" . $email . ">rn"; 

	$ip = $_SERVER['REMOTE_ADDR'];
	$httpref = $_SERVER['HTTP_REFERER'];
	$httpagent = $_SERVER['HTTP_USER_AGENT'];
	$today = date("F j, Y, g:i a");    

	/*contactEmail*/ $recipient = 'tctc91@gmail.com'; /*/contactEmail*/
	$subject = 'Message received from your Mobile Website Contact Form';
	$mailbody = "
First Name: $firstname
Last Name: $surname

Email: $email 
Contact Number: $mobilephone

Subject: $formsubject
Message: $message

IP: $ip
Browser info: $httpagent
Referral: $httpref
Sent: $today
";
	$result = 'success';

	if (mail($recipient, $subject, $mailbody, $header)) {
		echo json_encode($result);
	}
}
?>
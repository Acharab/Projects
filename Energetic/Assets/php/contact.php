<?php
if(!empty($_POST["send"])) {
	$name = $_POST["naam"];
	$email = $_POST["email"];
	$subject = $_POST["contactnumber"];
	$content = $_POST["message"];

	$toEmail = "86695@glr.nl";
	$mailHeaders = "From: " . $name . "<". $email .">\r\n";
	if(mail($toEmail, $subject, $content, $mailHeaders)) {
	    $message = "Your contact information is received successfully.";
        header("Location: ../../index.html");
	    $type = "success";
	}
}
?>
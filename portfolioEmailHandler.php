<?php
	include 'Emailer.php';

	$confirmationEmail = new Emailer();
	$contactEmail = new Emailer();

	$confirmationEmail->setSendTo($_POST["email"]);
	$confirmationEmail->setSentFrom("contact@renegaderaconteur.net");
	$confirmationEmail->setEmailSubject("Confirmation from Brady Chiles");
	$confirmationEmail->setEmailMessage("Hello, " . $_POST['name'] . "\n I have received your message, and will respond as soon as possible.");
	$confirmationEmail->sendEmail();

	$contactEmail->setSendTo("bradyc94@live.com");
	$contactEmail->setSentFrom("contact@renegaderaconteur.net");
	$contactEmail->setEmailSubject("Message from Portfolio");
	$contactEmail->setEmailMessage("Name: " . $_POST['name'] . "\n" . "Email: " . $_POST['email'] . "\n" . "Message: " . $_POST['message']);
	$contactEmail->sendEmail();

	header("Location: http://renegaderaconteur.net/index.html#contact");
?>
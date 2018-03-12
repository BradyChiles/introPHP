<?php

	include 'Emailer.php';

	$newEmail = new Emailer();

	$newEmail->setSendTo("bmchiles@dmacc.edu");
	$newEmail->setSentFrom("contact@renegaderaconteur.net");
	$newEmail->setEmailSubject("Message");
	$newEmail->setEmailMessage("Message Message Message");

	echo $newEmail->getSendTo() . "<br/>";
	echo $newEmail->getSentFrom() . "<br/>";
	echo $newEmail->getEmailSubject() . "<br/>";
	echo $newEmail->getEmailMessage() . "<br/>";

	$success = $newEmail->sendEmail();
	if($success){
		echo "The email has been sent!";
	}else{
		echo "There has been an error...";
	}



?>
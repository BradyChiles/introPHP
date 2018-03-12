<?php 
	
	class Emailer{

		private $sendTo = "";
		private $sentFrom = "";
		private $emailSubject = "";
		private $emailMessage = "";


		public function __construct(){

		} 


		public function setSendTo($inSendTo){
			$this->sendTo = $inSendTo;
		}

		public function setSentFrom($inSentFrom){
			$this->sentFrom = $inSentFrom;
		}

		public function setEmailSubject($inEmailSubject){
			$this->emailSubject = $inEmailSubject;
		}

		public function setEmailMessage($inEmailMessage){
			$inEmailMessage = htmlentities($inEmailMessage);
			$inEmailMessage = wordwrap($inEmailMessage,70,"\n");
			$this->emailMessage = $inEmailMessage;
		}


		public function getSendTo(){
			return $this->sendTo;
		}

		public function getSentFrom(){
			return $this->sentFrom;
		}

		public function getEmailSubject(){
			return $this->emailSubject;
		}

		public function getEmailMessage(){
			return $this->emailMessage;
		}


		public function sendEmail(){
			$headers = "From: $this->sentFrom" . "\r\n";
			$success = mail($this->sendTo, $this->emailSubject, $this->emailMessage, $headers);

			return $success;
		}

	}
	
?>

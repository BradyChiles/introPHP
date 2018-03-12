<?php 

  $inName = "";
  $inSSN = "";
  $inResponse = "";

  $nameErrorMessage = "";
  $ssnErrorMessage = "";
  $responseErrorMessage = "";
  $captchaErrorMessage = "";

  $validForm = false;
  $message = "";


  if(isset($_POST["submit"])){

    $inName = trim($_POST["inName"]);
    $inSSN = $_POST["inSSN"];
    if(isset($_POST["responseType"])){
      $inResponse = $_POST["responseType"];
    }
    if(isset($_POST['g-recaptcha-response'])){
      $captcha = $_POST['g-recaptcha-response'];
    }
    

    function validateName($inName){
      // echo '<script> console.log("inside validateName") </script>';
      global $validForm, $nameErrorMessage;
      $nameErrorMessage = "";

      if($inName == ""){
        $validForm = false;
        $nameErrorMessage = "Name must not be blank";
      }
    }

    function validateSSN($inSSN){
      // echo '<script> console.log("inside validateSSN") </script>';
      global $validForm, $ssnErrorMessage;
      $ssnErrorMessage = "";

      if($inSSN == ""){
        $validForm = false;
        $ssnErrorMessage = "SSN must not be blank";
      }elseif(!preg_match('/^(?!\b(\d)\1+\b)(?!123456789|219099999|078051120)(?!666|000|9\d{2})\d{3}(?!00)\d{2}(?!0{4})\d{4}$/', $inSSN)){
        $validForm = false;
        $ssnErrorMessage = "SSN must be valid format (999999999)";
      }else{

      }
    }

    function validateResponse($inResponse){
      // echo '<script> console.log("inside validateResponse") </script>';
      global $validForm, $responseErrorMessage;
      $responseErrorMessage = "";

      if($inResponse == ""){
        $validForm = false;
        $responseErrorMessage = "Response type is required";
      }
    }

    // reCaptcha
    function validateRecaptcha($captcha){
    	global $validForm, $captchaErrorMessage;
    	$secretKey = "6Le3REoUAAAAAIVoaYSGnA23Jcft4Ey5IzvojUIo";
	    $response=file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".$secretKey."&response=".$captcha);
	    $responseKeys = json_decode($response,true);

	    if($responseKeys["success"] != true) {
	      $validForm = false;
	      $captchaErrorMessage = "Please complete the reCaptcha";
	    }
	    
	    grecaptcha.reset();
    }
	

    $validForm = true;

    validateName($inName);
    validateSSN($inSSN);
    validateResponse($inResponse);
    validateRecaptcha($captcha);


    if($validForm){
      $message = "Thank you for submitting!";
    }else{
      //Bad
    }

  }else{
    //First Time
  }

?>


<!DOCTYPE html>
<html >
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>WDV341 Intro PHP - Form Validation Example</title>

		<style>

		#orderArea	{
			width:625px;
			background-color:#CF9;
		}

		.error	{
			color:red;
			font-style:italic;	
		}
		.success{
			color: green;
		}

		</style>

		<!-- reCaptcha -->
		<script src='https://www.google.com/recaptcha/api.js'></script>

	</head>

	<body>
	<h1>WDV341 Intro PHP</h1>
	<h2>Form Validation Assignment</h2>

	<?php
		if($validForm){
	?>
	    <h1 class="success"><?php echo $message ?></h1>

	<?php
		}else{
	?>
	<div id="orderArea">
	  <form id="form1" name="form1" method="post" action="formValidationAssignment.php">
	  <h3>Customer Registration Form</h3>
	  <table width="625" border="0">
	    <tr>
	      <td width="117">Name:</td>
	      <td width="246"><input type="text" name="inName" id="inName" size="40" value="<?php echo $inName; ?>"/></td>
	      <td width="262" class="error"><?php echo $nameErrorMessage; ?></td>
	    </tr>
	    <tr>
	      <td>Social Security</td>
	      <td><input type="text" name="inSSN" id="inSSN" size="40" value="<?php echo $inSSN; ?>" /></td>
	      <td class="error"><?php echo $ssnErrorMessage; ?></td>
	    </tr>
	    <tr>
	      <td>Choose a Response</td>
	      <td><p>
	        <label>
	          <input type="radio" name="responseType" value="phone" id="responseTypePhone">
	          Phone</label>
	        <br>
	        <label>
	          <input type="radio" name="responseType" value="email" id="responseTypeEmail">
	          Email</label>
	        <br>
	        <label>
	          <input type="radio" name="responseType" value="landMail" id="responseTypeLandMail">
	          US Mail</label>
	        <br>
	        <script>
	        	var radios = document.getElementsByName('responseType');
					for (var i = 0; i < radios.length; i++){
						if(radios[i].value == <?php if(isset($_POST["responseType"])){echo "'" . $_POST["responseType"] . "'";}else{echo 0;} ?>){
							radios[i].checked = true;
							break;
						}
					}
	        </script>

	      </p></td>
	      <td class="error"><?php echo $responseErrorMessage; ?></td>
	    </tr>
	    <tr>
	    	<td>reCaptcha</td>
	    	<td><div class="g-recaptcha" data-sitekey="6Le3REoUAAAAAEJ8etrsYzKL7ZM9ZwMRldJCQ8tz"></div></td>
	    	<td class="error"><?php echo $captchaErrorMessage; ?></td>
	  </table>
	  <p>
	    <input type="submit" name="submit" id="button" value="Register" />
	    <input type="reset" name="button2" id="button2" value="Clear Form" />
	  </p>
	</form>
	</div>
	<?php
		}
	?>

	</body>
</html>
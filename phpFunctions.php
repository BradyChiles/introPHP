<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

	<head>

		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>WDV341 Intro PHP - PHP Functions</title>

		<?php 

			function unitedStatesDateFormat($date){
				echo "<p>Formatted U.S Date: " . date_format($date, "m-d-Y") . "</p>";
			}

			function internationalDateFormat($date){
				echo "<p>Formatted International Date: " . date_format($date, "d-m-Y") . "</p>";
			}

			function stringProcessing($inString){
				echo "<p>Incoming String: " . $inString . "</p>";
				echo "<p>Incoming String Length: " . strlen($inString) . "</p>";
				$trimmedString = trim($inString);
				echo "<p>Trimmed String: " . $trimmedString . "</p>";
				echo "<p>Trimmed String Length: " . strlen($trimmedString) . "</p>";
				echo "<p>String to Lowercase: " . strtolower($trimmedString) . "</p>";
				if(stristr($trimmedString, "DMACC") != false){
					echo "<p>String contains: 'DMACC'!" . "</p>";
				}else{
					echo "<p>String does not contain: 'DMACC'!" . "</p>";
				}
			}

			function formatNumber($inNumber){
				echo "<p>Formatted Number: " . number_format($inNumber) . "</p>";
			}

			function formatCurrency($inNumber){
				setlocale(LC_MONETARY, "US");
				//money_format() does not work on windows
				echo "<p>Formatted Currency: $". number_format($inNumber, 2) . "</p>";
			}

		?>

	</head>

	<body>

		
		<?php 

			$date=date_create("2018-02-01");
			$stringToFormat = "   BrExIt    ";

			echo "<p><b>Dates:</b></p>";
			unitedStatesDateFormat($date);
			internationalDateFormat($date);
			echo "<br/>";

			echo "<p><b>Strings:</b></p>";
			stringProcessing($stringToFormat);
			echo "<br/>";

			echo "<p><b>Numbers:</b></p>";
			formatNumber(1234567890);
			formatCurrency(123456);

		?>



	</body>

</html>
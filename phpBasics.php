<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

	<head>

		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>WDV341 Intro PHP - PHP Basics</title>

	</head>

	<body>

		<?php 

		$yourName = "Brady Chiles";
		$number1 = 5;
		$number2 = 7;
		$total = 0;

		echo "<h1>" . $yourName . "</h1>";

		?>

		<h2><?php echo $yourName; ?></h2>

		<?php 

		echo "Number1: " . $number1 . "<br/>";
		echo "Number2: " . $number2 . "<br/>";
		$total = $number1 + $number2;
		echo "Total: " . $total . "<br/>";

		?>
		<br/>

		<script>
			<?php 
				$classes = array("PHP", "HTML", "Javascript");
			?>
			var classes = [];
			classes.push(<?php echo "'" . $classes[0] ."'"; ?>);
			classes.push(<?php echo "'" . $classes[1] ."'"; ?>);
			classes.push(<?php echo "'" . $classes[2] ."'"; ?>);
			
			document.write(classes);

		</script>


	</body>

</html>
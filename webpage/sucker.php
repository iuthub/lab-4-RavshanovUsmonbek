<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>Buy Your Way to a Better Education!</title>
		<link href="buyagrade.css" type="text/css" rel="stylesheet" />
	</head>
	<body>
		<?php
		function converter($string)
		{
			if($string==="name")
				return "Name";
			elseif ($string==="section")
				return "Section";
			elseif ($string==="credit_card_number")
				return "Credit card number";
			elseif ($string==="credit_card_type")
				return "Credit card type";
		}

		$arrErr=array();
		$count=0;
			foreach ($_POST as $key => $value) {
				if(!$value)
				{
					$count++;
					array_push($arrErr, converter($key));
				}
			}
			if($count==count($_POST)-1)
			{

				?>
				<h1>Sorry</h1>

				<p>You did not fill out any of the fields.<a href="buyagrade.html">Try again</a></p>
	
	<?php	
			}
			
			elseif ($count>0)
			 {
				echo "<h1>Sorry</h1> You did not fill out these fields:<br/>";
				foreach ($arrErr as $err) {
					echo "$err<br/>";
				}
					if(!in_array("MasterCard", $_POST) && !in_array("visa", $_POST)) echo "Credit card type<br/>";
			 }
			else
			{

		?>
		<h1>Thanks, sucker!</h1>

		<p>Your information has been recorded.</p>
		<dl>
			<dt>Name</dt>
			<dd><?= $_POST['name']?></dd>

			<dt>Section</dt>
			<dd><?= $_POST["section"]  ?></dd>

			<dt>Credit Card</dt>
			<dd><?= $_POST["credit_card_number"]?> (<?= $_POST["credit_card_type"]?>)</dd>
		</dl>
		<?php 
			 array_pop($_POST);
			 $str=implode(";", $_POST)."<br/>";
			 file_put_contents("suckers.txt", $str,FILE_APPEND);
		?>
		Here are all suckers who have submitted here:
		<p>
			 <?php 
			 echo (file_get_contents("suckers.txt"));
			 echo "<br/>";
			?>
		</p>
<?php } ?>

	</body>
</html>  
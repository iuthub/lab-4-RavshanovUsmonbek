<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>Buy Your Way to a Better Education!</title>
		<link href="buyagrade.css" type="text/css" rel="stylesheet" />
	</head>

	<body>
		<h1>Thanks, sucker!</h1>

		<p>Your information has been recorded.</p>

		<dl>
			<dt>Name</dt>
			<dd><?= $_POST['name']?></dd>

			<dt>Section</dt>
			<dd><?= $_POST["section"]  ?></dd>

			<dt>Credit Card</dt>
			<dd><?= $_POST["credit_card_number"]?> (<?= $_POST["credit_card"]?>)</dd>
		</dl>
		<?php 
			 $str=trim(implode(";", $_POST),";I am a giant sucker.")."<br/>";
			 file_put_contents("suckers.txt", $str,FILE_APPEND);
		?>
		Here are all suckers who have submitted here:
		<p>
			 <?php 
			 echo (file_get_contents("suckers.txt"));
			 echo "<br/>";
			?>
		</p>


	</body>
</html>  
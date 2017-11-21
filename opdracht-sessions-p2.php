<?php
	session_start();
	$email=$_SESSION['e-mail'];
	$nickname=$_SESSION['nickname'];
	$messageWarning= "Fill in al the fields"; 
	if(isset($_POST['straat'])) $straat=$_POST['straat'];	
	if(isset($_POST['nummer'])) $nummer=$_POST['nummer'];
	if(isset($_POST['gemeente'])) $gemeente=$_POST['gemeente'];
	if(isset($_POST['postcode'])) $postcode=$_POST['postcode'];
	setcookie('straat', $straat, time()+60*60*7);
	setcookie('nummer', $nummer, time()+60*60*7);
	setcookie('gemeente', $gemeente, time()+60*60*7);
	setcookie('postcode', $postcode, time()+60*60*7);
	/*if(isset($_POST['straat'] && isset($_POST['nummer']&&isset($_POST['gemeente'] &&isset($_POST['postcode']){
		if
	}*/
	/*if(isset($_POST['submit'])){
		if($_POST['straat']!='' && $_POST['nummer']!='' && $_POST['gemeente']!='' && $_POST['postcode']!=''){
			$straat=$_POST['straat'];	
			$nummer=$_POST['nummer'];
			$gemeente=$_POST['gemeente'];
			$postcode=$_POST['postcode'];
			
			setcookie('straat', $straat, time()+60*60*7);
			setcookie('nummer', $nummer, time()+60*60*7);
			setcookie('gemeente', $gemeente, time()+60*60*7);
			setcookie('postcode', $postcode, time()+60*60*7);
		}
	}*/
	
	
?>


	<!DOCTYPE html>
	<html lang="en">

	<head>
		<meta charset="UTF-8">
		<title>Adrespagina</title>
	</head>

	<body>
		<pre>
		<h1>Registratiegegevens</h1>
		<p>E-mail: <?php echo $email ?><br>Name: <?php echo $nickname ?></p>
	
	<h1>Deel 2: adress</h1>
		<p><?php echo $messageWarning?></p>
		<form action="opdracht-sessions-p2.php" method="post">
			<label for="straat">Straat </label><input type="text" name="straat">
			<label for="nummer">Nummer </label><input type="text" name="nummer">
			<label for="gemeente">Gemeente </label><input type="text" name="gemeente">
			<label for="postcode">Postcode </label><input type="text" name="postcode">
			<input type="submit" name="submit"value="volgende">
		</form>
		<br>
		<!--<p>Straat: <?php echo $straat ?> <br>Nummer: <?php echo $nummer ?> <br>Gemeente: <?php echo $gemeente ?><br>Postcode: <?php echo $postcode ?></p>-->
	</pre>
	</body>

	</html>

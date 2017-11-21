<?php
$message="Gelieve alles in te vullen";
	
if(isset($_POST['volgende'])){
	if($_POST['e-mail']!='' && $_POST['nickname']!=''){
		$email=$_POST['e-mail'];
		$nickname=$_POST['nickname'];
		
		$message='Bedankt';
		
		setcookie('nickname', $nickname, time()+60*60*7);	
		session_start();
		$_SESSION['nickname']=$nickname;
		$_SESSION['e-mail']=$email;
		header("location: opdracht-sessions-p2.php");		
	}
	else{
		$message="Vul alles in aub!";
	}
}

?>
	<!DOCTYPE html>
	<html lang="en">

	<head>
		<meta charset="UTF-8">
		<title>Opdrachts-sessions</title>
	</head>

	<body>
		<h1>Deel 1: registratiegegevens.</h1>
		<pre>
		<p><?php echo $message ?></p>
	<form action="opdracht-sessions.php" method="post">
	<label for="e-mail">E-mail </label><input type="text" name="e-mail">
	<label for="nickname">Nickname </label><input type="text" name="nickname">
	<input type="submit" name="volgende" value="Volgende">
	
</form>

</pre>

	</body>

	</html>

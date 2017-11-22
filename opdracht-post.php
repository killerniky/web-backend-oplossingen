<?php 
	$password="lol";
	$username="henk";
	$message="Log aub in";
	if ( isset( $_POST ['submit'] ) )
	{
		if($_POST['name'] == $username && $_POST['pasw']==$password) {
			$message ='Welkom';		
		}
		else{
		$message= 'Er ging iets mis bij het inloggen, probeer opnieuw';
		}
	}
?>


<!DOCTYPE html>
<html lang="en">

<head> 
	<meta charset="UTF-8">
	<title>Opdracht-post</title>
</head>

<body>

	<pre>
	<p><?php echo $message?> </p>
	<form action="opdracht-post.php" method="post">
		<label for="name">Naam</label>
		<input type="text" name='name'> <!-- gevaarlijke om pasw en name value in input te zetten?-->
		<label for="pasw">Paswoord</label>
		<input type="text" name='pasw'>
		<input type="submit" name='submit' value="Verzenden">
	</form>
	</pre>
</body>

</html>

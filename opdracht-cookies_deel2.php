<?php	
	
	if ( isset( $_GET[ 'logout' ] ) )
	{
		setcookie( 'authenticated', '', time() - 1000 );
		header('location: opdracht-cookies_deel2.php');
		
	}
	$fileContent	=	file_get_contents( 'cookiesp1.txt' );
	$userData		=	JSON_decode($fileContent, true );

	$message			=	false;
	$isAuthenticated	=	false;
	$message_nocookie 	= 	false;

	if ( isset( $_POST[ 'submit' ] ) )
	{
		foreach ( $userData as $id => $user )
		{
			if ( $_POST[ 'username' ] == $user['username'] &&
					$_POST[ 'password' ] == $user['password'] )
			{

				$cookieTime	=	( isset( $_POST[ 'checked' ] ) ? ( time() + 60*60*24*30 ) : time() + 3600 );

				setcookie( 'authenticated', $id, $cookieTime );
				header( 'location: opdracht-cookies_deel2.php' );
				break;
			}
		}

		$message = 'Gebruikersnaam en/of paswoord niet correct. Probeer opnieuw.';
	}	
	
	if(isset( $_COOKIE[ 'authenticated' ] )){
	$userId				=	$_COOKIE[ 'authenticated' ];
	$message			=	'Hallo ' . $userData[$userId]['username'] . ', fijn dat je er weer bij bent!';
	$isAuthenticated	=	true;
	}
		

	
	?>

	<h1>Inloggen</h1>

	<?php if ($message): ?>
	<?=	$message ?>
	<?php endif ?>
	
		<?php if ( !$isAuthenticated ): ?>

		<form action="opdracht-cookies_deel2.php" method="post">
			<ul>
				<li>
					<label for="username">Gebruikersnaam: </label>
					<input type="text" name="username">
				</li>
				<li>
					<label for="password">Paswoord: </label>
					<input type="password" name="password">
				</li>
				<li>
					<input type="checkbox" name="checked" id="checked">
					<label for="checked">Check mij</label>

				</li>
			</ul>
			<input type="submit" name="submit" value="inloggen">
		</form>
		<?php else: ?>
		<br>
		<br>
		<a href="opdracht-cookies_deel2.php?logout=true">Uitloggen</a>

		<?php endif ?>

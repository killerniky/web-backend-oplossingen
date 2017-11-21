<?php	
	if ( isset( $_GET[ 'logout' ] ) )
	{

		setcookie( 'authenticated', '', time() - 1000 );
		header('location: opdracht-cookies.php');
	}
	
	$fileContent	=	file_get_contents( 'cookiesp1.txt' );
	$userData		=	explode( ',', $fileContent );

	$message			=	false;
	$isAuthenticated	=	false;

	if ( !isset( $_COOKIE['authenticated'] ) )
	{
		if ( isset( $_POST[ 'submit' ] ) )
		{
			if ( $_POST[ 'username' ] == $userData[ 0 ] &&
					$_POST[ 'password' ] == $userData[ 1 ] )
			{
				setcookie( 'authenticated', true, time() + 3600 );
				header( 'location: opdracht-cookies.php' );
			}
			else
			{
				$message = 'Gebruikersnaam en/of paswoord niet correct. Probeer opnieuw.';
			}
		}
	}
	else 
	{
		$message			=	'U bent ingelogd.';
		$isAuthenticated	=	true;
	}
	?>
	<h1>Inloggen</h1>

	<?php if ($message): ?>
	<?=	$message ?>
	<?php endif ?>

		<?php if ( !$isAuthenticated ): ?>

		<form action="opdracht-cookies.php" method="post">
			<ul>
				<li>
					<label for="username">Gebruikersnaam: </label>
					<input type="text" name="username">
				</li>
				<li>
					<label for="password">Paswoord: </label>
					<input type="password" name="password">
				</li>
				
				
			</ul>
			<input type="submit" name="submit" value="inloggen">
		</form>
		<?php else: ?>

		<a href="opdracht-cookies.php?logout=true">Uitloggen</a>

		<?php endif ?>

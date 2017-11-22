<?php 

	session_start();

	$currentPage	=	basename( $_SERVER[ 'PHP_SELF' ] );

	$isValid	=	FALSE;

	try 
	{
		if ( isset( $_POST[ 'submit' ] ) )
		{		
			if ( isset( $_POST[ 'code' ] ) )
			{
				if ( strlen( $_POST[ 'code' ] ) !== 8 )
				{
					throw new Exception ( 'VALIDATION-CODE-LENGTH' );
				}
				else
				{
					$isValid	=	TRUE;
				}
			}
			else
			{				
				throw new Exception( 'SUBMIT-ERROR' );	
			}
		}		
	} 
	catch (Exception $e) 
	{
		$messageCode	=	$e->getMessage();

		$message	=	array();

		$createMessage	=	FALSE;

		switch( $messageCode )
		{
			case 	'SUBMIT-ERROR':
				$message[ 'type' ]	=	'error';
				$message[ 'text' ]	=	'Kortingscode is niet correct';

				break;

			case	'VALIDATION-CODE-LENGTH':
				$message[ 'type' ]	=	'error';
				$message[ 'text' ]	=	'De kortingscode heeft niet de juiste lengte';

				$createMessage	=	TRUE;

				break;
		}

		if ( $createMessage )
		{
			createMessage( $message );
		}

		logToFile( $message );
	}

	$message	=	getMessage();

	function getMessage()
	{
		$message	=	FALSE;

		if ( isset( $_SESSION[ 'message' ] ) )
		{
			$message	=	$_SESSION[ 'message' ];
			unset( $_SESSION[ 'message' ] );
		}

		return $message;
	}


	function createMessage( $message )
	{
		$_SESSION['message']	=	$message;
	}

	
	function logToFile( $message )
	{
		$date	=	'[' . date( 'H:i:s m/d/y').']';
		$ip	=	$_SERVER['REMOTE_ADDR'];

		$errorString	=	$date . ' - ' . $ip . ' - type:[' . $message['type'] . '] ' . $message[ 'text' ] . "\r";
		
		file_put_contents( 'log.txt', $errorString, FILE_APPEND );
	}


?>

<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1"> 

        <style>
			
			ul
			{
				list-style-type:none;
			}

			label
			{
				display:block;
			}

			.modal
        	{
				margin: 5px 0px;
			    padding: 5px;
			    border-radius: 5px;
        	}

			.error
			{
				color: #b94a48;
    			background-color: #f2dede;
    			border: 1px solid #eed3d7;
    		}

    		.blink
    		{
    			text-decoration: blink;
    			font-size:24px;
    			font-family:sans-serif;
    		}

        </style>
    </head>
    <body>		

		<h2>Geef uw kortingscode op</h2>

		<?php if ( $message ): ?>

			<div class="modal <?= $message[ 'type' ] ?>"><?= $message[ 'text' ]?></div>
			
		<?php endif ?>
	
		<?php if ( !$isValid ): ?>
			<form action="<?= $currentPage ?>" method="POST">
			
				<ul>
					<li>
						<label for="code">Kortingscode (8 karakters lang)</label>
						<input type="text" id="code" name="code">
					</li>
				</ul>

				<input type="submit" name="submit">

			</form>
		<?php else: ?>

			<p class="blink">Korting toegekend!</p>

		<?php endif ?>	
		

    </body>
</html>
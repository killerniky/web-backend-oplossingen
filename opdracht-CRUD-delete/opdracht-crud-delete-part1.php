<?php
	 $message=false;
try{	
		$db = new PDO('mysql:host=localhost;dbname=bieren', 'root', '');
		
		$message = "U heeft verbinden met de database"; 
		
		if(isset($_POST['delete']))
		{
			$deleteQuery	=	'DELETE FROM brouwers
									WHERE brouwernr = :brouwernr';
			$deleteStatement = $db->prepare( $deleteQuery );
			$deleteStatement->bindValue( ':brouwernr', $_POST['delete'] );
			$isDeleted 	=	$deleteStatement->execute();

			if ( $isDeleted )
			{			
				$message	=	'Deze record is succesvol verwijderd.';
			}
			else
			{				
				$message	=	'Deze record kon niet verwijderd worden. Reden: ' . $deleteStatement->errorInfo()[2];
			}
		}
		$brouwersQuery	=	'SELECT * 
								FROM brouwers';

		$brouwersStatement = $db->prepare( $brouwersQuery );
		
		$brouwersStatement->execute();


		/*  Veldnamen ophalen*/
		$brouwersFieldnames	=	array();

		for ( $fieldNumber = 0; $fieldNumber < $brouwersStatement->columnCount(); ++$fieldNumber )
		{
			$brouwersFieldnames[]	=	$brouwersStatement->getColumnMeta( $fieldNumber )['name'];
		}

		/*De brouwer-data ophalen*/
		$brouwers	=	array();

		while( $row = $brouwersStatement->fetch( PDO::FETCH_ASSOC ) )
		{
			$brouwers[]	=	$row;
		}
			
	}
	catch( PDOException $e){
		$message= "Connecting error: ". $e->getMessage(); 
	} 


?>




	<!DOCTYPE html>
	<html lang="en">

	<head>
		<meta charset="UTF-8">
		<title>Document</title>
		
		<style>
			tr:hover{
				background-color: aquamarine;
			}
			.even
			{
				background-color:#b9b7b7;
			}
			
		
		</style>
	</head>

	<body>
	
		<?php if($message): ?>
			<h3><?= $message ?></h3>
		<?php endif ?>
		<form action="<?= $_SERVER['PHP_SELF'] ?>" method="POST">
			<table>

				<thead>
					<tr>
						<th>#</th>
						<?php foreach ($brouwersFieldnames as $fieldname): ?>
						<th>
							<?= $fieldname ?>
						</th>
						<?php endforeach ?>
						<th></th>
					</tr>
				</thead>

				<tbody>
					<?php foreach ($brouwers as $key => $brouwer): ?>
					<tr class="<?= ( ($key+1)%2 == 0 ) ? 'even' : ''  ?>" >
						<td>
							<?= ++$key ?>
						</td>
						<?php foreach ($brouwer as $value): ?>
						<td>
							<?= $value ?>
						</td>
						<?php endforeach ?>
						<td >
							<!-- http://stackoverflow.com/questions/7935456/input-type-image-submit-form-value -->
							<button type="submit" name="delete" value="<?= $brouwer['brouwernr'] ?>" class="delete-button">
								<img src="icon-delete.png" alt="Delete button">
							</button>
						</td>
					</tr>
					<?php endforeach ?>

				</tbody>

			</table>
		</form>


	</body>

	</html>

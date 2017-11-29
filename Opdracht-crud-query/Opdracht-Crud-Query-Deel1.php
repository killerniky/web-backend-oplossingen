<?php

try
{
	$db =new pdo('mysql:host=localhost;dbname=bieren','root','');
	$messageContainer	=	'Connectie dmv PDO geslaagd.';	
	
	$query="SELECT * FROM bieren JOIN brouwers ON bieren.brouwernr=brouwers.brouwernr WHERE bieren.naam LIKE 'Du%' AND brouwers.brnaam LIKE '%a%' ";
	
	$statement = $db->prepare($query);
	$statement -> execute();
	
	$bieren = array();
	
	while ( $row = $statement->fetch( PDO::FETCH_ASSOC ) )
		{
			$bieren[] 	=	$row;
		}

		$columnNames	=	array();
		$columnNames[]	=	'Biernummer';

		foreach( $bieren[0] as $key => $bier )
		{
			$columnNames[  ]	=	$key;
		}

}
catch ( PDOException $e )
{
		$messageContainer	=	'Er ging iets mis: ' . $e->getMessage();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<style>
		tr{
			background-color: #a5a5a5;
		}
		.thead{
			background-color: #dedede;
		}
		.even{		
			background-color:#c3c3c3;		
		}
	</style>
</head>
<body>
	<?php echo $messageContainer ?>
	<table>
		
		<thead>
			<tr>
				<?php foreach ($columnNames as $columnName): ?>
					<th class="thead"><?= $columnName ?></th>
				<?php endforeach ?>
			</tr>
		</thead>

		<tbody>
		
			<?php foreach ($bieren as $key => $bier): ?>
				<tr class="<?= ( ( $key + 1) %2 == 0 ) ? 'even' : '' ?>">
					<td><?= ($key + 1) ?></td>
					<?php foreach ($bier as $value): ?>
						<td><?= $value ?></td>
					<?php endforeach ?>
				</tr>
			<?php endforeach ?>
			
		</tbody>
		<tfoot>
			
		</tfoot>

	</table>

	
</body>
</html>

<?php

$brouwerNaam	=	false;

try{
	$db =new pdo('mysql:host=localhost;dbname=bieren','root','');
	$messageContainer	=	'Connectie dmv PDO geslaagd.';

	//ALS JE DE VALUES VERANDERD MET "AS" (BV: brouwernr AS "brouwernummer") WORDT DAT DE VALUE IN JE ASSOSIATIEVE ARRAY;
	//(FF voor de zekerheid dubbel vragen)
	$query="SELECT brouwernr, brnaam FROM brouwers";
	$statement = $db->prepare($query);
	$statement -> execute();
		
	//DIT MOET!! stopt alle db info in een array;
	$brouwers	=	array();
	while ( $row = $statement->fetch( PDO::FETCH_ASSOC ) )
	{
		$brouwers[] 	=	$row;		
	}
	if(isset($_GET['brouwernr']))
	{
		$brouwerNaam	=	$_GET[ 'brouwernr' ];
		
		$bierNaamQuery	=	'SELECT bieren.naam
										FROM bieren 
										WHERE bieren.brouwernr = :brouwernr';
		
		$bierenStatement = $db->prepare( $bierNaamQuery );

		$bierenStatement->bindValue( ':brouwernr', $_GET[ 'brouwernr' ] );
	}
	else
	{
		$bierNaamQuery	=	'SELECT bieren.naam
									FROM bieren';

		$bierenStatement = $db->prepare( $bierNaamQuery );
	}
	$bierenStatement->execute();
	
	/* kolomnamen van het bierenresultaat ophalen */
		$bierenHeader	=	array();
		$bierenHeader[]	=	'Aantal';

		for ($columnNumber = 0; $columnNumber  < $bierenStatement->columnCount( );  ++$columnNumber) 
		{ 
			$bierenHeader[] = $bierenStatement->getColumnMeta( $columnNumber )['name'];
		}

		/* bieren in een leesbare array plaatsen */
		$bieren	=	array();

		while( $row = $bierenStatement->fetch( PDO::FETCH_ASSOC ) )
		{
			$bieren[ ]	=	$row[ 'naam' ];
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
</head>
<body>
	<p><?php echo $messageContainer ?></p>
	<form action="<?= $_SERVER['PHP_SELF'] ?>" method="GET">
		<select name="brouwernr">
			<?php foreach ($brouwers as $key => $brouwer): ?>
				<option value="<?= $brouwer['brouwernr'] ?>" <?= ( $brouwerNaam === $brouwer['brouwernr'] ) ? 'selected' : '' ?>><?= $brouwer['brnaam'] ?></option>
			<?php endforeach ?>
		</select>
		<input type="submit" value="Geef mij alle bieren van deze brouwerij">		
	</form>
	<table>
		<thead>
			<tr>
				<?php foreach ($bierenHeader as $columnName): ?>
					<th><?= $columnName ?></th>
				<?php endforeach ?>
			</tr>
		</thead>
		<tbody>		
			<?php foreach ($bieren as $key => $biernaam): ?>
				<tr class="<?= ( ( $key + 1) %2 == 0 ) ? 'even' : '' ?>">
					<td><?= ( $key + 1 ) ?></td>
					<td><?= $biernaam ?></td>
				</tr>
			<?php endforeach ?>
		</tbody>
	</table>
</body>
</html>
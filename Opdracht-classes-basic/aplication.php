<?php

	function __autoload( $className ) {
	    include 'classes/' . $className . '.php';
	}

	$new	=	150;
	$unit	=	100;

	$percent = new Percent( $new, $unit );

?>
<!DOCTYPE html>
<html>
<head>
</head>
<body>

<table>
	<p>Hoe staat <?= $new ?> in verhouding tot <?= $unit ?>?:</p>
	<tr>
		<td>Relatief</td>
		<td><?= $percent->relative ?></td>
	</tr>
	<tr>
		<td>Procentueel</td>
		<td><?= $percent->hundred ?>%</td>
	</tr>
	<tr>
		<td>Nominaal</td>
		<td><?= $percent->nominal ?></td>
	</tr>
	
</table>

</body>
</html>
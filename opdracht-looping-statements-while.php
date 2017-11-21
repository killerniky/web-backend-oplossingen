<?php

	$emptyArr		=	array();
	$allNumbers	=	101;
	$nmbr = 0;
	while ( $nmbr < $allNumbers )
	{
		$emptyArr[]	=	$nmbr;
		 $nmbr++;
	}
	$emptyArrComma	=	implode( ', ', $emptyArr );

	$nmbr=0;
	$emptyArr2	=	array();
	while ( $nmbr < $allNumbers )
	{
		if ( $nmbr % 3 == 0 && $nmbr > 40 && $nmbr < 80 )
		{
			$emptyArr2[]	=	$nmbr;
		}
		$nmbr++;
	}
	$emptyArrComma2	=	implode( ', ', $emptyArr2 );

	
?>



	<!doctype html>
	<html>

	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Opdracht while</title>
		<link rel="stylesheet" href="http://web-backend.local/css/global.css">
		<link rel="stylesheet" href="http://web-backend.local/css/facade.css">
		<link rel="stylesheet" href="http://web-backend.local/css/directory.css">
	</head>

	<body class="web-backend-opdracht">

		<section class="body">

			<h1>Opdracht while: deel 1</h1>

			<ul>

				<li>Druk alle getallen af van 0 tot 100 afgescheiden door een komma en een spatie ' , '.</li>

				<li>Op een volgende lijn druk je alle getallen af die deelbaar zijn door 3 én groter zijn dan 40 mààr kleiner zijn dan 80.</li>
				<br>
				<li><?php var_dump($emptyArrComma); ?></li>
				<br>
				<li><?php var_dump($emptyArrComma2); ?></li>

			</ul>

			<h1>Opdracht while: deel 2</h1>

			<ul>
				<li>Maak een array <code>$boodschappenlijstje</code> en plaats hierin enkele boodschapjes.</li>

				<li>Print deze boodschappen af in het HTML-gedeelte en plaats ze in <code>&lt;li&gt;</code>-elementen. Al deze <code>&lt;li&gt;</code>-elementen staan op hun beurt weer in één <code>&lt;ul&gt;</code>.</li>

				<li>Valideer je code met de <a href="http://validator.w3.org/">W3 Validator</a>. Dit doe je door de source-code van je document te bekijken <kbd>ctrl + u</kbd> / <kbd>⌘-Option-U</kbd>, deze te kopiëren en te plakken in de "direct input" tab.</li>

				<li>Als je code niet geldig is, maak je de nodige wijzigingen.</li>
				<?php 
				$boodschapCounter 		= 	0;
				?>
				<?php while( isset( $boodschappenlijstje [ $boodschapCounter ] ) ):  ?>
				
				<li><?= $boodschappenlijstje [ $boodschapCounter ] ?></li>
				

				<?php $boodschapCounter++ ?>
			<?php endwhile ?>
			</ul>
		</section>
	</body>

	</html>

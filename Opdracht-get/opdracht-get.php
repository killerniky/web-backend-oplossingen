<?php
 
	$artikels = array (array ('titel'=>'Israël weigert met Palestijnse eenheidsregering te spreken zonder ontwapening Hamas', 
							  'datum' => '17 Oct 2017',
								 'inhoud'=>'De Israëlische regering zegt dat ze niet zomaar het gesprek wil aangaan met een dergelijke Palestijnse regering van nationale eenheid. Dat zou pas mogelijk zijn als Hamas ervoor kiest te ontwapenen. Tel Aviv eist daarnaast ook dat Hamas afziet van geweld en overgaat tot de erkenning van Israël.',
								'afbeelding' => 'artikel1.jpg',
								'afbeeldingBeschrijving' => 'Man met masker voor vlag',),
						  array ('titel'=>'Trump zakt in lijst van superrijken', 
								 'datum' => '17 Oct 2017',
			 					 'inhoud'=> 'Trump maakte vooral fortuin als vastgoedmagnaat, alvorens hij als politieke nieuwkomer in 2016 een gooi deed naar het Amerikaanse presidentschap. Zijn vermogen wordt nu geschat op 3,1 miljard dollar. Dat is 600 miljoen minder dan vorig jaar, aldus Forbes. Trump zakte tot de 248ste plaats in de Forbes-lijst, tegen plaats 156 in 2016.',
								'afbeelding' => 'artikel2.jpg',
								'afbeeldingBeschrijving' => 'Donald Trump in de Rose Garden',),
						  array ('titel'=>'De vervuiler betaalt? Kerncentrales dicht? U beslist mee vanaf vandaag',
								 'datum' => '17 Oct 2017',
								'inhoud'=>'De federale en regionale ministers van Energie in België beslisten in april om een interfederaal energiepact op te stellen voor 2030 en 2050, in nauw overleg met alle betrokkenen. Een van de grootste knopen die daarin doorgehakt  zou moeten worden, is het lot van de kerncentrales in ons land. En ook hoe hernieuwbare energie aangepakt worden, wordt een behoorlijk zware dobber.',
								'afbeelding' => 'artikel3.jpg',
								'afbeeldingBeschrijving' => 'Man die zonnepannelen aan het installeren is',)
						 );
	$individueelArtikel		= 	false;
	$nietBestaandArtikel	=	false;

	// Controleren of de get-variabele ID geset is om een individueel artikel op te halen
	if ( isset ( $_GET['id'] ) )
	{
		$id = $_GET['id'];

		// Controleren of 	de opgevraagde key (=id) bestaat in de array $artikels
		if ( array_key_exists( $id , $artikels ) )
		{
			$artikels 			= 	array( $artikels[$id] );
			$individueelArtikel	=	true;
		}
		else
		{
			$nietBestaandArtikel	=	true;
		}		
	}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<?php if ( !$individueelArtikel ): ?>
		<title>Deel1</title>
	<?php elseif ( $nietBestaandArtikel ): ?>
		<title>Het artikel met id <?php echo $id ?> bestaat niet</title>
	<?php else: ?>
		<title>Deel1. Artikel: <?php echo $artikels[0]['titel'] ?></title>
	<?php endif ?>
		
	<style>
		body
		{
			font-family:"Segoe UI";
			color:#423f37;
		}

		.container
		{
			width:	1024px;
			margin:	0 auto;
		}

		img
		{
			max-width: 100%;
		}

		.multiple
		{
			float:left;
			width:288px;
			margin:16px;
			padding:16px;
			box-sizing:border-box;
			background-color:#EEEEEE;
		}

		.multiple:nth-child(3n+1)
		{
			margin-left:0px;
		}

		.multiple:nth-child(3n)
		{
			margin-right:0px;
		}

		.single img
		{
			float:right;
			margin-left: 16px;
		}


	</style>
</head>
<body>	

	<?php if ( !$nietBestaandArtikel ): ?>
		<div class="container">
			<?php foreach ( $artikels as $id => $artikel ): ?>
				<article class="<?php echo ( !$individueelArtikel ) ? 'multiple': 'single' ; ?>">
					<h1><?php echo $artikel['titel'] ?></h1>
					<p><?php echo $artikel['datum'] ?></p>
					<img src="img/<?php echo $artikel['afbeelding'] ?>" alt="<?php echo $artikel['afbeeldingBeschrijving'] ?>">
					<p><?php echo ( !$individueelArtikel ) ? str_replace ( "\r\n", "</p><p>", substr( $artikel['inhoud'], 0, 50 ) ) . '...': str_replace ( "\r\n", "</p><p>",$artikel['inhoud'] ) ; ?></p>
					<?php if ( !$individueelArtikel ): ?>
						<a href="opdracht-get.php?id=<?php echo $id ?>">Lees meer</a>
					<?php endif ?>
				</article>
			<?php endforeach ?>
		</div>
	<?php else: ?>
		<p>Het artikel met id <?php echo $id ?> bestaat niet. Probeer een ander artikel.</p>
	<?php endif ?>

</body>
</html>
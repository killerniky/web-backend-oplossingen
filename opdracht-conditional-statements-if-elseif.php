<?php 
	$min='';
	$max='';
	$getal=85;
	if(0<=$getal&&$getal<=10)
	{
		echo $getal." ligt tussen 0 en 10";
		
	}
	elseif(11<=$getal&&$getal<=20)
	{
		
	}
	elseif(21<=$getal&&$getal<=30)
	{
		
	} 
	elseif(31<=$getal&&$getal<=40)
	{
		
	}
	elseif(41<=$getal&&$getal<=50)
	{
		
	}
	elseif(51<=$getal&&$getal<=60)
	{
		
	}
	elseif(61<=$getal&&$getal<=70)
	{
		
	}
	elseif(71<=$getal&&$getal<=80)
	{
		
	}
	elseif(81<=$getal&&$getal<=90)
	{
		$min=81;
		$max=90;
		$response =$getal." ligt tussen ".($min-1)." en ".$max;	
		echo $response."\n";
		echo strrev($response);
	}
	elseif(91<=$getal&&$getal<=100)
	{
		
	}
?>

<!doctype html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Opdracht if else if</title>
	<link rel="stylesheet" href="http://web-backend.local/css/global.css">
	<link rel="stylesheet" href="http://web-backend.local/css/facade.css">
	<link rel="stylesheet" href="http://web-backend.local/css/directory.css">
</head>

<body class="web-backend-opdracht">

	<section class="body">

		<h1>Opdracht if else if: deel 1</h1>

		<ul>
			<li>Maak een getal met een waarde tussen 1-100</li>
			<li>Zorg ervoor dat het script kan zeggen tussen welke tientallen het getal ligt, bv 'Het getal ligt tussen 20 en 30'.</li>
			<li>Zorg er vervolgens voor dat de boodschap omgekeerd afgedrukt wordt, bv '03 ne 02 nessut tgil lateg teH'.</li>
		</ul>

	</section>

</body>

</html>

<?php
	$getal=4;
	switch($getal){
		case 1:
			echo strtolower("Monday");
			break;
		case 2:
			echo strtolower("tue");
			break;
		case 3:
			echo strtolower("Wens");
			break;
		case 4:
			echo strtolower("ThuRs");
			break;
		case 5:
			echo strtolower("FrY");
			break;
		case 6:
			echo strtolower("Sat");
			break;
		case 7:
			echo strtolower("SuN");
			break;
		default:
			echo "no valid day was found";
			break; 
	}
?>



<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Opdracht switch</title>
        <link rel="stylesheet" href="http://web-backend.local/css/global.css">
        <link rel="stylesheet" href="http://web-backend.local/css/facade.css">
        <link rel="stylesheet" href="http://web-backend.local/css/directory.css">
    </head>
    <body class="web-backend-opdracht">
        
        <section class="body">
        
            <h1>Opdracht switch: deel 1</h1>

            <ul>
                <li>Maak een HTML-document met een PHP code-block</li>
                <li>Maak een PHP-script dat aan de hand van een getal ( tussen 1 en 7 ) de bijhorende dag afprint in kleine letters (geen hoofdletters!)</li>
                <li>Maak gebruik van een switch en probeer alles te herschrijven i.p.v. te kopiëren.</li>
            </ul>  

        </section>

    </body>
</html>

<?php 
	setlocale(LC_ALL, 'nl_NL');

	$dateStamp=mktime(22,35,05,1,21,1904);
	$date= date("j F Y, g:i:s a ",$dateStamp);
	
	$dateDutch = strftime('j %F %Y, %g:%i:%s %a', $dateStamp);	

	
	
?>


<!doctype html>
<html> 
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Opdracht date</title>
        <link rel="stylesheet" href="http://web-backend.local/css/global.css">
    </head>
    <body class="web-backend-opdracht">
        <section class="body">
            <h1>Opdracht date: deel 1</h1>

            <ul>
                <li>Maak een geldig HTML document</li> 

                <li>Zet deze datum 22u 35m 25sec 21 januari 1904 om naar een timestamp</li>

                <li>Toon deze timestamp daarna in het volgende formaat: 21 January 1904, 10:35:25 pm</li>
                <br>
                <li><b>Antwoord: <?= $date ?></b></li>
            </ul>

            <h1>Opdracht date: deel 2</h1>

            <ul>
                <li>Zorg dat de benamingen in het Nederlands komen te staan</li>
                <br>
                <li><b>Antwoord: <?= $dateDutch ?>Antwoord komt niet in browser?</b></li>
            </ul>
        </section>
    </body>
</html>

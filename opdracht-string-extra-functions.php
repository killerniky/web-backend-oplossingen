<?php 
	$fruit= "kokosnoot";
	$fruitLengte=strlen($fruit);
	$charPositie=strpos($fruit,"o")+1;

	$fruit2="ananas";
	$charPostitie2=strrpos($fruit2,"a")+1;
	$charFruit2=strtoupper($fruit2);

	$lettertje="e";
	$cijfertje=3;
	$langsteWoord="zandzeepsodemineralenwatersteenstralen";
	$changedWord=str_replace($lettertje,$cijfertje,$langsteWoord);
?>


<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Opdracht string extra functions</title>
        <link rel="stylesheet" href="http://web-backend.local/css/global.css">
        <link rel="stylesheet" href="http://web-backend.local/css/facade.css">
        <link rel="stylesheet" href="http://web-backend.local/css/directory.css">
    </head>
    <body class="web-backend-opdracht">
        
        <section class="body">
        
            <h1>Opdracht string extra functions: deel 1</h1>

            <ul>
                <li>Maak een variabele <code>$fruit</code> met <code>'kokosnoot'</code> als value</li>
                <li>Bereken hoeveel karakters de variabele fruit telt, uiteraard door middel van een PHP-functie.</li>
                <li>Druk deze waarde af.</li>
                <li>Bepaal de positie van de eerste 'o' in de variabele <code>$fruit</code>. Druk deze waarde af.</li>
                <br>
               	<b>
                <li>de fruitlengte is <?= $fruitLengte ?></li>
                <li>de letter o staat op positie <?= $charPositie ?></li>
                </b>
            </ul>
      
            <h1>Opdracht string extra functions: deel 2</h1>

            <ul>
                <li>Maak een variabele <code>fruit</code> met waarde <code>'ananas'</code></li>
                <li>Bepaal de positie van de laatste 'a' in de variabele <code>$fruit</code>.</li>
                <li>Druk deze waarde af.</li>
                <li>Zet het de value van de <code>$fruit</code> variable in hoofdletters enkel door gebruik te maken van een PHP-functie.</li>
                <br>
                <b>
                <li>Positie van a in woord is <?= $charPostitie2?></li>
                <li><?= $charFruit2?></li></b>
            </ul>
      
    		<h1>Opdracht string extra functions: deel 3</h1>

    		<ul> 
                <li>Maak een variabele <code>$lettertje</code> met <code>'e'</code> als value</li>
                <li>Maak een variabele <code>$cijfertje</code> met <code>3</code> als value</li>
                <li>Maak een variabele <code>$langsteWoord</code> met <code>'zandzeepsodemineralenwatersteenstralen'</code> als value</li>
                <li>Vervang nu alle e’s in de <code>$langsteWoord</code> variable door 3's. 
                    <p class="remark">Je mag enkel gebruik maken van de variable names. De values  <code>'e'</code>, <code>'3'</code> en <code>'zandzeepsodemineralenwatersteenstralen'</code> mogen in totaal maar één keer in het php-document voorkomen.</p>
                </li>
                <br>
                <li><?= $changedWord?></li>
    		</ul>

        </section>

    </body>
</html>

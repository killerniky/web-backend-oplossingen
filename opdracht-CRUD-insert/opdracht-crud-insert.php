<?php

    $message= false;

    if(isset($_POST['submit']))
    try{
        $db = new PDO('mysql:host=localhost;dbname=bieren', 'root', '');

        $message = "U heeft verbinden met de database";

        $query= "INSERT INTO brouwers(brnaam, adres, postcode, gemeente, omzet)
        values (:brnaam, :adres,:postcode,:gemeente,:omzet)";

        $statement = $db -> prepare($query);

            $statement->bindValue( ':brnaam', $_POST[ 'brnaam' ] );
            $statement->bindValue( ':adres', $_POST[ 'adres' ] );
            $statement->bindValue( ':postcode', $_POST[ 'postcode' ] );
            $statement->bindValue( ':gemeente', $_POST[ 'gemeente' ] );
            $statement->bindValue( ':omzet', $_POST[ 'omzet' ] );

        $isAdded = $statement->execute();

        if ( $isAdded )
        {
            $insertId    =    $db->lastInsertId();
            $message    =    'Brouwerij succesvol toegevoegd. Het unieke nummer van deze brouwerij is ' . $insertId .'.';
        }
        else
        {
            $message    =    'Er ging iets mis met het toevoegen. Probeer opnieuw';
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
</head>
<body>
    <?php if($message): ?>
    <p>(<?= $message?>)</p>
    <?php endif ?>

    <h1>Voeg een brouwer toe</h1>
    <form action="<?= $_SERVER['PHP_SELF'] ?>" method="POST">
    <ul>
        <li>
        <label for="">Brouwernaam</label>
        <input type="text" name="brnaam" id="brnaam">
        </li>
        <li>
        <label for="">adres</label>
        <input type="text" name="adres" id="adres">
        </li>
        <li>
        <label for="">postcode</label>
        <input type="text" name="postcode" id="postcode">
        </li>
        <li>
        <label for="">gemeente</label>
        <input type="text" name="gemeente" id="gemeente">
        </li>
        <li>
        <label for="">omzet</label>
        <input type="text" name="omzet" id="omzet">
        </li>
        <input type="submit" name="submit" id="submit">
    </ul>
    </form>
</body>
</html>

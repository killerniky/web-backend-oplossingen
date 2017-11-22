<?php  

    function __autoload( $className ) {
	    require_once('Classes/' . $className . '.php');
	}
	$hond = new Animal("Hendrik","male","20");
	$neushoorn = new Animal("Vincent","male","18");
	$paard = new Animal("Lola","female","25");
	
	$hond->changeHealth(-10);
	
	$leeuw1= new Lion("Simba","male","10000","Felidae");
	$leeuw2= new Lion("Rumba","female","15000","Katanga");
	
	$zebra1= new Zebra("Randy","male","1000","African");
	$zebra2= new Zebra("Lora","female","1000","Mid-African");
	
	
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>

<body>
	<h2>Instansies van de Animal Class</h2>
	<p>
		<?php echo $hond->getName() ?> heeft als gender
		<?php echo $hond->getGender() ?> en heeft
		<?php echo $hond->getHealth() ?> health. (Special move:
		<?php echo $hond->doSpecialMove()?>)</p>

	<p>
		<?php echo $neushoorn->getName() ?> heeft als gender
		<?php echo $neushoorn->getGender() ?> en heeft
		<?php echo $neushoorn->getHealth() ?> health. (Special move:
		<?php echo $neushoorn->doSpecialMove()?>)</p>

	<p>
		<?php echo $paard->getName() ?> heeft als gender
		<?php echo $paard->getGender() ?> en heeft
		<?php echo $paard->getHealth() ?> health. (Special move:
		<?php echo $paard->doSpecialMove()?>)
	</p>

	<h2>Instansies van de Lion Class</h2>
	<p>		
		De special move van <?php echo $leeuw1->getName() ?> is <?php echo $leeuw1->doSpecialMove()?>
	</p>
	<p>		
		De special move van <?php echo $leeuw2->getName() ?> is <?php echo $leeuw2->doSpecialMove()?>
	</p>
	
	<h2>Instanties van de Zebra class</h2>
	<p>De special move van <?php echo $zebra1->getName() ?>(Soort: <?php echo $zebra1->getSpecies() ?>) is <?php echo $zebra1->doSpecialMove()?></p>
	<p>De special move van <?php echo $zebra2->getName() ?>(Soort: <?php echo $zebra2->getSpecies() ?>) is <?php echo $zebra2->doSpecialMove()?></p>
</body>

</html>

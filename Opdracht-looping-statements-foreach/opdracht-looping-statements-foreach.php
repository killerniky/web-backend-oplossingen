<?php

	$text	=	file_get_contents( 'text.txt' );	

	$characterArray	=	str_split( $text );	
	rsort( $characterArray );	
	$characterSortedReversed = array_reverse( $characterArray );
	$tellerArray = array();

	foreach($characterSortedReversed as $value)
	{
		if ( isset ( $tellerArray[ $value ] ) )
		{
			++$tellerArray[ $value ];
		}
		else
		{
			$tellerArray[ $value ] = 1;
		}
		
	}
	
?>

<!DOCTYPE html>
<html>
	<head>
		<title>PHP oefening 015 - oplossing</title>
	</head>
	<body>

		<h1>Array van Z naar A</h1>
		<pre><?php //var_dump ( $characterArray ) ?></pre>

		<h1>Array reversed</h1>
		<pre><?php //var_dump ( $characterSortedReversed ) ?></pre>

		<h1>Array reversed</h1>
		<pre><?php var_dump ( $tellerArray ) ?></pre>
		
	</body>
</html>
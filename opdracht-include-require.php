<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>Opdracht-include-require</title>
</head>
<style>
	* {
		margin: 0;
		padding: 0;
		width: 100%;
	}
	
	section .left {
		margin: 0 auto;
	}
	
	nav ul li {
		float: left;
	}
	
	nav ul li {
		list-style: none;
		text-align: center;
	}
	
	section .middle article {
		float: left;
	}
	
	.clearfix::after {
		content: "";
		clear: both;
		display: table;
	}

</style>

<body>
	<section class="intro">
		<h1>Dit is een website</h1>
		<nav>
			<ul class="clearfix">
				<li><a href="#">link</a></li>
				<li><a href="#">link</a></li>
				<li><a href="#">link</a></li>
				<li><a href="#">link</a></li>
			</ul>
		</nav>
	</section>

	<section class="middle">
		<div class="left">
			<article>
				<h1>lol</h1>
				<p>lolie</p>
				<p>lolie</p>
			</article>
		</div>
		<div class="middle">
			<article>
				<h1>lol</h1>
				<p>lolie</p>
				<p>lolie</p>
			</article>
		</div>
		<div class="right">
			<article>
				<h1>lol</h1>
				<p>lolie</p>
				<p>lolie</p>
			</article>
		</div>
	</section>
	<section class="footer">
		<footer>
			<ul>
				<li><a href="#">link</a></li>
				<li><a href="#">link</a></li>
				<li><a href="#">link</a></li>
				<li><a href="#">link</a></li>
			</ul>
		</footer>
	</section>
</body>

</html>

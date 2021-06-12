<!--- 
	Template for header and footer to use at all pages
-->

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Drink List</title>
</head>
<body>

<header>
	<div id="symbol">
		<h1>DRINK LIST</h1> 
	</div>

	<nav id="menu">
		<ul>
	        <li><a href= "home/index">Home</a></li>
	        <li><a href= "cocktail/index">Cocktail</a></li>
	        <li><a href="beer/index">Beer</a></li>
	        <li><a href="finalList/index">Final List</a></li>
    	</ul>
	</nav>

</header>

<?php 

$this->loadViewAtTemplate($viewName, $modelData);

?>

<br><br>
<footer style="font-size: 10pt;">
	<p class="footer" id="Author" style="text-align: center;">Viviane Ruotolo</p>
	<p class="footer" id="location" style="text-align: center;">Aracaju-SE</p>
</footer>

</body>
</html>
<!--- 
	Get requirements about cocktails from user to filter the options 
-->

<section class="pageTitle">
	<h2 class="title">Choose the best cocktail!</h2>
	<h4 class="subtitle">Select your preferences at this form:</h4>
</section>

<main>
	<form method="post" action="cocktail/listCocktail">
		<p class="form">
			<input type="number" name="minABV" id="minABV" placeholder="Minimum value of ABV">
			<input type="number" name="maxABV" id="maxABV" placeholder="Maximum value of ABV">
			<input type="number" name="ingredients" id="ingredients" placeholder="Ingredients quantity">
			<select name="glass" id="glass">
				<?php 
					for ($i=0; $i < 32 ; $i++) { 
						echo "<option value=".$modelData['drinks'][$i]['strGlass'].">".$modelData['drinks'][$i]['strGlass']."</option>";
					}
				?>	
			</select>
			<input type="submit" value="submit" class="submitInput">
		</p> 
	</form>	
</main>
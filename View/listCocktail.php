<!--- 
	List cocktails that fit with requirements to be selected by user
-->


<section class="pageTitle">
	<h2 class="title">Choose the best cocktail!</h2>
</section>

<main>

	<?php 
		$allCocktais = count($modelData);
		$mensagem = "novo oi, hein";

		if (!empty($modelData)){
			for ($i=0; $i < $allCocktais; $i++) { 
				$tagHTML =
					"<div class='cocktailsOptions' id=".$modelData[$i]['strDrink']."style= 'color: red; width: 100px; height: 100px;'>
						<figure>
						<img src=".$modelData[$i]['strDrinkThumb']." >
						<figcaption id = ".$modelData[$i]['strDrink']." >".$modelData[$i]['strDrink']."</figcaption>
						</figure>	
					</div>
				";

				echo $tagHTML;
			}
		} else {
			$tagHTML = 
				"<div class='cocktailsOptions' id='fail' style='background-color: black; color: red; width: 100px; height: 100px;'>There are not any cocktail with these requirements</div>";
		}

?>

<!-- Error when you redirect to another page by menu after submit data from form-->
</main>
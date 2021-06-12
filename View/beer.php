<!--- 
	List beers at API to be selected by user
-->

<section class="pageTitle">
	<h2 class="title">Choose the best Beer!</h2>
</section>

<main>

	<?php 
		
		$allBeers = count($modelData);
		
		for ($i=0; $i < $allBeers; $i++) { 
			$tagHTML =
				"<div class='BeersOptions' id=".$modelData[$i]['name']."style= 'color: red; width: 100px; height: 100px;'>
					<figure>
					<img src=".$modelData[$i]['image']." >
					<figcaption>".$modelData[$i]['name']."</figcaption>
					</figure>	
				</div>
			";

			echo $tagHTML;
		}
?>
</main>
<?php 

Class cocktailController extends Controller
{
	
	//Get cocktails preferences from user
	public function index(){

		$drink = new Drink();

		$glassTypes = $drink->ListGlassType();

		$this->loadTemplate('cocktail', $glassTypes);
	}

	//Verify 10 random cocktails with user requirements
	//Send to view the ones that fits in these categories  
	public function listCocktail(){

		$cocktail = new Cocktail();
		$ingredient = new Ingredient();
		
		$maxABV = $_POST['maxABV'];
		$minABV = $_POST['minABV'];
		$quantIngredient = $_POST['ingredients'];

		$randomCocktails = $cocktail->list10Random();
		$arrayPosition = 0;

		for ($i=0; $i < 10; $i++) { 
			$selectedCocktail = $randomCocktails['drinks'][$i];

			//Select ingredients and glass type used on $selectedCocktail
			$ingredients = $cocktail->listIngredientsFromCocktail($selectedCocktail);
			$glassTypeFromResearch = $cocktail->getGlassType($selectedCocktail);
			$acceptableABV = true;
			
			foreach ($ingredients as $ing) {
				$ABV = $ingredient->discoverABVFromIngredient($ing);
				if ($ABV != "0" && ($ABV < $minABV || $ABV > $maxABV)){
					$acceptableABV = false;
				}
			}

			if ($acceptableABV && count($ingredients) <= $quantIngredient){
				$cocktailsList[$arrayPosition]['strDrink'] = $selectedCocktail['strDrink'];
				$cocktailsList[$arrayPosition]['strVideo'] = $selectedCocktail['strVideo'];
				$cocktailsList[$arrayPosition]['strGlass'] = $selectedCocktail['strGlass'];
				$cocktailsList[$arrayPosition]['strInstructions'] = $selectedCocktail['strInstructions'];
				$cocktailsList[$arrayPosition]['strDrinkThumb'] = $selectedCocktail['strDrinkThumb'];
				$arrayPosition++;
			}			
		}

		if (empty($cocktailsList)){
			$cocktailsList = array();
		} 

		$this->loadTemplate('listCocktail', $cocktailsList);
	}
}

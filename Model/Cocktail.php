<?php 


class Cocktail extends Drink
{

	function listPopular(){
		$curl = curl_init();

		curl_setopt_array($curl, [
			CURLOPT_URL => "https://the-cocktail-db.p.rapidapi.com/popular.php",
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_FOLLOWLOCATION => true,
			CURLOPT_ENCODING => "",
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 30,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => "GET",
			CURLOPT_HTTPHEADER => [
				"x-rapidapi-host: the-cocktail-db.p.rapidapi.com",
				"x-rapidapi-key: 09d8e86b69msh367d3917d7092d8p152d35jsnbed02402c430"
			],
		]);

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		if ($err) {
			return $err;
		} else {
			$jsonRandomCocktails = json_decode($response, true);
			return $jsonRandomCocktails;
		}
	}

	function searchByName($cocktail){

		$curl = curl_init();

		curl_setopt_array($curl, [
			CURLOPT_URL => "https://the-cocktail-db.p.rapidapi.com/search.php?i=".convertStrToUrl($cocktail),
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_FOLLOWLOCATION => true,
			CURLOPT_ENCODING => "",
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 30,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => "GET",
			CURLOPT_HTTPHEADER => [
				"x-rapidapi-host: the-cocktail-db.p.rapidapi.com",
				"x-rapidapi-key: 09d8e86b69msh367d3917d7092d8p152d35jsnbed02402c430"
			],
		]);

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		if ($err) {
			return $err;
		} else {
			$jsonRandomCocktails = json_decode($response, true);
			return $jsonRandomCocktails;
		}
	}

	function searchDetailsById($id){
		$curl = curl_init();

		curl_setopt_array($curl, [
			CURLOPT_URL => "https://the-cocktail-db.p.rapidapi.com/lookup.php?i=".convertStrToUrl($id),
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_FOLLOWLOCATION => true,
			CURLOPT_ENCODING => "",
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 30,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => "GET",
			CURLOPT_HTTPHEADER => [
				"x-rapidapi-host: the-cocktail-db.p.rapidapi.com",
				"x-rapidapi-key: 09d8e86b69msh367d3917d7092d8p152d35jsnbed02402c430"
			],
		]);

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		if ($err) {
			return $err;
		} else {
			$jsonRandomCocktails = json_decode($response, true);
			return $jsonRandomCocktails;
		}
	}

	function list10Random(){
		$curl = curl_init();

		curl_setopt_array($curl, [
			CURLOPT_URL => "https://the-cocktail-db.p.rapidapi.com/randomselection.php",
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_FOLLOWLOCATION => true,
			CURLOPT_ENCODING => "",
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 30,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => "GET",
			CURLOPT_HTTPHEADER => [
				"x-rapidapi-host: the-cocktail-db.p.rapidapi.com",
				"x-rapidapi-key: 09d8e86b69msh367d3917d7092d8p152d35jsnbed02402c430"
			],
		]);

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		if ($err) {
			return $err;
		} else {
			$jsonRandomCocktails = json_decode($response, true);
			return $jsonRandomCocktails;
		}
	}

	function ingredientCounter($responseCocktail){

		$counter = 0;

		foreach ($responseCocktail['drinks'] as $drink) {
			for ($i = 1; $i < 16; $i++){
				if ($drink['strIngredient'.$i] != null){
					$counter++;				
				}
			}
		}
		return $counter;
	}

	function getGlassType($responseCocktail){

		$glassType = $responseCocktail['strGlass'];
		return $glassType;
	}

	function listIngredientsFromCocktail($responseCocktail){

		$ingredients = array();
		$counter = 0;
		for ($i = 1; $i < 16; $i++){
			if ($responseCocktail['strIngredient'.$i] != null){	
				$ingredients[$counter] = $responseCocktail['strIngredient'.$i];
				$counter++;
			}
		}
		return $ingredients;
	}


	/*--------------- Get data to put on report --------------- */
	function getImageLink($responseCocktail){

		foreach ($responseCocktail['drinks'] as $drink) {
			$image = $drink['strDrinkThumb'];
		}
		return $image;
	}

	function getInstructions($responseCocktail){

		foreach ($responseCocktail['drinks'] as $drink) {
			$instructions = $drink['strInstructions'];
		}
		return $instructions;
	}

	function getVideoLink($responseCocktail){
	
		foreach ($responseCocktail['drinks'] as $drink) {
			$video = $drink['strVideo'];
		}
		return $video;
	}
}
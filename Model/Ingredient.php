<?php

class Ingredient
{

	function searchIngredientByName($ingredient){
		$curl = curl_init();

		curl_setopt_array($curl, [
			CURLOPT_URL => "https://the-cocktail-db.p.rapidapi.com/search.php?i=".$this->convertStrToUrl($ingredient),
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
			$arrayDecodedJson = json_decode($response, true);
			return $arrayDecodedJson;
		}
	}

	function listAll(){
		$curl = curl_init();

		curl_setopt_array($curl, [
			CURLOPT_URL => "https://the-cocktail-db.p.rapidapi.com/list.php?i=list",
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
			$arrayDecodedJson = json_decode($response, true);
			return $arrayDecodedJson;
		}
	}

	function searchById($id){
		$curl = curl_init();

		curl_setopt_array($curl, [
			CURLOPT_URL => "https://the-cocktail-db.p.rapidapi.com/lookup.php?iid=".convertStrToUrl($id),
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
			$arrayDecodedJson = json_decode($response, true);
			return $arrayDecodedJson;
		}
	}

	//Format String to use on URL
	function convertStrToUrl($str){
		return 	str_replace(' ', '%20', $str);
	}


	function discoverABVFromIngredient($ingredient){

		$array = $this->searchIngredientByName($ingredient);

		foreach ($array['ingredients'] as $ingredient) {
			if ($ingredient['strAlcohol'] == "Yes"){
				return $ingredient['strABV'];
			}
		}		
		return "0";
	}


	//Get data to use on view
	function getDescription($ingredient){
		
		$array = $this->searchIngredientByName($ingredient);

		foreach ($array['ingredients'] as $ingredient) {
			if ($ingredient['strDescription'] != null){
				return $ingredient['strDescription'];
			}
		}		
		return " ";
	}
}




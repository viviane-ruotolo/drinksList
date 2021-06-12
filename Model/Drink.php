<?php 

class Drink
{

	//Shows a drink category data: Name, Thumb and ID
	function filterByCategory($category){
		$curl = curl_init();

		curl_setopt_array($curl, [
			CURLOPT_URL => "https://the-cocktail-db.p.rapidapi.com/filter.php?c=".$this->convertStrToUrl($category),
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

	function ListGlassType(){
		$curl = curl_init();

		curl_setopt_array($curl, [
			CURLOPT_URL => "https://the-cocktail-db.p.rapidapi.com/list.php?g=list",
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

	function listDrinks($response){
		
		$i = 0;
		foreach ($response['drinks'] as $drink) {
			$namesArray[$i] = $drink['strDrink'];
			$i++;
		}
		return $namesArray;
	}

	function getCategoryData($category){
		
		$responseJson = $this->filterByCategory($category); 
		
		$i = 0;
		foreach ($responseJson['drinks'] as $drink) {
			$image = $drink['strDrinkThumb'];
			$name = $drink['strDrink'];
			$data[$i]['name'] = $name;
			$data[$i]['image'] = $image;
			$i++;
		}

		return $data;
	}

	//Format string to use on URL
	function convertStrToUrl($str){
		return 	str_replace(' ', '%20', $str);
	}
}
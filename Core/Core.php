<?php 

//Format URL 
class Core
{

	public function __construct(){
		$this->run();
	}

	public function run(){

		$parameters = array();

		if (isset($_GET['pag'])){
			$url = $_GET['pag'];
		} 

		//Exists information after domain 
		//Organize with this order: domain/class/method/parameters
		if (!empty($url)){
			$url = explode('/', $url); //Return an array
			$controller = $url[0].'Controller';

			array_shift($url); //remove first position

			if (isset($url[0]) && !empty($url[0])){
				$method = $url[0];
				array_shift($url);
			} else{
				$method = 'index'; 
			}

			if (count($url) > 0){
				$parameters = $url;
			}
		
		} else{
			$controller = 'homeController';
			$method = 'index';
		}

		$path = 'drinksList/Controller/'.$controller.'.php';

		//Verify if these datas does not exists
		if(!file_exists($path) && !method_exists($controller, $method)){
			$controller = 'homeController';
			$method = 'index';
		}

		$c = new $controller;

		//Call the related method with its parameters from URL
		call_user_func_array(array($c, $method), $parameters); 
	}

}
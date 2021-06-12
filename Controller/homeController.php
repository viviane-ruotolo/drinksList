<?php 

Class homeController extends Controller
{

	public $modelData = array();

	//Main page with some drink curiosities 
	public function index(){

		$ingredient = new Ingredient();

		$this->modelData['descBeer'] = $ingredient->getDescription('Beer');
		$this->modelData['descVodka'] = $ingredient->getDescription('Vodka');

		$this->loadTemplate('home', $this->modelData);
	}
}

?>
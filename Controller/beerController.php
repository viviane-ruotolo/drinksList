<?php 

Class beerController extends Controller
{

	//Redirect to Beer main page 
	public function index(){

		$drink = new Drink();

		$beerData = $drink->getCategoryData('Beer');

		$this->loadTemplate('beer', $beerData);
	}
}
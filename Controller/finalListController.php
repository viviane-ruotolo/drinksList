<?php 

Class beerController extends Controller
{
	public function index(){

/*		Get selected beer and selected cocktail
		Show a report with data from each drink */

		$this->loadTemplate('finalList');
	}
}
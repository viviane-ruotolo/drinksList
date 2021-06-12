<?php 

//Load views with the same header and footer
Class Controller 
{
	public $data;
	public $data2;

	public function __construct(){
		$this->data = array();
		$this->data2 = array();
	}

	public function loadTemplate($viewName, $modelData = array(), $modelDataWithoutExtract = array()){
		$this->data = $modelData;
		$this->data2 = $modelDataWithoutExtract;
		require 'View/template.php';
	}

	public function loadViewAtTemplate($viewName, $modelData = array()){
		extract($modelData);
		require 'View/'.$viewName.'.php';
	}
}
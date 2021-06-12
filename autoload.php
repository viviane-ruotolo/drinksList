<!--- 
	Do require automatically when instance a new class
-->

<?php 

spl_autoload_register(function($file_name){

	if (file_exists('Controller/'.$file_name.'.php')){
		require 'Controller/'.$file_name.'.php';
	} elseif (file_exists('Core/'.$file_name.'.php')) {
		require 'Core/'.$file_name.'.php';
	} elseif (file_exists('Model/'.$file_name.'.php')) {
		require 'Model/'.$file_name.'.php';
	}
});

?>
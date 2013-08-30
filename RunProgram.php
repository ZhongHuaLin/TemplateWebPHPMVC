<?php

	include_once('controller/Controller.php');
	
	function runProgram($startpage){
	
		$controller = new Controller();
		$controller->invoke('');
	
	}
?>
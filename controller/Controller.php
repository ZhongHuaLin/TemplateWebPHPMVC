<?php
	include_once('model/Model.php');
	
	class Controller{
		private $model;
		
		function __construct(){
			$this->model = new Model();
		}
		
		public function invoke(){
			if(isset($_GET['type'])){
			
			}else{
				$types = $this->model->getData('TypeList');
				$products = $this->model->getData('AllProduct');
				include 'view/storefront.php';
			}
		}
	}

?>
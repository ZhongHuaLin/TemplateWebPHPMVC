<?php
	include_once('model/Model.php');
	
	class Controller{
		private $model;
		
		function __construct(){
			$this->model = new Model();
		}
		
		public function invoke($from){
			// $types = $this->model->getData('TypeList');
			if(isset($_GET['search'])){
				exit('site under development');
			}else if(isset($_GET['product'])){
				exit('site under development');
			}else{
				switch($from){
				case 'about':
				case 'contact':
					break;
				default:
					$products = $this->model->getData('AllProduct');
					break;
				}
				include 'view/storefront.php';
			}
		}
	}

?>
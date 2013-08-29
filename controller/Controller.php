<?php
	include_once('model/Model.php');
	
	class Controller{
		private $model;
		
		function __construct(){
			$this->model = new Model();
		}
		
		public function invoke($from){
			$types = $this->model->getData('TypeList');
			$frontpage = true;
			if(isset($_GET['type'])){
				exit('site under development');
			}else if(isset($_GET['product'])){
				exit('site under development');
			}else{
				switch($from){
				case 'about':
				case 'contact':
					$frontpage = false;
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
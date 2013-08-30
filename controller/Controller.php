<?php
	include_once('model/Model.php');
	
	class Controller{
		private $model;
		private $default_ipp;
		private $default_pageNum;
		private $ipp;
		private $pageNum;
		
		function __construct(){
			$this->model = new Model();
			$this->default_ipp = 2;
			$this->default_pageNum = 1;
		}
		
		public function invoke($from){
			// $types = $this->model->getData('TypeList');
			$this->ipp = (isset($_GET['ipp']))? (int)$_GET['ipp'] : $this->default_ipp;
			$this->pageNum = (isset($_GET['pageNum']))? (int)$_GET['pageNum'] : $this->default_pageNum;
			
			switch($from){
				case 'about':
				case 'contact':
					break;
				default:
					$products = $this->model->getPartialData('PartialProduct', $this->ipp, $this->pageNum);
					$numPage = $this->model->numChunk;
					break;
			}
			include 'view/storefront.php';
		}
	}

?>
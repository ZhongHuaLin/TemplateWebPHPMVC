<?php
	include_once('model/Model.php');
	
	class Controller{
		private $model;
		private $default_ipp;
		private $default_pageNum;
		private $ipp;
		private $pageNum;
		private $search;
		
		function __construct(){
			$this->model = new Model();
			$this->default_ipp = 2;
			$this->default_pageNum = 1;
		}
		
		public function invoke($from){
			// $types = $this->model->getData('TypeList');
			$this->ipp = (isset($_GET['ipp']) && is_numeric($_GET['ipp']))? (int)$_GET['ipp'] : $this->default_ipp;
			$this->pageNum = (isset($_GET['pageNum']) && is_numeric($_GET['pageNum']))? (int)$_GET['pageNum'] : $this->default_pageNum;
			// TODO: a new page for search and also remember to reset ipp and pageNum for search result
			// else probably will get DATA SEEKING ERROR
			$this->search = (isset($_GET['search']))? $_GET['search'] : null;
			
			switch($from){
				case 'about':
				case 'contact':
					break;
				default:
					$result = $this->model->getData('PartialProductSearch', $this->ipp, $this->pageNum, $this->search);
					if($result['status'] == 'ERROR') exit($result['status'].": ".$result['message']);
					$products = $result['message'];
					//exit(var_dump($products));
					$numPage = $this->model->numChunk;
					break;
			}
			include 'view/storefront.php';
		}
	}

?>
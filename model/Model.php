<?php
	include_once('ProductType.php');
	include_once('Product.php');
	include_once('DataBase.php');
	
	class Model{
		private $database;
		private $db_hostname;
		private $db_username;
		private $db_password;
		private $db_name;
		private $db_tb_name;
		private $db_tb_atr_name;
		public $numChunk;
		
		function __construct(){
			$this->database = new DataBase('localhost', 'root', 'root', 'data');
		}
		
		// Function overloading, when getData() function called
		// it will go directly to this function.
		function __call($name, $arguments){
			if($name == 'getData'){
				if(sizeof($arguments)== 4){
					return $this->getPartialData($arguments[0],$arguments[1],$arguments[2],$arguments[3]);
				}
				return $this->getFullData($arguments[0]);
			}
		}
		
		// Usage: Use to run a Query
		// Output: if there is an error, exit the program
		//         if there is no error, return the message
		public function runQuery($query, $arr){
			$this->database->setQuery($query);
			return $this->database->doQuery($arr);
		}
		
		public function getPartialData($dataType, $ipp, $pageNum, $search){
			switch ($dataType){
				case 'PartialProduct':
					return $this->getProducts($ipp, $pageNum);
					break;
				case 'PartialProductSearch':
					return $this->search($ipp, $pageNum, $search);
				default :
					return array('status'=>'ERROR', 'message'=>'NOT A SUPPORT OPERATION');
					break;
			}
		}
		
		// Usage: Use to get data from model
		// RETURN: array of objects
		public function getFullData($dataType){
			switch($dataType){
			/*	// this is a case to get all list of type which
				// is no longer useful for this web app
				case 'TypeList':
					return $this->getTypeList();
					break;	
			*/
				case 'RecentAdd':
					return $this->getRecentAdd();
					break;
				case 'AllProduct':
					return $this->getAllProduct();
					break;
				default:
					return array('status'=>'ERROR', 'message'=>'NOT A SUPPORT OPERATION');
					break;
			}
		}
		
		// No longer useful since the a product does not have any type.
		/*
		private function getTypeList(){
			$query = 'SELECT * FROM typename';
			$result = $this->runQuery($query);
			$typelist = array();			
			foreach($result as $item){
				$type = new ProductType($item["name"]);
				array_push($typelist, $type);
			}
			return $typelist;
		}
		*/
		
		private function search($ipp, $pageNum, $search){
			$query = "SELECT * FROM product WHERE id like :search OR name like :search
						OR type like :search OR description like :search";
	
			$arr = array(':search'=>'%'.$search.'%');
			return $this->getProductsBySearch($ipp, $pageNum, $query, $arr);
		}
		
		//TODO: should return recently added items.
		private function getRecentAdd(){}
		
		// Usage: use to get partial product list with item per page
		//		  and page number
		// Assume: ipp > 0, pageNum >= 1
		private function getProducts($ipp, $pageNum){
			$query = 'SELECT * FROM product';
			return $this->getProductsBySearch($ipp, $pageNum, $query, null);
		}
		
		// Used to get all product.
		// RETURN: array of all product inside
		private function getAllProduct(){
			$query = 'SELECT * FROM product';
			return $this->getAllProductBySearch($query, null);
		}
		
		private function getProductsBySearch($ipp, $pageNum, $query, $search){
			$productlist = $this->getAllProductBySearch($query, $search);
			if($productlist['status'] == "ERROR"){
				return $productlist;
			}
			$this->numChunk = ceil(sizeof($productlist['message'])/$ipp);
			if($pageNum > $this->numChunk){
				return array('status'=>'ERROR', 'message'=>'THE DATA YOU SEEKING IS NOT EXIST!!');
			}
			return array('status'=>'SUCCESS','message'=>array_chunk($productlist['message'], $ipp)[$pageNum-1]);
		
		}
		
		private function getAllProductBySearch($query, $search){
			$result = $this->runQuery($query, $search);
			if($result['status'] == "ERROR"){
				return $result;
			}
			$productlist = array();
			foreach($result['message'] as $item){
				$newquery = "SELECT * FROM picture WHERE productName = :search";
				$newsearch = array(':search'=>$item["name"]);
				$pics = $this->runQuery($newquery, $newsearch);
				if($pics['status']=="ERROR") $pics['message']=null;
				$prod = new Product($item["id"], $item["name"],$item["type"],$item["description"],$pics['message']);
				array_push($productlist, $prod);
			}

			//	exit(var_dump($productlist));
			return array('status'=>'SUCCESS','message'=>$productlist);
		
		}
	}
?>
<?php
	include_once('ProductType.php');
	include_once('Product.php');
	include_once('DataBase.php');
	
	class Model{
		private $database;
		
		function __construct(){
			$this->database = new DataBase('localhost', 'root', '', 'data');
		}
		
		// Usage: Use to run a Query
		// Output: if there is an error, exit the program
		//         if there is no error, return the message
		public function runQuery($query){
			$this->database->setQuery($query);
			$result= $this->database->doQuery();
			if($result['status'] == "ERROR"){
				exit($result['message']);
			}else{	
				return $result['message'];
			}
		}
		
		// Usage: Use to get data from model
		// RETURN: array of objects
		public function getData($dataType){
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
					exit("ERROR: NOT A SUPPORT OPERATION");
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
		
		//TODO: should return 6 recently added item.
		private function getRecentAdd(){}
		
		// Used to get all product.
		// RETURN: array of all product inside
		private function getAllProduct(){
			$query = 'SELECT * FROM product';
			$result = $this->runQuery($query);
			$productlist = array();
			foreach($result as $item){
				$prod = new Product($item["id"], $item["name"],$item["type"],$item["description"]);
				array_push($productlist, $prod);
			}
			return $productlist;
		}
	}
?>
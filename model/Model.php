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
				case 'TypeList':
					return $this->getTypeList();
					break;
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
		
		private function getRecentAdd(){}
		
		// this function is for test purpose.
		// with a really large database. this is not a good choice
		// better to use getRecentAdd()
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
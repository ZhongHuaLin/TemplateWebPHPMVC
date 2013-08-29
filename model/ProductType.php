<?php
	class ProductType{
		private $name;
		
		function __construct($name){
			$this->name = $name;
		}
		
		public function getName(){
			return $this->name;
		}
		
		public function toArray(){
			return array('name'=>$this->name);
		}
	}
	
?>
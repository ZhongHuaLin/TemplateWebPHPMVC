<?php

	class Product{
		private $id;
		private $name;
		private $type;
		private $description;
		private $pics;
		
		function __construct($id, $name, $type, $description, $picarray){
			$this->id = $id;
			$this->name = $name;
			$this->type = new productType($type);
			$this->description = $description;
			$this->pics = $picarray;
		}
		
		public function getId(){
			return $this->id;
		}
		
		public function getName(){
			return $this->name;
		}
		
		public function getTypeString(){
			return $this->type->getName();
		}
		
		public function getDescript(){
			return $this->description;
		}

		public function getPicArray(){
			return $this->pics;
		}
	}

?>
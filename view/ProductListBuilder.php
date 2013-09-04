<?php

	include_once('Builder.php');

	class ProductListBuilder implements Builder
	{
		private $plist;
		private $vertical;
		
		function __construct($plist, $vertical){
			$this->plist = $plist;
			$this->vertical = $vertical;
		}
		
		public function draw(){
			echo '<div class="container">';
			echo '<div class="row" >';
			foreach($this->plist as $item){
				if(!$this->vertical)echo '<div class="col-lg-4">';
				echo '<h1>'.$item->getName().'</h1>';
				echo '<p>'.$item->getDescript().'</p>';
				echo '<p><a class="btn btn-primary" href="'.basename($_SERVER['PHP_SELF']).'?product='.$item->getName().'">More Info >></a></p>';
				echo '<hr>';
				if(!$this->vertical)echo '</div>';
			}
			echo '</div>';
			echo '</div>';
		}
	}

?>
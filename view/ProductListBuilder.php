<?php

	include_once('Builder.php');

	class ProductListBuilder implements Builder
	{
		private $plist;
		
		function __construct($plist){
			$this->plist = $plist;
		}
		
		public function draw(){
			echo '<div class="container">';
			echo '<div class="row" >';
			foreach($this->plist as $item){
				echo '<div class="col-lg-4">';
				echo '<h1>'.$item->getName().'</h1>';
				echo '<p>'.$item->getDescript().'</p>';
				echo '<p><a class="btn btn-primary" href="'.basename($_SERVER['PHP_SELF']).'?product='.$item->getName().'">More Info >></a></p>';
				echo '<hr></div>';
			}
			echo '</div>';
			echo '</div>';
		}
	}

?>
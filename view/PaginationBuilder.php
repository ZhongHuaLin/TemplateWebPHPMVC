<?php

	include_once('Builder.php');
	include_once('LinkGenerator.php');

	class PaginationBuilder implements Builder{
		private $ipp;
		private $numOfPage;
		private $pageNum;
		private $search;
		
		function __construct($ipp, $pageNum, $numOfPage, $search){
			$this->ipp = $ipp;
			$this->pageNum = $pageNum;
			$this->numOfPage = $numOfPage;
			$this->search = $search;
		}
		
		public function draw(){
			echo '<div class="container">';
			echo '<div class="row">';
			echo '<ul class="pagination mypagination">';
			if($this->pageNum != 1) {
				$link = LinkGenerator::create(array('ipp'=>$this->ipp,'pageNum'=>$this->pageNum-1, 'search'=>$this->search));
				echo '<li><a href="'.basename($_SERVER['PHP_SELF']).$link.'">&laquo;</a></li>';
			}
			for($i=1;$i<=$this->numOfPage;$i++){
				echo '<li';
				if($i == $this->pageNum) echo ' class="active"';
				$link = LinkGenerator::create(array('ipp'=>$this->ipp,'pageNum'=>$i, 'search'=>$this->search));
				echo '><a href="'.basename($_SERVER['PHP_SELF']).$link.'">'.$i.'</a></li>';
			}
			if($this->pageNum != $this->numOfPage){
				$link = LinkGenerator::create(array('ipp'=>$this->ipp,'pageNum'=>$this->pageNum+1, 'search'=>$this->search));
				echo '<li><a href="'.basename($_SERVER['PHP_SELF']).$link.'">&raquo;</a></li>';
			}
			echo '</ul></div></div>';
		}
	}
?>
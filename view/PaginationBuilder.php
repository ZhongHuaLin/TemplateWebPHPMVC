<?php

	include_once('Builder.php');

	class PaginationBuilder implements Builder{
		private $ipp;
		private $numOfPage;
		private $pageNum;
		
		function __construct($ipp, $pageNum, $numOfPage){
			$this->ipp = $ipp;
			$this->pageNum = $pageNum;
			$this->numOfPage = $numOfPage;
		}
		
		public function draw(){
			echo '<div class="container">';
			echo '<div class="row">';
			echo '<ul class="pagination mypagination">';
			if($this->pageNum != 1) echo '<li><a href="'.basename($_SERVER['PHP_SELF']).'?ipp='.$this->ipp.'&pageNum='.($this->pageNum-1).'">&laquo;</a></li>';
			for($i=1;$i<=$this->numOfPage;$i++){
				echo '<li';
				if($i == $this->pageNum) echo ' class="active"';
				echo '><a href="'.basename($_SERVER['PHP_SELF']).'?ipp='.$this->ipp.'&pageNum='.$i.'">'.$i.'</a></li>';
			}
			if($this->pageNum != $this->numOfPage) echo '<li><a href="'.basename($_SERVER['PHP_SELF']).'?ipp='.$this->ipp.'&pageNum='.($this->pageNum+1).'">&raquo;</a></li>';
			echo '</ul></div></div>';
		}
	}
?>
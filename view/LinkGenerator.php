<?php

	class LinkGenerator{
		public static function create( $arguments){
			$link = '';
			$counter = 0;
			foreach($arguments as $key => $value){
				if($value == '' or $value == null) continue;
				if($counter) {
					$link .= '&';
				}else $link .= '?';
				$link .= $key.'='.$value;
				$counter++;
			}
			return $link;
		}
	}

?>
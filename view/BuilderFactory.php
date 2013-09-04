<?php
	include_once('PaginationBuilder.php');
	include_once('ProductListBuilder.php');
	
	class BuilderFactory
	{
		public static function create($type, $arguments)
		{
			switch($type)
			{
				case 'pagination':
					return new PaginationBuilder($arguments['ipp'],$arguments['pageNum'],$arguments['numOfPage']);
					break;
				case 'productlist':
					return new ProductListBuilder($arguments['plist'],$arguments['vertical']);
					break;
				default:
					break;
			}
		}
	}
?>
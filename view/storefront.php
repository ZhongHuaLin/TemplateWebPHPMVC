<!DOCTYPE html>
<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta charset="utf-8">
		<meta content="" name="description">
		<meta content="" name="author">
		<title>Template</title>
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link rel="stylesheet" href="css/jumbotron.css">
	</head>
	<body>

		<div class="navbar navbar-inverse navbar-fixed-top">
			<div class="container">
				<div class="navbar-header">
					<a href="#" class="navbar-brand">template site</a>
					<button class="navbar-toggle" data-toggle="collapse" data-target=".navHeaderCollapse">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
				</div>
				<div class="collapse navbar-collapse navHeaderCollapse">
					<ul class="nav navbar-nav navbar-right">
						<li><a href="index.php">Home</a></li>
						<li><a href="#">Products</a></li>
						<li><a href="About.php">About</a></li>
						<li><a href="Contact.php">Contact Us</a></li>
						<li>
							<form class="navbar-form mycontainer-nav" action="Search.php" method="get" role="search">
								  <div class="form-group">
										<input type="text" name="search" class="form-control" placeholder="Search">
								  </div>
								  <button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-search"></span></button>
							</form>
						</li>					
					</ul>
				</div>
			</div>
		</div>

		<div class="jumbotron">
			<div class="container">
				<h1>Anything in here is GOOD</h1>
				<p>this is just and example to show how to work with this kind of stype</p>
				<p><a class="btn btn-lg btn-primary" href="#">test button</a></p>
			</div>
		</div>
		
		<?php
		if($from == 'home'){
			echo '<div class="container">';
			echo '<div class="row" >';
			foreach($products as $product){
				echo '<div class="col-lg-4">';
				echo '<h1>'.$product->getName().'</h1>';
				echo '<p>'.$product->getDescript().'</p>';
				echo '<p><a class="btn btn-primary" href="'.basename($_SERVER['PHP_SELF']).'?product='.$product->getName().'">More Info >></a></p>';
				echo '<hr></div>';
			}
			echo '</div>';
			echo '</div>';
		}
		if($numPage > 1){
			include_once('Pagination.php');
			$pagin = new Pagination($this->ipp, $this->pageNum, $numPage);
			$pagin->draw();
		}
		?>

		<div class="navbar navbar-default navbar-fixed-bottom Mynavbar">
			<div class="container">
				<p class="navbar-text Mynavbar-text">anything can put in here</p>
			</div>
		</div>

		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/DynNavBar.js"></script>
	</body>
</html>
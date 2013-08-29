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
						<li class="active"><a href="#">Home</a></li>
						<li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">TestDropdown<b class="caret"></b></a>
							<ul class="dropdown-menu">
								<?php
									
									foreach($types as $type){
										echo '<li><a href="index.php?type='.$type->getName().'">'.$type->getName().'</a></li>';
									}
								
								?>
							</ul>
						</li>
						<li><a href="#">About</a></li>
						<li><a href="#">Contact Us</a></li>
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
		<div class="container">
			<div class="row" >
				<?php
					
					foreach($products as $product){
						echo '<div class="col-lg-4">';
						echo '<h1>'.$product->getName().'</h1>';
						echo '<p>'.$product->getDescript().'</p>';
						echo '<p><a class="btn btn-primary" href="index.php?product='.$product->getName().'">More Info >></a></p>';
						echo '<hr></div>';
					}
				
				?>
			</div>
		</div>

		<div class="navbar navbar-default navbar-fixed-bottom Mynavbar">
			<div class="container">
				<p class="navbar-text Mynavbar-text">anything can put in here</p>
			</div>
		</div>

		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
	</body>
</html>
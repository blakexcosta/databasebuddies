<?php 
 	$page = "BeerBuddies | " . $page_title;
?>
<!DOCTYPE html>
	<html>
		<head>
			<meta charset="UTF-8">
			<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  			<meta name="viewport" content="width=device-width,initial-scale=1">
  			<title><?php echo $page;?></title>
  			<link rel="stylesheet" href="style.css" type="text/css">
  		</head>
  		<body>
  			<div id="nav-bar">
  				<form id="search-beers" class="inline-menu">
  					<input type="text" name="beer-search" placeholder="Search Beers">
  					<input type="submit" value="Search">
  				</form>
  				<a href="#" id="adv-search" class="inline-menu">Advanced Search</a>

  				<ul id="nav-menu" class="inline-menu">
  					<li class="nav-item"><a href="index.php">Home</a></li>
  					<li class="nav-item"><a href="beermap.php">Beer Map</a></li>
  					<?php if(!empty($_SESSION['bb_loggedin']) && exists($_SESSION['bb_loggedin'])) { ?>
  					<li class="nav-item"><a href="settings.php">Settings</a></li>
  					<li class="nav-item"><a href="#" id="logout">Log out</a></li>
  					<?php } else { ?>
  					<li class="nav-item"><a href="signup.php">Sign Up</a></li>
  					<li class="nav-item"><a href="login.php">Log In</a></li>
  					<?php } ?>
  				</ul>
  			</div>
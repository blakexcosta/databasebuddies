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
  				<form id="search-beers" class="inline-menu" action="" method="post">
  					<input type="text" name="beer-search" placeholder="Search Beers">
  					<input type="submit" value="Search">
  				</form>
				<?php
					//checking that the variable beer-search is set
					if (isset($_POST['beer-search'])){
						$term = $_POST['beer-search'];
						//ain't broke, don't fix it, redundant but needed
						if (!empty($term)) {
							//echo out what searching for
							echo "searching for: '" . $term . "'";
							
							//establishing a connection to the database 
							$conn = pg_connect("host=127.0.0.1 port=5432 dbname=beerbuddies_db user=postgres password=student");
							if(!$conn) {
									echo "error occured\n";
									exit;		
							}
							//getting results from the query
							$result = pg_query($conn, "select \"INTBEERID\", \"VCHBEERNAME\" from beerbuddies_db.BeerName where \"VCHBEERNAME\" like '%".$term."%';");
							if (!$result){
								echo "An error occured retrieving results bro\n";
								exit;	
							}
							//printing out all the beers found.
							echo "<br />\n";
							while ($row = pg_fetch_row($result)){
								echo "Result: ".$row[1];
								echo "<br />\n";
							}
						}
					}
				?>
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

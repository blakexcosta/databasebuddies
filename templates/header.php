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

  			<link rel="stylesheet" href="https://js.arcgis.com/4.9/esri/css/main.css">
			<script src="https://js.arcgis.com/4.9/"></script>
			<script src="map/map.js"></script>
  		</head>
  		<body>
  			<div id="nav-bar">
  				<ul id="nav-menu" class="inline-menu">
  					<li class="nav-item"><a href="index.php">Home</a></li>
  					<li class="nav-item"><a href="AllBeer.php">All Beers</a></li>
  					<li class="nav-item"><a href="map/beermap.html">Beer Map</a></li>
  					<?php if(!empty($_SESSION['bb_loggedin']) && exists($_SESSION['bb_loggedin'])) { ?>
  					<li class="nav-item"><a href="settings.php">Settings</a></li>
  					<li class="nav-item"><a href="#" id="logout">Log out</a></li>
  					<?php } else { ?>
                    <li class="nav-item"><a href='Add_Beer.php'>Add Beer</a></li>
  					<li class="nav-item"><a href="signup.php">Sign Up</a></li>
  					<li class="nav-item"><a href="login.php">Log In</a></li>
  					<?php } ?>
  				</ul>

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
							$result = pg_query($conn, "select Beer.\"INTBEERID\" as BeerID,
                (select BeerName.\"VCHBEERNAME\" from beerbuddies_db.BeerName where Beer.\"INTBEERID\" = BeerName.\"INTBEERID\") as BeerName,
                (select Category.\"VCHCATEGORY\" from beerbuddies_db.Category where Beer.\"INTCATEGORYID\" = Category.\"INTCATEGORYID\") as categoryName,
                (select Style.\"VCHSTYLE\" from beerbuddies_db.Style where Beer.\"INTSTYLEID\" = Style.\"INTSTYLEID\") as styleName,
                (select Brewer.\"VCHBREWER\" from beerbuddies_db.Brewer where Beer.\"INTBREWERID\" = Brewer.\"INTBREWERID\") as brewerName,
                Beer.\"VCHADDRESS\" as address, Beer.\"VCHCITY\" as city, Beer.\"VCHSTATE\" as state, Beer.\"VCHCOUNTRY\" as country,
                Beer.\"VCHDESCRIPTION\" as description, Beer.\"VCHWEBSITE\" as website, Beer.\"INTINTERNATIONALBITTERNESSUT\" as intBitternessUt,
                Beer.\"INTSTANDARDREFMETH\" as standRefMeth, Beer.\"INTUNVPRODCODE\" as uniProdCode, Beer.\"DATELASTUPDATED\" as lastUpdate,
                Beer.\"VCHCOORDINATES\" as coords, Beer.\"DATEADDED\" as dateAdded
                from beerbuddies_db.Beer JOIN beerbuddies_db.BeerName USING(\"INTBEERID\")
                where BeerName.\"VCHBEERNAME\" LIKE '%".$term."%';");
							if (!$result){
								echo "An error occured retrieving results bro\n";
								exit;
							}
							//printing out all the beers found.
							echo "<br />\n";
							while ($row = pg_fetch_row($result)){
								echo "<p><b>Name:</b> ".$row[1]." <br/> <b>Style:</b> ".$row[3]."<br/> <b>Brewer:</b> ".$row[4]."<br/> <b>City:</b> ".$row[7]." <b>Country:</b> ".$row[8]."<br/><b>Description:</b> ".$row[9]."</br> <b>Website:</b> <a href='".$row[10]."'>".$row[1]." Website</a> </p>";
								echo "<br />\n";
							}
						}
					}
				?>
  				<!--<a href="#" id="adv-search" class="inline-menu">Advanced Search</a>-->
  			</div>
  			<h1 id="proj-title">Beer Buddies &trade;</h1>

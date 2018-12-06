<!DOCTYPE html>
<html>

   <head>
      <title>BeerBuddies</title>
   </head>

   <body>
	
	<!--Searching for information-->
	<form action="" method="post">
	Search: <input type="text" name="term" /><br/>
	<input type="submit" value="Submit"/>
	</form>

	<?php
	//$library = new BeerBuddies_Library();
	
	$term = $_POST['term'];	
	
	if (!empty($term)) {
		//$this->dbh = new PDO('pgsql:host=127.0.0.1;port=5432;dbname=beerbuddies_db', 'postgres', 'student');
		echo "searching for: '" . $term . "'";
		//echo $library->listBeersViaName();
		//$someval = $library->listBeersViaName();
		//echo $someval;
		//$conn = pg_connect('pgsql:host=127.0.0.1;port=5432;dbname=beerbuddies_db', 'postgres', 'student');
		
		
		$conn = pg_connect("host=127.0.0.1 port=5432 dbname=beerbuddies_db user=postgres password=student");
		if(!$conn) {
				echo "error occured\n";
				exit;		
		}
	
		//select "INTBEERID", "VCHBEERNAME" from beerbuddies_db.beername WHERE "VCHBEERNAME" like '%Pocus%';
		$result = pg_query($conn, "select \"INTBEERID\", \"VCHBEERNAME\" from beerbuddies_db.BeerName where \"VCHBEERNAME\" like '%".$term."%';");
		//$result = pg_query($conn, "select * from beerbuddies_db.beername;");		
		if (!$result){
			echo "An error occured retrieving results bro\n";
			exit;	
		}
		
		echo "<br />\n";
		while ($row = pg_fetch_row($result)){
			echo "Result: ".$row[1];
			echo "<br />\n";

		}
		

		//Ambr, Abhi Beer, Full Boar, The Public, S.O.S
/*		
		$sql = "select * from beerbuddies_db.BeerName where BeerName like '%".$term."%'";
		$r_query = ($sql);
		while ($row = mysql_fetch_array($r_query)){
			echo 'PK: ' .$row['INTBEERID'];
			echo '<br /> VCHBEERNAME: ' .$row['VCHBEERNAME'];
		} 
*/
	}
	
	//$term = mysql_real_escape_string($_REQUEST['term']);
	//$term = $_POST['term'];
	//echo $term;
	
	?>
	<ul>
		<li><a href="index.php">Home</a></li>
		<li><a href="AdvancedSearch.php">Advanced Search</a></li>
		<li><a href="SimilarBeers.php">Similar Beers</a></li>
		<li><a href="GetSome.php">Where To Get Some</a></li>
		<li><a href="PlacesNear.php">Places Near Me</a></li>
		<li><a href="Settings.php">Settings</a></li>
	</ul>
</body>
</html>

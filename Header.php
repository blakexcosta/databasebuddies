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
	/*if (!empty($_REQUEST['term'])) {
		$term = mysql_real_escape_string($_REQUEST['term']);
		
		echo $term;
		//$sql = "SELECT * FROM 
	}*/
	//$term = mysql_real_escape_string($_REQUEST['term']);
	$term = $_POST['term'];
	echo $term;
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

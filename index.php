<?php
	require_once("BeerBuddies_Library.php");		
	    
	require_once("BeerBuddies_Library.php");
 	
	require("Homepage.php");   
    $library = new BeerBuddies_Library();

    echo $library->headerConfig();
    echo $library->navigationConfig();
    //echo $library->listSomeBeerInfo();
    echo $library->listBeersViaName();
    echo $library->footerConfig();

?>

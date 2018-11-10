<?php

	require("Layout.html");

    require_once("BeerBuddies_Library.php");
    
    $library = new BeerBuddies_Library();

    echo $library->headerConfig();
    echo $library->navigationConfig();
    echo $library->listSomeBeerInfo();
    echo $library->footerConfig();

?>

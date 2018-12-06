<?php
	 //require_once("BeerBuddies_Library.php");

	// require_once("BeerBuddies_Library.php");

	// require("Homepage.php");
 //    $library = new BeerBuddies_Library();

 //    echo $library->headerConfig();
 //    echo $library->navigationConfig();
 //    //echo $library->listSomeBeerInfo();
 //    echo $library->listBeersViaName();
 //    echo $library->footerConfig();
    require_once('DB.class.php');
    $dbh = new PDO_DB();

    $page_title = "All Beers";

    $featuredBeers = $dbh->retrieveAllBeers();

    $page_content=
        '<table>'.
            '<tr>'.
                '<th>Beer Name</th>'.
                '<th>Category</th>'.
                '<th>Style</th>'.
                '<th>Brewer</th>'.
                '<th>Street Address</th>'.
                '<th>City</th>'.
                '<th>State</th>'.
                '<th>Country</th>'.
                '<th>Description</th>'.
                '<th>Website</th>'.
                '<th>Alcohol by Volume</th>'.
                "<th>International Bitterness Units</th>".
                "<th>Standard Reference Method</th>".
                '<th>Universal Product Code</th>'.
            '</tr>';
            foreach($featuredBeers as $beer) {
                $page_content.= "<tr>" .
                    "<td>". $beer->getBeerName() . "</td>" .
                    "<td>". $beer->getCategoryName() . "</td>" .
                    "<td>". $beer->getStyleName() . "</td>" .
                    "<td>". $beer->getBrewerName() . "</td>" .
                    "<td>". $beer->getAddress() . "</td>" .
                    "<td>". $beer->getCity() . "</td>".
                    "<td>". $beer->getState() . "</td>".
                    "<td>". $beer->getCountry() . "</td>".
                    "<td>". $beer->getDescription() . "</td>".
                    "<td><a href='" . $beer->getWebsite()."'>". $beer->getWebsite() . "</a></td>".
                    "<td>". $beer->getAlcVol() . "</td>".
                    "<td>". $beer->getIntBitternessUt() . "</td>".
                    "<td>". $beer->getStandRefMeth() . "</td>".
                    "<td>". $beer->getUniProdCode() . "</td>".
                "</tr>";
            }
?>
<?php include 'templates/main_template.php'; ?>

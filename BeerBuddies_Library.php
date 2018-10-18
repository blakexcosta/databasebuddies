<?php

require_once("DB.class.php");

class BeerBuddies_Library
{
    //Attributes
    private $db;
    
    function __construct()
    {
        $this->db = new PDO_DB();
    }
    
    //----------------------------------------------------------------------------------------------------------------------------
    //-------------------------------------------------------GENERAL PAGE FUNCTIONS-----------------------------------------------
    //----------------------------------------------------------------------------------------------------------------------------
    //The site's header structure
    public function headerConfig()
    {
        $headerString = "<!DOCTYPE html>
                <html lang='en'>
                <head>
                    <meta charset='utf-8'/>
                    <title>BeerBuddies</title>

                </head>
                <body>";

        //Send the HTML Structure
        return $headerString;
    }
    
    //The site's navigation bar structure
    public function navigationConfig()
    {	
        $navigationString = "<nav id='siteNavigation'><p><a href='index.php'>Home</a></p></nav>";

        //Send the HTML Structure
        return $navigationString;
    }	
    
    //The site's footer structure
    public function footerConfig()
    {
        $footerString = "<footer><p>&copy; 2018 DatabaseBuddies - Quinn Bissen, Blake Costa, Isabella Sturm, Matthew Turczmanovicz</p>
        <p>All Rights Reserved</p>
        </footer>
        </body>
        </html>";

        //Send the HTML Structure
        return $footerString;
    }
    
    //----------------------------------------------------------------------------------------------------------------------------
    //-------------------------------------------------------GENERAL PAGE FUNCTIONS-----------------------------------------------
    //----------------------------------------------------------------------------------------------------------------------------
    public function listSomeBeerInfo()
    {
        $beerListString;
        $beerData = $this->db->retrieveSomeBeers();
        
        if (count($beerData) <= 0)
        {
            $beerListString = "<h2>No beers could be found.</h2>";
        }
        else
        {
            var_dump($beerData);
        }
    }
}

?>
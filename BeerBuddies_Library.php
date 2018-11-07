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
        // if no user is logged in
        $navigationString = "<div id='user-nav'><a href='login.php'>Log In</a><a href='signup.php'>Sign Up</a></div>";
        // if user is logged in, display different nav
        //$navigationString = "<div id='user-nav'><a href=#>Sign out</a></div>";
        $navigationString .= "<nav id='siteNavigation'><p><a href='index.php'>Home</a></p></nav>";

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
    //------------------------------------------------------BEER RETRIEVAL FUNCTIONS----------------------------------------------
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
            $beerListString = "<h1>Example Beer:</h1>";
            
            foreach ($beerData as $beer)
            {
                $beerListString .= "<div class='beerItem'>";
                //var_dump($beer);
                $beerListString .= "<h3>Beer: ".$beer->getBeerName()."</h3>";
                $beerListString .= "<p>Style: ".$beer->getStyleName()."</p>";
                $beerListString .= "<p>Category: ".$beer->getCategoryName()."</p>";
                $beerListString .= "<p>Brewer: ".$beer->getBrewerName()."</p>";
                $beerListString .= "<p>Address: ".$beer->getAddress()."</p>";
                $beerListString .= "<p>City: ".$beer->getCity()."</p>";
                $beerListString .= "<p>State: ".$beer->getState()."</p>";
                $beerListString .= "<p>Country: ".$beer->getCountry()."</p>";
                $beerListString .= "<p>Coordinates: ".$beer->getCoords()."</p>";
                $beerListString .= "<p>Description: ".$beer->getDescription()."</p>";
                $beerListString .= "<p>Website: <a href='".$beer->getWebsite()."'>Site Link</a>";
                $beerListString .= "<p>Alcohol Volume: ".$beer->getAlcVol()."</p>";
                $beerListString .= "<p>International Bitterness Unit: ".$beer->getIntBitternessUt()."</p>";
                $beerListString .= "<p>Standard Reference Method: ".$beer->getStandRefMeth()."</p>";
                $beerListString .= "<p>Universal Product Code: ".$beer->getUniProdCode()."</p>";
                $beerListString .= "<p>Last Updated: ".$beer->getLastUpdated()."</p>";
                $beerListString .= "<p>Date Added: ".$beer->getDateAdded()."</p>";
                
            }
            
            echo $beerListString;
            //var_dump($beerData);
        }
    }
    
    public function listBeersViaName()
    {
        $beerListString;
        $beerData = $this->db->retrieveBeersViaName('Bud');
        
        if (count($beerData) <= 0)
        {
            $beerListString = "<h2>No beers could be found.</h2>";
        }
        else
        {
            $beerListString = "<h1>Example Beer:</h1>";
            
            foreach ($beerData as $beer)
            {
                $beerListString .= "<div class='beerItem'>";
                //var_dump($beer);
                $beerListString .= "<h3>Beer: ".$beer->getBeerName()."</h3>";
                $beerListString .= "<p>Style: ".$beer->getStyleName()."</p>";
                $beerListString .= "<p>Category: ".$beer->getCategoryName()."</p>";
                $beerListString .= "<p>Brewer: ".$beer->getBrewerName()."</p>";
                $beerListString .= "<p>Address: ".$beer->getAddress()."</p>";
                $beerListString .= "<p>City: ".$beer->getCity()."</p>";
                $beerListString .= "<p>State: ".$beer->getState()."</p>";
                $beerListString .= "<p>Country: ".$beer->getCountry()."</p>";
                $beerListString .= "<p>Coordinates: ".$beer->getCoords()."</p>";
                $beerListString .= "<p>Description: ".$beer->getDescription()."</p>";
                $beerListString .= "<p>Website: <a href='".$beer->getWebsite()."'>Site Link</a>";
                $beerListString .= "<p>Alcohol Volume: ".$beer->getAlcVol()."</p>";
                $beerListString .= "<p>International Bitterness Unit: ".$beer->getIntBitternessUt()."</p>";
                $beerListString .= "<p>Standard Reference Method: ".$beer->getStandRefMeth()."</p>";
                $beerListString .= "<p>Universal Product Code: ".$beer->getUniProdCode()."</p>";
                $beerListString .= "<p>Last Updated: ".$beer->getLastUpdated()."</p>";
                $beerListString .= "<p>Date Added: ".$beer->getDateAdded()."</p>";
                
            }
            
            echo $beerListString;
            //var_dump($beerData);
        }
    }
    
    public function listBeersViaStyle()
    {
        $beerListString;
        $beerData = $this->db->retrieveBeersViaStyle('American');
        
        if (count($beerData) <= 0)
        {
            $beerListString = "<h2>No beers could be found.</h2>";
        }
        else
        {
            $beerListString = "<h1>Example Beer:</h1>";
            
            foreach ($beerData as $beer)
            {
                $beerListString .= "<div class='beerItem'>";
                //var_dump($beer);
                $beerListString .= "<h3>Beer: ".$beer->getBeerName()."</h3>";
                $beerListString .= "<p>Style: ".$beer->getStyleName()."</p>";
                $beerListString .= "<p>Category: ".$beer->getCategoryName()."</p>";
                $beerListString .= "<p>Brewer: ".$beer->getBrewerName()."</p>";
                $beerListString .= "<p>Address: ".$beer->getAddress()."</p>";
                $beerListString .= "<p>City: ".$beer->getCity()."</p>";
                $beerListString .= "<p>State: ".$beer->getState()."</p>";
                $beerListString .= "<p>Country: ".$beer->getCountry()."</p>";
                $beerListString .= "<p>Coordinates: ".$beer->getCoords()."</p>";
                $beerListString .= "<p>Description: ".$beer->getDescription()."</p>";
                $beerListString .= "<p>Website: <a href='".$beer->getWebsite()."'>Site Link</a>";
                $beerListString .= "<p>Alcohol Volume: ".$beer->getAlcVol()."</p>";
                $beerListString .= "<p>International Bitterness Unit: ".$beer->getIntBitternessUt()."</p>";
                $beerListString .= "<p>Standard Reference Method: ".$beer->getStandRefMeth()."</p>";
                $beerListString .= "<p>Universal Product Code: ".$beer->getUniProdCode()."</p>";
                $beerListString .= "<p>Last Updated: ".$beer->getLastUpdated()."</p>";
                $beerListString .= "<p>Date Added: ".$beer->getDateAdded()."</p>";
                
            }
            
            echo $beerListString;
            //var_dump($beerData);
        }
    }
    
    public function listBeersViaCatagory()
    {
        $beerListString;
        $beerData = $this->db->retrieveBeersViaCategory('American');
        
        if (count($beerData) <= 0)
        {
            $beerListString = "<h2>No beers could be found.</h2>";
        }
        else
        {
            $beerListString = "<h1>Example Beer:</h1>";
            
            foreach ($beerData as $beer)
            {
                $beerListString .= "<div class='beerItem'>";
                //var_dump($beer);
                $beerListString .= "<h3>Beer: ".$beer->getBeerName()."</h3>";
                $beerListString .= "<p>Style: ".$beer->getStyleName()."</p>";
                $beerListString .= "<p>Category: ".$beer->getCategoryName()."</p>";
                $beerListString .= "<p>Brewer: ".$beer->getBrewerName()."</p>";
                $beerListString .= "<p>Address: ".$beer->getAddress()."</p>";
                $beerListString .= "<p>City: ".$beer->getCity()."</p>";
                $beerListString .= "<p>State: ".$beer->getState()."</p>";
                $beerListString .= "<p>Country: ".$beer->getCountry()."</p>";
                $beerListString .= "<p>Coordinates: ".$beer->getCoords()."</p>";
                $beerListString .= "<p>Description: ".$beer->getDescription()."</p>";
                $beerListString .= "<p>Website: <a href='".$beer->getWebsite()."'>Site Link</a>";
                $beerListString .= "<p>Alcohol Volume: ".$beer->getAlcVol()."</p>";
                $beerListString .= "<p>International Bitterness Unit: ".$beer->getIntBitternessUt()."</p>";
                $beerListString .= "<p>Standard Reference Method: ".$beer->getStandRefMeth()."</p>";
                $beerListString .= "<p>Universal Product Code: ".$beer->getUniProdCode()."</p>";
                $beerListString .= "<p>Last Updated: ".$beer->getLastUpdated()."</p>";
                $beerListString .= "<p>Date Added: ".$beer->getDateAdded()."</p>";
                
            }
            
            echo $beerListString;
            //var_dump($beerData);
        }
    }
    
    public function listBeersViaBrewer()
    {
        $beerListString;
        $beerData = $this->db->retrieveBeersViaBrewer('Busch');
        
        if (count($beerData) <= 0)
        {
            $beerListString = "<h2>No beers could be found.</h2>";
        }
        else
        {
            $beerListString = "<h1>Example Beer:</h1>";
            
            foreach ($beerData as $beer)
            {
                $beerListString .= "<div class='beerItem'>";
                //var_dump($beer);
                $beerListString .= "<h3>Beer: ".$beer->getBeerName()."</h3>";
                $beerListString .= "<p>Style: ".$beer->getStyleName()."</p>";
                $beerListString .= "<p>Category: ".$beer->getCategoryName()."</p>";
                $beerListString .= "<p>Brewer: ".$beer->getBrewerName()."</p>";
                $beerListString .= "<p>Address: ".$beer->getAddress()."</p>";
                $beerListString .= "<p>City: ".$beer->getCity()."</p>";
                $beerListString .= "<p>State: ".$beer->getState()."</p>";
                $beerListString .= "<p>Country: ".$beer->getCountry()."</p>";
                $beerListString .= "<p>Coordinates: ".$beer->getCoords()."</p>";
                $beerListString .= "<p>Description: ".$beer->getDescription()."</p>";
                $beerListString .= "<p>Website: <a href='".$beer->getWebsite()."'>Site Link</a>";
                $beerListString .= "<p>Alcohol Volume: ".$beer->getAlcVol()."</p>";
                $beerListString .= "<p>International Bitterness Unit: ".$beer->getIntBitternessUt()."</p>";
                $beerListString .= "<p>Standard Reference Method: ".$beer->getStandRefMeth()."</p>";
                $beerListString .= "<p>Universal Product Code: ".$beer->getUniProdCode()."</p>";
                $beerListString .= "<p>Last Updated: ".$beer->getLastUpdated()."</p>";
                $beerListString .= "<p>Date Added: ".$beer->getDateAdded()."</p>";
                
            }
            
            echo $beerListString;
            //var_dump($beerData);
        }
    }
    
    public function listBeersViaCountry()
    {
        $beerListString;
        $beerData = $this->db->retrieveBeersViaCountry('United States');
        
        if (count($beerData) <= 0)
        {
            $beerListString = "<h2>No beers could be found.</h2>";
        }
        else
        {
            $beerListString = "<h1>Example Beer:</h1>";
            
            foreach ($beerData as $beer)
            {
                $beerListString .= "<div class='beerItem'>";
                //var_dump($beer);
                $beerListString .= "<h3>Beer: ".$beer->getBeerName()."</h3>";
                $beerListString .= "<p>Style: ".$beer->getStyleName()."</p>";
                $beerListString .= "<p>Category: ".$beer->getCategoryName()."</p>";
                $beerListString .= "<p>Brewer: ".$beer->getBrewerName()."</p>";
                $beerListString .= "<p>Address: ".$beer->getAddress()."</p>";
                $beerListString .= "<p>City: ".$beer->getCity()."</p>";
                $beerListString .= "<p>State: ".$beer->getState()."</p>";
                $beerListString .= "<p>Country: ".$beer->getCountry()."</p>";
                $beerListString .= "<p>Coordinates: ".$beer->getCoords()."</p>";
                $beerListString .= "<p>Description: ".$beer->getDescription()."</p>";
                $beerListString .= "<p>Website: <a href='".$beer->getWebsite()."'>Site Link</a>";
                $beerListString .= "<p>Alcohol Volume: ".$beer->getAlcVol()."</p>";
                $beerListString .= "<p>International Bitterness Unit: ".$beer->getIntBitternessUt()."</p>";
                $beerListString .= "<p>Standard Reference Method: ".$beer->getStandRefMeth()."</p>";
                $beerListString .= "<p>Universal Product Code: ".$beer->getUniProdCode()."</p>";
                $beerListString .= "<p>Last Updated: ".$beer->getLastUpdated()."</p>";
                $beerListString .= "<p>Date Added: ".$beer->getDateAdded()."</p>";
                
            }
            
            echo $beerListString;
            //var_dump($beerData);
        }
    }
    
    public function listBeersViaState()
    {
        $beerListString;
        $beerData = $this->db->retrieveBeersViaState('New York');
        
        if (count($beerData) <= 0)
        {
            $beerListString = "<h2>No beers could be found.</h2>";
        }
        else
        {
            $beerListString = "<h1>Example Beer:</h1>";
            
            foreach ($beerData as $beer)
            {
                $beerListString .= "<div class='beerItem'>";
                //var_dump($beer);
                $beerListString .= "<h3>Beer: ".$beer->getBeerName()."</h3>";
                $beerListString .= "<p>Style: ".$beer->getStyleName()."</p>";
                $beerListString .= "<p>Category: ".$beer->getCategoryName()."</p>";
                $beerListString .= "<p>Brewer: ".$beer->getBrewerName()."</p>";
                $beerListString .= "<p>Address: ".$beer->getAddress()."</p>";
                $beerListString .= "<p>City: ".$beer->getCity()."</p>";
                $beerListString .= "<p>State: ".$beer->getState()."</p>";
                $beerListString .= "<p>Country: ".$beer->getCountry()."</p>";
                $beerListString .= "<p>Coordinates: ".$beer->getCoords()."</p>";
                $beerListString .= "<p>Description: ".$beer->getDescription()."</p>";
                $beerListString .= "<p>Website: <a href='".$beer->getWebsite()."'>Site Link</a>";
                $beerListString .= "<p>Alcohol Volume: ".$beer->getAlcVol()."</p>";
                $beerListString .= "<p>International Bitterness Unit: ".$beer->getIntBitternessUt()."</p>";
                $beerListString .= "<p>Standard Reference Method: ".$beer->getStandRefMeth()."</p>";
                $beerListString .= "<p>Universal Product Code: ".$beer->getUniProdCode()."</p>";
                $beerListString .= "<p>Last Updated: ".$beer->getLastUpdated()."</p>";
                $beerListString .= "<p>Date Added: ".$beer->getDateAdded()."</p>";
                
            }
            
            echo $beerListString;
            //var_dump($beerData);
        }
    }
    
    public function listBeersViaCity()
    {
        $beerListString;
        $beerData = $this->db->retrieveBeersViaCity('Rochester');
        
        if (count($beerData) <= 0)
        {
            $beerListString = "<h2>No beers could be found.</h2>";
        }
        else
        {
            $beerListString = "<h1>Example Beer:</h1>";
            
            foreach ($beerData as $beer)
            {
                $beerListString .= "<div class='beerItem'>";
                //var_dump($beer);
                $beerListString .= "<h3>Beer: ".$beer->getBeerName()."</h3>";
                $beerListString .= "<p>Style: ".$beer->getStyleName()."</p>";
                $beerListString .= "<p>Category: ".$beer->getCategoryName()."</p>";
                $beerListString .= "<p>Brewer: ".$beer->getBrewerName()."</p>";
                $beerListString .= "<p>Address: ".$beer->getAddress()."</p>";
                $beerListString .= "<p>City: ".$beer->getCity()."</p>";
                $beerListString .= "<p>State: ".$beer->getState()."</p>";
                $beerListString .= "<p>Country: ".$beer->getCountry()."</p>";
                $beerListString .= "<p>Coordinates: ".$beer->getCoords()."</p>";
                $beerListString .= "<p>Description: ".$beer->getDescription()."</p>";
                $beerListString .= "<p>Website: <a href='".$beer->getWebsite()."'>Site Link</a>";
                $beerListString .= "<p>Alcohol Volume: ".$beer->getAlcVol()."</p>";
                $beerListString .= "<p>International Bitterness Unit: ".$beer->getIntBitternessUt()."</p>";
                $beerListString .= "<p>Standard Reference Method: ".$beer->getStandRefMeth()."</p>";
                $beerListString .= "<p>Universal Product Code: ".$beer->getUniProdCode()."</p>";
                $beerListString .= "<p>Last Updated: ".$beer->getLastUpdated()."</p>";
                $beerListString .= "<p>Date Added: ".$beer->getDateAdded()."</p>";
                
            }
            
            echo $beerListString;
            //var_dump($beerData);
        }
    }
}

?>
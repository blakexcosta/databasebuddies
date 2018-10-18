<?php

    class PDO_DB
    {
        //Attribute
        private $dbh;

        //Default Constructor
        function __construct()
        {
            try
            {
                //May have to change this line to connect to your MySQL
                $this->dbh = new PDO('mysql:host=127.0.0.1;dbname=BeerBuddies_DB', 'root', 'student');
                $this->dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$this->dbh->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
            }
            catch (PDOException $pdoex)
            {
                echo "<h2>Unable to connect to the Beer Buddies Database.</h2>";
				echo $pdoex;
            }
        }
        
        public function retrieveSomeBeers()
        {
            try
            {
                $someBeers = array();
                $stmt = $this->dbh->prepare("select beer.INTBEERID as beerID,
                (select beername.VCHBEERNAME from beername where beer.INTBEERID = beername.INTBEERID) as beerName,
                (select category.VCHCATEGORY from category where beer.INTCATEGORYID = category.INTCATEGORYID) as categoryName,
                (select style.VCHSTYLE from style where beer.INTSTYLEID = style.INTSTYLEID) as styleName,
                (select brewer.VCHBREWER from brewer where beer.INTBREWERID = brewer.INTBREWERID) as brewerName,
                beer.VCHADDRESS as address, beer.VCHCITY as city, beer.VCHSTATE as state, beer.VCHCOUNTRY as country,
                beer.VCHDESCRIPTION as description, beer.VCHWEBSITE as website, beer.INTINTERNATIONALBITTERNESSUT as intBitternessUt,
                beer.INTSTANDARDREFMETH as standRefMeth, beer.INTUNVPRODCODE as uniProdCode, beer.DATELASTUPDATED as lastUpdate,
                beer.VCHCOORDINATES as coords, beer.DATEADDED as dateAdded
                from beer limit 10;");
                
                $stmt->setFetchMode(PDO::FETCH_CLASS, "Beer");
                $stmt->execute();
                $someBeers = $stmt->fetchAll();
                
                return $someBeers;
            }
            catch (PDOException $pdoex)
            {
                echo "<h2>Unable to create your account.</h2>";
            }
        }
	}
?>
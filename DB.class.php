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
                $this->dbh = new PDO('pgsql:host=127.0.0.1;port=5432;dbname=beerbuddies_db', 'postgres', 'student');
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
                $stmt = $this->dbh->prepare('select Beer."INTBEERID" as BeerID,
                (select BeerName."VCHBEERNAME" from beerbuddies_db.BeerName where Beer."INTBEERID" = BeerName."INTBEERID") as BeerName,
                (select Category."VCHCATEGORY" from beerbuddies_db.Category where Beer."INTCATEGORYID" = Category."INTCATEGORYID") as categoryName,
                (select Style."VCHSTYLE" from beerbuddies_db.Style where Beer."INTSTYLEID" = Style."INTSTYLEID") as styleName,
                (select Brewer."VCHBREWER" from beerbuddies_db.Brewer where Beer."INTBREWERID" = Brewer."INTBREWERID") as brewerName,
                Beer."VCHADDRESS" as address, Beer."VCHCITY" as city, Beer."VCHSTATE" as state, Beer."VCHCOUNTRY" as country,
                Beer."VCHDESCRIPTION" as description, Beer."VCHWEBSITE" as website, Beer."INTINTERNATIONALBITTERNESSUT" as intBitternessUt,
                Beer."INTSTANDARDREFMETH" as standRefMeth, Beer."INTUNVPRODCODE" as uniProdCode, Beer."DATELASTUPDATED" as lastUpdate,
                Beer."VCHCOORDINATES" as coords, Beer."DATEADDED" as dateAdded
                from beerbuddies_db.Beer limit 10;');
                
                $stmt->setFetchMode(PDO::FETCH_CLASS, "Beer");
                $stmt->execute();
                $someBeers = $stmt->fetchAll();
                
                return $someBeers;
            }
            catch (PDOException $pdoex)
            {
                echo "<h2>Unable to retrieve the beers!</h2>";
								echo $pdoex;
            }
        }
	}
?>

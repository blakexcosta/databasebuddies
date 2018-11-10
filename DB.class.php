<?php
    //Require the classes
    require_once("Beer.class.php");
    require_once("Brewer.class.php");
    require_once("Style.class.php");
    require_once("Category.class.php");
    require_once("BeerRequest.class.php");
    require_once("Review.class.php");
    require_once("User.class.php");


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
        
        public function retrieveBeersViaName($name)
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
                from beerbuddies_db.Beer JOIN beerbuddies_db.BeerName USING("INTBEERID")
                where BeerName."VCHBEERNAME" LIKE :nm
                limit 30');
                
                $name = "%".$name."%";
                $stmt->setFetchMode(PDO::FETCH_CLASS, "Beer");
                $stmt->execute(array("nm"=>$name));
                $someBeers = $stmt->fetchAll();
                
                return $someBeers;
            }
            catch (PDOException $pdoex)
            {
                echo "<h2>Unable to retrieve the beers!</h2>";
                echo $pdoex;
            } 
        }
        
        public function retrieveBeersViaStyle($style)
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
                from beerbuddies_db.Beer JOIN beerbuddies_db.Style USING("INTSTYLEID")
                where Style."VCHSTYLE" LIKE :sty');
                
                $name = "%".$style."%";
                $stmt->setFetchMode(PDO::FETCH_CLASS, "Beer");
                $stmt->execute(array("sty"=>$style));
                $someBeers = $stmt->fetchAll();
                
                return $someBeers;
            }
            catch (PDOException $pdoex)
            {
                echo "<h2>Unable to retrieve the beers!</h2>";
                echo $pdoex;
            }
        }
        
        public function retrieveBeersViaCategory($category)
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
                from beerbuddies_db.Beer JOIN beerbuddies_db.Category USING("INTCATEGORYID")
                where Category."VCHCATEGORY" LIKE :cat');
                
                $name = "%".$category."%";
                $stmt->setFetchMode(PDO::FETCH_CLASS, "Beer");
                $stmt->execute(array("cat"=>$category));
                $someBeers = $stmt->fetchAll();
                
                return $someBeers;
            }
            catch (PDOException $pdoex)
            {
                echo "<h2>Unable to retrieve the beers!</h2>";
                echo $pdoex;
            }
        }
        
        public function retrieveBeersViaBrewer($brewer)
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
                from beerbuddies_db.Beer JOIN beerbuddies_db.Brewer USING("INTBREWERID")
                where Brewer."VCHBREWER" LIKE :brw');
                
                $name = "%".$brewer."%";
                $stmt->setFetchMode(PDO::FETCH_CLASS, "Beer");
                $stmt->execute(array("brw"=>$brewer));
                $someBeers = $stmt->fetchAll();
                
                return $someBeers;
            }
            catch (PDOException $pdoex)
            {
                echo "<h2>Unable to retrieve the beers!</h2>";
                echo $pdoex;
            }
        }
        
        public function retrieveBeersViaCountry($country)
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
                from beerbuddies_db.Beer where Beer."VCHCOUNTRY" LIKE :cnt');
                
                $name = "%".$country."%";
                $stmt->setFetchMode(PDO::FETCH_CLASS, "Beer");
                $stmt->execute(array("cnt"=>$country));
                $someBeers = $stmt->fetchAll();
                
                return $someBeers;
            }
            catch (PDOException $pdoex)
            {
                echo "<h2>Unable to retrieve the beers!</h2>";
                echo $pdoex;
            }
        }
        
        public function retrieveBeersViaState($state)
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
                from beerbuddies_db.Beer where Beer."VCHSTATE" LIKE :stt');
                
                $name = "%".$state."%";
                $stmt->setFetchMode(PDO::FETCH_CLASS, "Beer");
                $stmt->execute(array("stt"=>$state));
                $someBeers = $stmt->fetchAll();
                
                return $someBeers;
            }
            catch (PDOException $pdoex)
            {
                echo "<h2>Unable to retrieve the beers!</h2>";
                echo $pdoex;
            }
        }
        
        public function retrieveBeersViaCity($city)
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
                from beerbuddies_db.Beer where Beer."VCHCITY" LIKE :cty');
                
                $name = "%".$city."%";
                $stmt->setFetchMode(PDO::FETCH_CLASS, "Beer");
                $stmt->execute(array("cty"=>$city));
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

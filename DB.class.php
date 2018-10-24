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
                $this->dbh = new PDO('mysql:host=127.0.0.1;dbname=BeerBuddies_DB', 'root', 'HerroBob!');
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
                $stmt = $this->dbh->prepare("select Beer.INTBEERID as BeerID,
                (select BeerName.VCHBEERNAME from BeerName where Beer.INTBEERID = BeerName.INTBEERID) as BeerName,
                (select Category.VCHCATEGORY from Category where Beer.INTCATEGORYID = Category.INTCATEGORYID) as categoryName,
                (select Style.VCHSTYLE from Style where Beer.INTSTYLEID = Style.INTSTYLEID) as styleName,
                (select Brewer.VCHBREWER from Brewer where Beer.INTBREWERID = Brewer.INTBREWERID) as brewerName,
                Beer.VCHADDRESS as address, Beer.VCHCITY as city, Beer.VCHSTATE as state, Beer.VCHCOUNTRY as country,
                Beer.VCHDESCRIPTION as description, Beer.VCHWEBSITE as website, Beer.INTINTERNATIONALBITTERNESSUT as intBitternessUt,
                Beer.INTSTANDARDREFMETH as standRefMeth, Beer.INTUNVPRODCODE as uniProdCode, Beer.DATELASTUPDATED as lastUpdate,
                Beer.VCHCOORDINATES as coords, Beer.DATEADDED as dateAdded
                from Beer limit 10;");
								
								//$stmt = $this->dbh->prepare("select * from Beer;");
                
                $stmt->setFetchMode(PDO::FETCH_CLASS, "Beer");
                $stmt->execute();
                $someBeers = $stmt->fetchAll();
                
                return $someBeers;
            }
            catch (PDOException $pdoex)
            {
                echo "<h2>Unable to create your account.</h2>";
								echo $pdoex;
            }
        }
	}
?>

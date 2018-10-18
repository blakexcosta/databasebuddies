<?php

//The class structure of a beer. Use PDO Fetch Class Mode to retrieve comics as class objects and the data as class attributes
class Beer
{
    //Beer attributes
    private $beerID, $beerName, $brewerName, $categoryName, $styleName, $address, $city, $state, $country, $description, $website, $alcVol, $intBitternessUt, $standRefMeth, $uniProdCode, $lastUpdated, $coords, $dateAdded;
    
	//Default constructor
    function __construct()
    {
    
    }
    
    //Accessors
    public function getBeerID()
    {
        return $this->beerID;
    }
    public function getBeerName()
    {
        return $this->beerName;
    }
    public function getBrewerName()
    {
        return $this->brewerName;
    }
    public function getCategoryName()
    {
        return $this->categoryName;
    }
    public function getStyleName()
    {
        return $this->styleName;
    }
    public function getAddress()
    {
        return $this->address();
    }
    public function getCity()
    {
        return $this->city;
    }
    public function getState()
    {
        return $this->state;
    }
    public function getCountry()
    {
        return $this->country;
    }
    public function getDescription()
    {
        return $this->description;
    }
    public function getWebsite()
    {
        return $this->website;
    }
    public function getAlcVol()
    {
        return $this->alcVol;
    }
    public function getIntBitternessUt()
    {
        return $this->intBitternessUt;
    }
    public function getStandRefMeth()
    {
        return $this->standRefMeth;
    }
    public function getUniProdCode()
    {
        return $this->uniProdCode;
    }
    public function getLastUpdated()
    {
        return $this->lastUpdated;
    }
    public function getCoords()
    {
        return $this->coords;
    }
    public function getDateAdded()
    {
        return $this->dateAdded;
    }

}

?>
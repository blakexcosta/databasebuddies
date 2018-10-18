<?php

class BeerRequest
{
	private $requestID, $beerName, $brewerName, $categoryName, $styleName, $address, $city, $state, $country, $description, $website, $alcVol, $intBitternessUt, $standRefMeth, $unvProdCode, $coords, $dateRequested;
    
	//Default constructor
    function __construct()
    {
    
    }
    
    //Accessors
    public function getRequestID()
    {
        return $this->requestID;
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
    public function getUnvProdCode()
    {
        return $this->unvProdCode;
    }
    public function getCoords()
    {
        return $this->coords;
    }
    public function getDateRequested()
    {
        return $this->dateRequested;
    }
}

?>
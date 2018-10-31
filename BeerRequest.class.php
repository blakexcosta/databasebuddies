<?php

class BeerRequest
{
	private $requestid, $beername, $brewername, $categoryname, $stylename, $address, $city, $state, $country, $description, $website, $alcvol, $intbitternessut, $standrefmeth, $unvprodcode, $coords, $daterequested;
    
	//Default constructor
    function __construct()
    {
    
    }
    
    //Accessors
    public function getRequestID()
    {
        return $this->requestid;
    }
    public function getBeerName()
    {
        return $this->beername;
    }
    public function getBrewerName()
    {
        return $this->brewername;
    }
    public function getCategoryName()
    {
        return $this->categoryname;
    }
    public function getStyleName()
    {
        return $this->stylename;
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
        return $this->alcvol;
    }
    public function getIntBitternessUt()
    {
        return $this->intbitternessut;
    }
    public function getStandRefMeth()
    {
        return $this->standrefmeth;
    }
    public function getUnvProdCode()
    {
        return $this->unvprodcode;
    }
    public function getCoords()
    {
        return $this->coords;
    }
    public function getDateRequested()
    {
        return $this->daterequested;
    }
}

?>
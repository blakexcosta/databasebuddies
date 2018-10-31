<?php

//The class structure of a beer. Use PDO Fetch Class Mode to retrieve comics as class objects and the data as class attributes
class Beer
{
    //Beer attributes
    public $beerid, $beername, $brewername, $categoryname, $stylename, $address, $city, $state, $country, $description, $website, $alcvol, $intitternessut, $standrefmeth, $uniprodcode, $lastupdated, $coords, $dateadded;
    
	//Default constructor
    function __construct()
    {
    
    }
    
    //Accessors
    public function getBeerID()
    {
        return $this->beerid;
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
        return $this->address;
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
    public function getUniProdCode()
    {
        return $this->uniprodcode;
    }
    public function getLastUpdated()
    {
        return $this->lastupdated;
    }
    public function getCoords()
    {
        return $this->coords;
    }
    public function getDateAdded()
    {
        return $this->dateadded;
    }

}

?>
<?php

class Brewer 
{
	//Attributes
	private $brewerID, $brewerName;
	
	//Default constructor
    function __construct()
    {
    
    }
	
	//Accessors
	public function getBrewerID()
	{
		return $this->brewerID;
	}
	public function getBrewerName()
	{
		return $this->brewerName;
	}
}

?>
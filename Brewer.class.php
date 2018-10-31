<?php

class Brewer 
{
	//Attributes
	private $brewerid, $brewername;
	
	//Default constructor
    function __construct()
    {
    
    }
	
	//Accessors
	public function getBrewerID()
	{
		return $this->brewerid;
	}
	public function getBrewerName()
	{
		return $this->brewername;
	}
}

?>
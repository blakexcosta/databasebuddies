<?php

class Style
{
	//Attributes
	private $styleid, $stylename;
	
	//Default constructor
    function __construct()
    {
    
    }
	
	//Accessors
	public function getStyleID()
	{
		return $this->styleid;
	}
	public function getStyleName()
	{
		return $this->stylename;
	}
}

?>
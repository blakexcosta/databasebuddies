<?php

class Style
{
	//Attributes
	private $styleID, $styleName;
	
	//Default constructor
    function __construct()
    {
    
    }
	
	//Accessors
	public function getStyleID()
	{
		return $this->styleID;
	}
	public function getStyleName()
	{
		return $this->styleName;
	}
}

?>
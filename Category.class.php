<?php

class Category
{
	//Attributes
	private $categoryid, $categoryname;
	
	//Default constructor
    function __construct()
    {
    
    }
	
	//Accessors
	public function getCategoryID()
	{
		return $this->categoryid;
	}
	public function getCategoryName()
	{
		return $this->categoryname;
	}
}

?>
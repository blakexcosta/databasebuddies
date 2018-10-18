<?php

class Category
{
	//Attributes
	private $categoryID, $categoryName;
	
	//Default constructor
    function __construct()
    {
    
    }
	
	//Accessors
	public function getCategoryID()
	{
		return $this->id;
	}
	public function getCategoryName()
	{
		return $this->categoryName;
	}
}

?>
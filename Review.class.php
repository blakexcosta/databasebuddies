<?php

class Review
{
	//Attributes
	private $reviewID, $beerID, $userID, $date, $starRating, $review;
	
	//Default constructor
    function __construct()
    {
    
    }
	
	//Accessors
	public function getReviewID()
	{
		return $this->reviewID;
	}
	public function getBeerID()
	{
		return $this->beerID;
	}
	public function getUserID()
	{
		return $this->userID;
	}
	public function getDate()
	{
		return $this->date;
	}
	public function getStarRating()
	{
		return $this->starRating;
	}
	public function getReview()
	{
		return $this->review;
	}
}

?>
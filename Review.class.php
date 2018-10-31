<?php

class Review
{
	//Attributes
	private $reviewid, $beerid, $userid, $date, $starrating, $review;
	
	//Default constructor
    function __construct()
    {
    
    }
	
	//Accessors
	public function getReviewID()
	{
		return $this->reviewid;
	}
	public function getBeerID()
	{
		return $this->beerid;
	}
	public function getUserID()
	{
		return $this->userid;
	}
	public function getDate()
	{
		return $this->date;
	}
	public function getStarRating()
	{
		return $this->starrating;
	}
	public function getReview()
	{
		return $this->review;
	}
}

?>
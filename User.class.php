<?php

class User
{
	//Attributes
	private $userID, $userName, $firstName, $lastName, $password, $role;
	
	//Default constructor
    function __construct()
    {
    
    }
	
	//Accessors
	public function getUserID()
	{
		return $this->userID;
	}
	public function getUserName()
	{
		return $this->userName;
	}
	public function getFirstName()
	{
		return $this->firstName;
	}
	public function getLastName()
	{
		return $this->lastName;
	}
	public function getPassword()
	{
		return $this->password;
	}
	public function getRole()
	{
		return $this->role;
	}
}

?>
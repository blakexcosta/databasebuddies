<?php

class User
{
	//Attributes
	private $userid, $username, $firstname, $lastname, $password, $role;
	
	//Default constructor
    function __construct()
    {
    
    }
	
	//Accessors
	public function getUserID()
	{
		return $this->userid;
	}
	public function getUserName()
	{
		return $this->username;
	}
	public function getFirstName()
	{
		return $this->firstname;
	}
	public function getLastName()
	{
		return $this->lastname;
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
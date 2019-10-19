<?php 

class AlienAbduction 
{

	private $abduction_id;
	private $first_name;
	private $last_name;
	private $when_it_happened;
	private $how_long;
	private $how_many;
	private $alien_description;
	private $what_they_did;
	private $fang_spotted;
	private $other;
	private $email;

	public function setAbductionId ( $value ) 
	{
		$this -> abduction_id = ( int ) $value;
	}

	public function getAbductionId ( ) 
	{
		return $this -> abduction_id;
	}

	public function setFirstName ( $value ) 
	{
		$this -> first_name = $value;
	}

	public function getFirstName ( ) 
	{
		return $this -> first_name;
	}

	public function setLastName ( $value ) 
	{
		$this -> last_name = $value;
	}

	public function getLastName ( ) 
	{
		return $this -> last_name;
	}

	public function setWhenItHappened ( $value ) 
	{
		$this -> when_it_happened = $value;
	}

	public function getWhenItHappened ( ) 
	{
		return $this -> when_it_happened;
	}

	public function setHowLong ( $value ) 
	{
		$this -> how_long = $value;
	}

	public function getHowLong ( ) 
	{
		return $this -> how_long;
	}

	public function setHowMany ( $value ) 
	{
		$this -> how_many = $value;
	}

	public function getHowMany ( ) 
	{
		return $this -> how_many;
	}

	public function setAlienDescription ( $value ) 
	{
		$this -> alien_description = $value;
	}

	public function getAlienDescription ( ) 
	{
		return $this -> alien_description;
	}

	public function setWhatTheyDid ( $value ) 
	{
		$this -> what_they_did = $value;
	}

	public function getWhatTheyDid ( ) 
	{
		return $this -> what_they_did;
	}

	public function setFangSpotted ( $value ) 
	{
		$this -> fang_spotted = $value;
	}

	public function getFangSpotted ( ) 
	{
		return $this -> fang_spotted;
	}

	public function setOther ( $value ) 
	{
		$this -> other = $value;
	}

	public function getOther ( ) 
	{
		return $this -> other;
	}

	public function setEmail ( $value ) 
	{
		$this -> email = $value;
	}

	public function getEmail ( ) 
	{
		return $this -> email;
	}
}

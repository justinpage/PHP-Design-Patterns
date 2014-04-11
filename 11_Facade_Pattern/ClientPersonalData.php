<?php


class ClientPersonalData
{
	private $streetAddress;
	private $postalCode;
	private $country;

	public function __construct($clientId)
	{
		// class will load itself on creation with Active Record
		// or some similar pattern and populate it's private variables
	}

	function getStreetAddress()
	{
		return $this->streetAddress;
	}

	function getPostalCode()
	{
		return $this->postalCode;
	}

	function getCountry()
	{
		return $this->country;
	}
}

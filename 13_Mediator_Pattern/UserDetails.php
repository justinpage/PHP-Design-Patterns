<?php

class UserDetails extends Observable
{
	private $address;

	function changeAddress($newAddress)
	{
		$this->address = $newAddress;
		$this->notify($newAddress);
	}
}

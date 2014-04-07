<?php

class UserDetails extends Observable {
	private $address;

	function cangeAddress($newAddress) {
		$this->address = $newAddress;
		$this->notify($newAddress);
	}

}

?>

<?php

class OrderDelivery implements UserAddress {
	private $deliveryAddress;

	public function setAddress($newAddress) {
		$this->deliveryAddress = $newAddress;
	}
}

?>

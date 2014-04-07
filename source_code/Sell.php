<?php

abstract class Sell {
	private $inventory;
	private $paymentProvider;


	public function removeFromInventory() {
		$this->inventory->remove($this);
	}

	public function retreivePayment() {
		$this->paymentProvider->retrieve($this->price);
	}
}

?>

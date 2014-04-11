<?php

abstract Sell
{
	// imaginary class that can remove products
	private $inventory;
	private $paymentProvider;

	public function removeFromInventory()
	{
		$this->inventory->remove($this);
	}

	public function retrievePayment()
	{
		$this->paymentProvider->retrieve($this->price);
	}
}

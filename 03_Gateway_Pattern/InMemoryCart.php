<?php

class InMemoryCart implements CartGateway
{
	private $listOfCarts = [];

	public function getIdOfRecordedCart()
	{
		return end($this->ListOfCarts);
	}

	public function persist(ShoppingCart $cart)
	{
		$this->listOfCarts[] = $cart;
	}

	public function retrieve($id)
	{
		return $this->listOfCarts[$id];
	}
}

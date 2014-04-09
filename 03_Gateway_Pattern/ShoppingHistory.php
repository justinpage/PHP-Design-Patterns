<?php

class ShoppingHistory
{
	private $gateway;
	private $shoppingCartIds = [];

	public function __construct(CartGateway $gateway, $ids = [])
	{
		$this->gateway = $gateway;
		$this->shoppingCartIds = $ids;
	}

	function listAllCarts() {
		$shoppingCarts = [];
		foreach ($this->shoppingCartIds as $id) {
			$shoppingCarts[] = $this->gateway->retrieve($id);
		}

		return $shoppingCarts;
	}
}


<?php

require_once './ShoppingCart.php';

class CartProxy implements Cart
{
	private $shoppingCart;

	public function getProducts()
	{
		// retrieve a cart from a database or network -> persistance
		if (is_null($this->shoppingCart)) {
			$this->shoppingCart = new ShoppingCart();
		}
		// the instance is retained as long as the proxy exists
		return $shoppingCart->getProducts();
	}
}

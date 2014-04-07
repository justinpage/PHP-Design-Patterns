<?php
require_once './ShoppingCart.php';

class CartProxy implements Cart {
	private $shoppinCart;

	public function getProducts() {
		if(is_null($this->shoppinCart))
			$this->shoppingCart = $gateway->getCarts();
		return $this->shoppingCart->getProducts();
	}
}

?>

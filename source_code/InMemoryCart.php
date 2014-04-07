<?php

class InMemoryCart implements CartGateway {
	private $listOfCarts = array();

	public function getIdOfRecordedCart() {
		return end($this->listOfCarts);
	}

	public function persist(ShoppingCart $cart) {
		$this->listOfCarts[] = $cart;
	}

	public function retrieve($id) {
		return $this->listOfCarts[$id];
	}
}

?>

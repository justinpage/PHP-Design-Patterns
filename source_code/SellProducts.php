<?php
require_once 'Sell.php';

class SellProducts extends Sell {
	private $price;
	private $provider;

	function orderNewItem() {
		$this->provider->orderNewItem($this);
	}
}

?>

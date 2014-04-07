<?php
require_once 'Sell.php';

class SellServices implements Sell {
	private $price;
	private $humanResources;

	function markHumanResourcesAsOccupied() {
		$this->humanResources->mark(2);
	}

}

?>

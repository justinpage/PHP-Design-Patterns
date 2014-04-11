<?php

require_once 'Sell.php';

class SellServices implements Sell
{
	private $price;
	private $humanResources;

	public function markHumanResourcesAsOccupied()
	{
		$this->humanResources->mark(2);
	}
	function function_name(argument) {
		// body...
	}
}

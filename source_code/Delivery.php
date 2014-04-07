<?php

class Delivery {
	private $currentState;

	function __construct(DeliveryState $state) {
		$this->setState($state);
	}

	function getCurrentLocation() {
		return $this->currentState->getLocation();
	}

	function goNext() {
		$this->currentState->goNext($this);
	}

	function setState(DeliveryState $state) {
		$this->currentState = $state;
	}
}

?>

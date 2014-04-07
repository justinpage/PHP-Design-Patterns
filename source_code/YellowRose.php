<?php

class YellowRose implements Roses {
	private $sold = false;

	function sell() {
		$this->sold = true;
	}

	function isSold() {
		return $this->sold;
	}
}

?>

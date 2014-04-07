<?php
require_once __DIR__ . '/Roses.php';

class RedRose implements Roses {
	private $sold = false;

	function sell() {
		$this->sold = true;
	}

	function isSold() {
		return $this->sold;
	}

}

?>
